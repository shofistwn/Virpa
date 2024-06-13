<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class NaiveBayesClassifier extends BaseController
{

    // load csv file
    public function load_csv($filename)
    {
        $dataset = array();
        $file = fopen($filename, 'r');

        // Skip the header row
        fgetcsv($file);

        while (($row = fgetcsv($file)) !== false) {
            if (empty($row)) {
                continue;
            }
            $dataset[] = $row;
        }

        fclose($file);
        return $dataset;
    }

    public function str_column_to_float(&$dataset, $column)
    {
        foreach ($dataset as &$row) {
            $row[$column] = floatval(trim($row[$column]));
        }
    }

    public function str_column_to_int(&$dataset, $column)
    {
        $class_values = array_column($dataset, $column);
        $unique = array_values(array_unique($class_values));
        $lookup = array_flip($unique);

        foreach ($dataset as &$row) {
            $row[$column] = $lookup[$row[$column]];
        }

        return $lookup;
    }

    // Split a dataset into k folds
    public function cross_validation_split($dataset, $n_folds)
    {
        $dataset_split = array();
        $dataset_copy = $dataset;
        $fold_size = intval(count($dataset) / $n_folds);

        for ($i = 0; $i < $n_folds; $i++) {
            $fold = array();
            while (count($fold) < $fold_size) {
                $index = array_rand($dataset_copy);
                $fold[] = array_splice($dataset_copy, $index, 1)[0];
            }
            $dataset_split[] = $fold;
        }

        return $dataset_split;
    }

    // Calculate accuracy percentage
    public function accuracy_metric($actual, $predicted)
    {
        $correct = 0;
        $len = count($actual);

        for ($i = 0; $i < $len; $i++) {
            if ($actual[$i] == $predicted[$i]) {
                $correct += 1;
            }
        }

        return ($correct / $len) * 100.0;
    }

    // Evaluate an algorithm using a cross-validation split
    public function evaluate_algorithm($dataset, $algorithm, $n_folds, ...$args)
    {
        $folds = $this->cross_validation_split($dataset, $n_folds);
        $class_metrics = [];
        $mean_accuracies = [];

        foreach ($folds as $fold) {
            $train_set = $folds;
            $test_set = array_shift($train_set); // Ambil satu lipatan sebagai set uji
            $train_set = array_merge(...$train_set);

            $predicted = $this->$algorithm($train_set, $test_set, ...$args);
            $actual = array_column($test_set, count($test_set[0]) - 1);

            // Calculate confusion matrix metrics for each class
            $class_values = array_unique($actual);
            foreach ($class_values as $class) {
                $metrics = $this->confusion_matrix_metrics($actual, $predicted, $class);
                $class_metrics[$class][] = $metrics;
            }

            // Calculate accuracy for the fold
            $accuracy = $this->accuracy_metric($actual, $predicted);
            $mean_accuracies[] = $accuracy;
        }

        // Avoid division by zero
        $mean_accuracy = array_sum($mean_accuracies) / count($mean_accuracies);

        return ['class_metrics' => $class_metrics, 'mean_accuracy' => $mean_accuracy];
    }


    // split dataset by class values
    public function separate_by_class($dataset)
    {
        $separated = array();

        foreach ($dataset as $vector) {
            $class_value = $vector[count($vector) - 1];
            if (!array_key_exists($class_value, $separated)) {
                $separated[$class_value] = array();
            }
            $separated[$class_value][] = $vector;
        }

        return $separated;
    }

    // calculate mean
    public function mean($numbers)
    {
        $count = count($numbers);
        return  array_sum($numbers) / $count;
    }

    // calculate standard deviation
    public function stdev($numbers)
    {
        $count = count($numbers);
        if ($count <= 1) {
            return 0;
        }

        $avg = $this->mean($numbers);
        $diffSquared = array_map(function ($x) use ($avg) {
            return  pow(floatval($x) - $avg, 2);
        }, $numbers);

        $variance = array_sum($diffSquared) / ($count - 1);

        return sqrt($variance);
    }

    // calculate mean, stdev, and count for each column in the dataset
    public function summarize_dataset($dataset)
    {
        $columns = count($dataset[0]);
        $summaries = array();

        for ($i = 0; $i < $columns; $i++) {
            $column_values = array_column($dataset, $i);
            $mean = $this->mean($column_values);
            $std_dev = $this->stdev($column_values);
            $count = count($column_values);

            $summaries[] = array($mean, $std_dev, $count);
        }

        array_pop($summaries); // Remove the summary for the last column (class column)
        return $summaries;
    }

    // split data by class and calculate statistics for each row
    public function summarize_by_class($dataset)
    {
        $separated = $this->separate_by_class($dataset);
        $summaries = array();

        foreach ($separated as $class_value => $rows) {
            $summaries[$class_value] = $this->summarize_dataset($rows);
        }

        return $summaries;
    }

    // calculate Gaussian PDF
    public function calculate_probability($x, $mean, $stdev)
    {
        if (!is_numeric($x) || !is_numeric($mean) || !is_numeric($stdev) || $stdev == 0) {
            return 0; // Avoid division by zero or handle non-numeric values
        }

        $exponent = exp(-pow($x - $mean, 2) / (2 * pow($stdev, 2)));
        return (1 / (sqrt(2 * M_PI) * $stdev)) * $exponent;
    }

    // Calculate the probabilities of predicting each class for a given row
    public function calculate_class_probabilities($summaries, $row)
    {
        $total_rows = 0;

        foreach ($summaries as $class_value => $class_summaries) {
            if (isset($class_summaries[0][2])) {
                $total_rows += $class_summaries[0][2];
            }
        }

        $likelihoods = array();

        foreach ($summaries as $class_value => $class_summaries) {
            $likelihoods[$class_value] = array();

            for ($i = 0; $i < count($class_summaries); $i++) {
                list($mean, $stdev, $_) = $class_summaries[$i];
                $probability = $this->calculate_probability($row[$i], $mean, $stdev);

                // Store the likelihood for each feature
                $likelihoods[$class_value][] = $probability;
            }
        }

        return $likelihoods;
    }

    // Predict the class for a given row
    public function predict($summaries, $row)
    {
        $likelihoods = $this->calculate_class_probabilities($summaries, $row);
        $predictions = array();

        foreach ($likelihoods as $class_value => $likelihood) {
            $predictions[$class_value] = $likelihood;
        }

        return $predictions;
    }
    // Naive Bayes Algorithm
    public function naive_bayes($train, $test)
    {
        $summarize = $this->summarize_by_class($train);
        $predictions = array();

        foreach ($test as $row) {
            $output = $this->predict($summarize, $row);

            // Find the class with maximum likelihood
            $maxLikelihood = max($output);
            $predictedClass = array_search($maxLikelihood, $output);

            // Return likelihoods, predicted class, and class means for each instance
            $predictions[] = [
                'likelihoods' => $output,
                'predicted_class' => $predictedClass,
                'class_means' => $summarize[$predictedClass]
            ];
        }

        return $predictions;
    }

    public function confusion_matrix_metrics($actual, $predicted, $class)
    {
        $true_positive = 0;
        $false_positive = 0;
        $false_negative = 0;
        $true_negative = 0;

        $total_instances = count($actual);

        for ($i = 0; $i < $total_instances; $i++) {
            if ($actual[$i] == $class && $predicted[$i] == $class) {
                $true_positive++;
            } elseif ($actual[$i] == $class && $predicted[$i] != $class) {
                $false_negative++;
            } elseif ($actual[$i] != $class && $predicted[$i] == $class) {
                $false_positive++;
            } elseif ($actual[$i] != $class && $predicted[$i] != $class) {
                $true_negative++;
            }
        }

        // Handle division by zero
        $denominator_recall = max($true_positive + $false_negative, 1);
        $denominator_precision = max($true_positive + $false_positive, 1);
        $denominator_accuracy = max($total_instances, 1);

        $recall = $true_positive / $denominator_recall;
        $precision = $true_positive / $denominator_precision;
        $accuracy =  ($true_positive + $true_negative) / $denominator_accuracy;

        return [
            'recall' => $recall,
            'precision' => $precision,
            'accuracy' => $accuracy
        ];
    }


    public function doPredict($data)
    {

        // Test Naive Bayes on Iris Dataset
        $filename = FCPATH . "data/dataposyandu.csv";
        $dataset = $this->load_csv($filename);

        // convert numerical columns to float
        for ($i = 1; $i < count($dataset[0]) - 1; $i++) {
            $this->str_column_to_float($dataset, $i);
        }

        // convert class column to integers
        for ($i = 0; $i < count($dataset[0]) - 1; $i++) {
            if (!is_float($dataset[0][$i])) {
                $this->str_column_to_int($dataset, $i);
            }
        }

        // evaluate algorithm with confusion matrix metrics
        $n_folds = 5;
        $class_metrics_result = $this->evaluate_algorithm($dataset, 'naive_bayes', $n_folds);

        // Access class metrics and mean accuracy
        $class_metrics = $class_metrics_result['class_metrics'];
        $mean_accuracy = $class_metrics_result['mean_accuracy'];


        $macroAverageMetrics = ['recall' => 0, 'precision' => 0, 'accuracy' => 0];
        $totalClasses = count($class_metrics);

        foreach ($class_metrics as $class => $metricsList) {
            $totalMetrics = count($metricsList);
            $averageMetrics = ['recall' => 0, 'precision' => 0, 'accuracy' => 0];

            foreach ($metricsList as $metrics) {

                // Accumulate metrics for class averaging
                $averageMetrics['recall'] += $metrics['recall'];
                $averageMetrics['precision'] += $metrics['precision'];
                $averageMetrics['accuracy'] += $metrics['accuracy'];
            }


            // Accumulate metrics for macro averaging
            $macroAverageMetrics['recall'] += $averageMetrics['recall'] / $totalClasses;
            $macroAverageMetrics['precision'] += $averageMetrics['precision'] / $totalClasses;
            $macroAverageMetrics['accuracy'] += $averageMetrics['accuracy'] / $totalClasses;
        }


        // data to predict
        $newData = [
            [
                $data['jenis_kelamin'],
                $data['umur'],
                $data['imt'],
                // "Perempuan",
                // 41,
                // 18.36547291
            ],
        ];

        // Convert numerical columns to float
        for ($i = 1; $i < count($newData[0]) - 1; $i++) {
            $this->str_column_to_float($newData, $i);
        }

        // Convert class column to integers (if needed)
        // Note: Use the same lookup table from the training data
        if (isset($str_column_to_int_result)) {
            $classColumnIndex = count($newData[0]) - 1;
            foreach ($newData as &$row) {
                $row[$classColumnIndex] = $str_column_to_int_result[$row[$classColumnIndex]];
            }
        }

        // Make predictions
        $predictions = $this->naive_bayes($dataset, $newData);

        $percentMeanTotal = 0;
        $prediksi = '';

        foreach ($predictions as $prediction) {
            $likelihoods = $prediction['likelihoods'];
            $predictedClass = $prediction['predicted_class'];
            $classMeans = $prediction['class_means'];

            $prediksi = $predictedClass;

            // Check if $classMeans is an array
            if (is_array($classMeans)) {
                $percentMeans = 0;

                foreach ($classMeans as $mean) {
                    if (is_array($mean)) {

                        $percentMeans += $mean[0]; // Keep it as a float
                    } else {

                        $percentMeans += $mean; // Keep it as a float
                    }
                }

                $percentMeanTotal = $percentMeans;
            } else {
                $percentMean = round($classMeans * 100, 2); // Assuming $classMeans is the mean value
            }

            return [
                'prediksi' => $prediksi,
                'mean' => $percentMeanTotal / 3,
                'matrix' => $macroAverageMetrics,
            ];
        }
    }


























    // private $mean; // Array untuk menyimpan rata-rata umur dan imt untuk setiap status
    // private $stdDev; // Array untuk menyimpan deviasi standar umur dan imt untuk setiap status
    // private $probabilities; // Array untuk menyimpan probabilitas masing-masing status
    // private $confusionMatrix; // Matriks untuk menyimpan hasil prediksi dan evaluasi klasifikasi

    // // Konstruktor untuk inisialisasi dan perhitungan statistik awal
    // public function __construct($trainingDataPath)
    // {
    //     $trainingData = $this->loadTrainingData($trainingDataPath);
    //     $this->calculateStatistics($trainingData);
    // }

    // // Metode untuk membaca data pelatihan dari file CSV
    // private function loadTrainingData($trainingDataPath)
    // {
    //     $data = [];

    //     if (($handle = fopen($trainingDataPath, "r")) !== false) {
    //         // Skip header
    //         fgetcsv($handle, 1000, ",");

    //         while (($row = fgetcsv($handle, 1000, ",")) !== false) {
    //             $data[] = [
    //                 'jenisKelamin' => $row[0],
    //                 'umur' => floatval($row[1]),
    //                 'imt' => floatval($row[2]),
    //                 'status' => $row[3]
    //             ];
    //         }
    //         fclose($handle);
    //     }

    //     return $data;
    // }

    // // Metode untuk menghitung statistik awal dari data pelatihan
    // private function calculateStatistics($trainingData)
    // {
    //     $statusCounts = $umurSums = $imtSums = $umurSquares = $imtSquares = [];

    //     foreach ($trainingData as $data) {
    //         $status = $data['status'];

    //         // Menghitung frekuensi kemunculan setiap status
    //         if (!isset($statusCounts[$status])) {
    //             $statusCounts[$status] = 1;
    //         } else {
    //             $statusCounts[$status]++;
    //         }

    //         // Menghitung total umur dan imt untuk setiap status
    //         if (!isset($umurSums[$status])) {
    //             $umurSums[$status] = $data['umur'];
    //             $imtSums[$status] = $data['imt'];
    //         } else {
    //             $umurSums[$status] += $data['umur'];
    //             $imtSums[$status] += $data['imt'];
    //         }

    //         // Menghitung total kuadrat umur dan imt untuk setiap status
    //         if (!isset($umurSquares[$status])) {
    //             $umurSquares[$status] = pow($data['umur'], 2);
    //             $imtSquares[$status] = pow($data['imt'], 2);
    //         } else {
    //             $umurSquares[$status] += pow($data['umur'], 2);
    //             $imtSquares[$status] += pow($data['imt'], 2);
    //         }
    //     }

    //     $totalData = count($trainingData);

    //     // Perhitungan rata-rata dan deviasi standar untuk umur dan imt setiap status
    //     foreach ($statusCounts as $status => $count) {
    //         $this->mean[$status] = [
    //             'umur' => $umurSums[$status] / $count,
    //             'imt' => $imtSums[$status] / $count
    //         ];

    //         $this->stdDev[$status] = [
    //             'umur' => sqrt(($umurSquares[$status] / $count) - pow($this->mean[$status]['umur'], 2)),
    //             'imt' => sqrt(($imtSquares[$status] / $count) - pow($this->mean[$status]['imt'], 2))
    //         ];
    //     }

    //     // Perhitungan probabilitas setiap status
    //     foreach ($statusCounts as $status => $count) {
    //         $this->probabilities[$status] = $count / $totalData;
    //     }

    //     // Inisialisasi matriks evaluasi (confusion matrix)
    //     $statuses = array_keys($statusCounts);
    //     foreach ($statuses as $rowStatus) {
    //         foreach ($statuses as $colStatus) {
    //             $this->confusionMatrix[$rowStatus][$colStatus] = 0;
    //         }
    //     }

    //     // Mengisi matriks evaluasi dengan hasil prediksi
    //     foreach ($trainingData as $data) {
    //         $predictedStatus = $this->classify($data['umur'], $data['imt'], $data['jenisKelamin']);
    //         $this->confusionMatrix[$data['status']][$predictedStatus]++;
    //     }
    // }

    // // Metode untuk melakukan klasifikasi Naive Bayes
    // public function classify($umur, $imt, $jenisKelamin)
    // {
    //     $likelihoodUmur = [];
    //     $likelihoodImt = [];

    //     foreach ($this->mean as $status => $values) {
    //         $umurStdDev = $this->stdDev[$status]['umur'];
    //         $imtStdDev = $this->stdDev[$status]['imt'];

    //         // Menghitung likelihood untuk umur dan imt menggunakan rumus Gaussian Naive Bayes
    //         if ($umurStdDev != 0) {
    //             $likelihoodUmur[$status] = exp(-2 * pow(($umur - $values['umur']) / $umurStdDev, 2));
    //         } else {
    //             $likelihoodUmur[$status] = 0;
    //         }

    //         if ($imtStdDev != 0) {
    //             $likelihoodImt[$status] = exp(-pow(($imt - $values['imt']) / ($imtStdDev * 2), 2));
    //         } else {
    //             $likelihoodImt[$status] = 0;
    //         }
    //     }

    //     $finalProbabilities = [];
    //     foreach ($this->probabilities as $status => $prob) {
    //         // Menghitung probabilitas posterior untuk setiap status
    //         $finalProbabilities[$status] = $prob * $likelihoodUmur[$status] * $likelihoodImt[$status];
    //     }

    //     // Normalisasi probabilitas
    //     $totalProbability = array_sum($finalProbabilities);
    //     foreach ($finalProbabilities as &$prob) {
    //         $prob /= ($totalProbability != 0) ? $totalProbability : 1;
    //     }

    //     // Hasil klasifikasi
    //     $maxProbabilityStatus = array_search(max($finalProbabilities), $finalProbabilities);

    //     return $maxProbabilityStatus;
    // }

    // // Metode untuk menghitung metrik klasifikasi (akurasi, presisi, recall)
    // public function calculateMetrics()
    // {
    //     $accuracy = 0;
    //     $precision = [];
    //     $recall = [];

    //     foreach ($this->confusionMatrix as $status => $values) {
    //         // Menghitung True Positives, False Positives, dan False Negatives
    //         $tp = $values[$status];
    //         $fp = array_sum($values) - $tp;
    //         $fn = array_sum(array_column($this->confusionMatrix, $status)) - $tp;

    //         // Menghitung akurasi, presisi, dan recall untuk setiap status
    //         $accuracy += $tp / array_sum($values);
    //         $precision[$status] = $tp / ($tp + $fp);
    //         $recall[$status] = $tp / ($tp + $fn);
    //     }

    //     $accuracy /= count($this->confusionMatrix);

    //     // Menghitung rata-rata presisi dan recall
    //     $precisionAvg = array_sum($precision) / count($precision);
    //     $recallAvg = array_sum($recall) / count($recall);

    //     return [
    //         'accuracy' => $accuracy,
    //         'precision' => $precisionAvg,
    //         'recall' => $recallAvg
    //     ];
    // }
}
