<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Exception;
use Phpml\Dataset\CsvDataset;
use Phpml\Classification\NaiveBayes;
use Phpml\Dataset\Dataset;
use Phpml\Preprocessing\LabelEncoder;
use Phpml\Dataset\FilesDataset;
use Phpml\Dataset\Demo\IrisDataset;
use Phpml\Metric\Accuracy;
use Phpml\Metric\ClassificationReport;

helper('url');

class AiController extends BaseController
{
    private function calculateImt($bb, $tb)
    {
        return $bb / (($tb / 100) * ($tb / 100));
    }

    public function prediksi($data = null)
    {
        try {
            $web = false;
            if (isset($data)) {
                $data = $data;
                $web = true;
            } else {
                $data = $this->request->getPost();
            }
            $data['jenis_kelamin'] = ($data['jenis_kelamin'] == "L") ? "Laki-laki" : "Perempuan";
                
            $umur = $data['umur'];
            $bb = $data['berat_badan'];
            $tb_cm = $data['tinggi_badan_cm'];
            $tb_m = $tb_cm / 100;
            $lk = $data['lingkar_kepala'] ?? null;

            $data['imt'] = $data['imt'] ?? $this->calculateImt($bb, $tb_cm);

            $type = 'direct';

            if($data['method'] == "direct") {
               $hasilPrediksi = $this->directMethod($data);
            } else if($data["method"] == "5month") {
                $type = '5month';
                $hasilPrediksi = $this->fiveMonth($data);
            } else {
                $hasilPrediksi = $this->naiveBayes($data);
            }

            $dataKlasifikasiModel = new \App\Models\DataKlasifikasi();
            $dataKlasifikasiModel->insert([
                'jenis_kelamin' => $data['jenis_kelamin'],
                'umur' => $umur,
                'berat_badan' => $bb,
                'tinggi_badan_cm' => $tb_cm,
                'tinggi_badan_m' => $tb_m,
                'lingkar_kepala' => $lk,
                'imt' => $data['imt'],
                'status_gizi' => $hasilPrediksi['status_gizi'][0]['status_gizi'],
                'accuracy' => $hasilPrediksi['accuracy'],
                'precision' => $hasilPrediksi['precision'],
                'recall' => $hasilPrediksi['recall'],
                'type' => $type,
            ]);

            $data['status_gizi'] = $hasilPrediksi['status_gizi'][0]['status_gizi'];
            $data['accuracy'] = $hasilPrediksi['accuracy'];
            $data['precision'] = $hasilPrediksi['precision'];
            $data['recall'] = $hasilPrediksi['recall'];

            if ($web) {
                return [
                    'data' => $data,
                    'predicted' => $hasilPrediksi['status_gizi'][0]['status_gizi'],
                ];
            } else {
                return $this->response->setJSON([
                    'data' => $data,
                    'predicted' => $hasilPrediksi['status_gizi'][0]['status_gizi'],
                ])->setStatusCode(200);
            }
            
        } catch (\Exception $e) {
            log_message('error', 'Full error: ' . $e->getMessage() . ', File: ' . $e->getFile() . ', Line: ' . $e->getLine());

            return $this->response->setJSON([
                'error' => [
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                ],
            ])->setStatusCode(500);
        }
    }

    public function naiveBayes($postData = null)
    {
        $data = [];
        $csvFile = FCPATH . 'data/dataposyandu.csv';

        $classifier = new NaiveBayesClassifier($csvFile);
        $testResults = [];

        $umur = $postData['umur'];
        $imt = $postData['imt'];
        $jenisKelamin = $postData['jenis_kelamin'];

        $data = [
            'umur' => $umur,
            'imt' => $imt,
            'jenis_kelamin' => $jenisKelamin,
        ];
        $hasilKlasifikasi = $classifier->doPredict($data);

        $testResults[] = [
            'status_gizi' => $hasilKlasifikasi['prediksi'],
            'umur' => $umur,
            'imt' => $imt,
            'jenisKelamin' => $jenisKelamin,
        ];

        $metrics = $hasilKlasifikasi['matrix'];
        $averageAccuracy = $metrics['accuracy'];
        $averagePrecision = $metrics['precision'];
        $averageRecall = $metrics['recall'];

        $result = [
            'status_gizi' => $testResults,
            'accuracy' => $averageAccuracy,
            'precision' => $averagePrecision,
            'recall' => $averageRecall,
        ];

        return $result;
    }


    public function fiveMonth($postData) {
        try {
            $csvFile = FCPATH . 'data/data2.csv';
    
            $dataset = new CsvDataset($csvFile, 2, true);
    
            $samples = $dataset->getSamples();
            $labels = $dataset->getTargets();
            $filteredSamples = [];
            $filteredLabels = [];
            foreach ($samples as $key => $sample) {
                $filteredSamples[] = $sample;
                $filteredLabels[] = $labels[$key];
            }
    
            $predictedResults = $this->predictionMethod($filteredSamples, $filteredLabels);
    
            $result = [
                'status_gizi' => array_map(function($status) { return ['status_gizi' => $status]; }, $predictedResults),
                'accuracy' => null,
                'precision' => null,
                'recall' => null
            ];
    
            return $result;
    
        } catch (Exception $e) {
            return [
                'error' => 'An error occurred: ' . $e->getMessage()
            ];
        }
    }
    
    private function predictionMethod($samples, $labels) {
        $classifier = new NaiveBayes();
        $classifier->train($samples, $labels);
        $predictions = $classifier->predict($samples);
    
        return $predictions;
    }
    
    public function directMethod($postData) {
        $imt = $postData['imt'];
        $statusGizi = '';
    
        if ($imt < 18.5) {
            $statusGizi = 'Gizi Buruk';
        } else if ($imt >= 18.5 && $imt <= 24.9) {
            $statusGizi = 'Normal';
        } else if ($imt >= 25 && $imt <= 26.9) {
            $statusGizi = 'Gizi Lebih';
        } else if($imt >= 27 && $imt <= 29.9) {
            $statusGizi = 'Beresiko Gizi Lebih';
        } else if ($imt >= 30) {
            $statusGizi = 'Obese';
        }
    
        $result = [
            'status_gizi' => [[ 'status_gizi' => $statusGizi ]],
            'accuracy' => null,
            'precision' => null,
            'recall' => null
        ];
    
        return $result;
    }    
}
