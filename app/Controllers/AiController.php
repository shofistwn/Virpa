<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Exception;
use Phpml\Dataset\CsvDataset;
use Phpml\Classification\NaiveBayes;
use Phpml\Dataset\Dataset;
use Phpml\Dataset\FilesDataset;
use Phpml\Dataset\Demo\IrisDataset;

helper('url');

class AiController extends BaseController
{


    /**
     * @return float $imt
     * 
     */
    private function calculateImt($bb, $tb)
    {
        return $bb / (($tb / 100) * ($tb / 100));
    }



    /** ======================================================================================================== */
    /* NEW CODE
    /** ======================================================================================================== */
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

            // Map jenis_kelamin value
            $data['jenis_kelamin'] = ($data['jenis_kelamin'] == "L") ? "Laki-laki" : "Perempuan";

            // Extract necessary data
            $umur = $data['umur'];
            $bb = $data['berat_badan'];
            $tb_cm = $data['tinggi_badan_cm'];
            $tb_m = $tb_cm / 100;
            $lk = $data['lingkar_kepala'] ?? null;

            // Calculate IMT
            $data['imt'] = $data['imt'] ?? $this->calculateImt($bb, $tb_cm);

            // Perform Naive Bayes classification
            $hasilPrediksi = $this->naiveBayes($data);

            // Simpan hasil prediksi ke dalam database
            $dataKlasifikasiModel = new \App\Models\DataKlasifikasi();
            $dataKlasifikasiModel->insert([
                'jenis_kelamin' => $data['jenis_kelamin'],
                'umur' => $umur,
                'berat_badan' => $bb,
                'tinggi_badan_cm' => $tb_cm,
                'tinggi_badan_m' => $tb_m,
                'lingkar_kepala' => $lk,
                'imt' => $data['imt'],
                'status_gizi' => $hasilPrediksi['status_gizi'][0]['status_gizi'], // Adjusted this line
                'accuracy' => $hasilPrediksi['accuracy'],
                'precision' => $hasilPrediksi['precision'],
                'recall' => $hasilPrediksi['recall'],
            ]);

            $data['status_gizi'] = $hasilPrediksi['status_gizi'][0]['status_gizi'];
            $data['accuracy'] = $hasilPrediksi['accuracy'];
            $data['precision'] = $hasilPrediksi['precision'];
            $data['recall'] = $hasilPrediksi['recall'];

            // Return the result as JSON

            // Return the result as JSON
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
                    // Add more information as needed
                ],
            ])->setStatusCode(500);
        }
    }



    public function naiveBayes($postData = null)
    {
        // Membaca data dari file CSV
        $data = [];
        $csvFile = FCPATH . 'data/dataposyandu.csv';

        $classifier = new NaiveBayesClassifier($csvFile);
        $testResults = [];

        // Lakukan satu kali prediksi tanpa perulangan
        $umur = $postData['umur'];
        $imt = $postData['imt'];
        $jenisKelamin = $postData['jenis_kelamin'];

        // random data
        // $umur = rand(0, 60);
        // // random between 10.000000000001 and 21.000000000001
        // $imt = rand(10000000000001, 21000000000001) / 1000000000000000;
        // $jenisKelamin = rand(0, 1) == 0 ? 'Laki-Laki' : 'Perempuan';


        $data = [
            'umur' => $umur,
            'imt' => $imt,
            'jenis_kelamin' => $jenisKelamin,
        ];
        // var_dump($data);
        $hasilKlasifikasi = $classifier->doPredict($data);

        $testResults[] = [
            'status_gizi' => $hasilKlasifikasi['prediksi'],
            'umur' => $umur,
            'imt' => $imt,
            'jenisKelamin' => $jenisKelamin,
        ];

        // Menghitung metrics untuk satu kali prediksi
        $metrics = $hasilKlasifikasi['matrix'];
        $averageAccuracy = $metrics['accuracy'];
        $averagePrecision = $metrics['precision'];
        $averageRecall = $metrics['recall'];

        // Menyiapkan data untuk di-return dalam format JSON
        $result = [
            'status_gizi' => $testResults,
            'accuracy' => $averageAccuracy,
            'precision' => $averagePrecision,
            'recall' => $averageRecall,
        ];

        // echo json_encode($result, JSON_PRETTY_PRINT);
        return $result;

        // return $this->response->setJSON($result)->setStatusCode(200);
    }
}
