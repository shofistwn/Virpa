<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class BayiSeeder extends Seeder
{
    protected $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function run()
    {

        // create 100 data for seeder
        // id_user is 6
        // kode_bayi is unique 4 digits number
        // nama_bayi random
        // umur between 1 - 60
        // berat_badan between 1 - 10
        // tinggi_badan between 1 - 100
        // lingkar_kepala between 1 - 100
        // jenis_kelamin between L and P
        // call prediksi from AiController to get imt and status_gizi
        // created_at is random date between 2023-01-01 and 2023-12-31 23:59:59, format Y-m-d H:i:s, usahakan ada data tiap bulan

        // create 100 data for seeder

        // create faker

        for ($i = 0; $i < 1000; $i++) {
            // id_user is 6
            $id_user = 6;

            // kode_bayi is unique 4 digits number
            $kode_bayi = rand(1000, 9999);

            // nama_bayi random
            $nama_bayi = $this->faker->name;

            // umur between 1 - 60
            $umur = rand(1, 60);

            // berat_badan between 1 - 10
            $berat_badan = rand(1, 10);

            // tinggi_badan between 1 - 100
            $tinggi_badan = rand(1, 100);

            // lingkar_kepala between 1 - 100
            $lingkar_kepala = rand(1, 100);

            // jenis_kelamin between L and P
            $jenis_kelamin = $this->faker->randomElement(['L', 'P']);

            // call prediksi from AiController to get imt and status_gizi
            $data_for_predict = [
                'jenis_kelamin' => $jenis_kelamin,
                'umur' => $umur,
                'berat_badan' => $berat_badan,
                'tinggi_badan_cm' => $tinggi_badan,
                'lingkar_kepala' => $lingkar_kepala
            ];

            // call AiController
            $ai = new \App\Controllers\AiController();
            // use method prediksi from AiController
            $data['prediksi'] = $ai->prediksi($data_for_predict);

            // created_at is random date between 2023-01-01 and 2023-12-31 23:59:59, format Y-m-d H:i:s, usahakan ada data tiap bulan
            $created_at = $this->faker->dateTimeBetween('2023-01-01', '2023-12-31')->format('Y-m-d H:i:s');

            // insert data bayi to database
            $model = new \App\Models\BayiModel();
            $model->insert([
                'id_user' => $id_user,
                'nama_bayi' => $nama_bayi,
                'tgl_lahir' => $created_at,
                'kode_bayi' =>  $kode_bayi,
                'umur' => $umur,

                'berat_badan' => $berat_badan,
                'tinggi_badan' => $tinggi_badan,
                'lingkar_kepala' => $lingkar_kepala,
                'jenis_kelamin' => $jenis_kelamin,
                'imt' => $data['prediksi']['data']['imt'],
                'status_gizi' => $data['prediksi']['data']['status_gizi'],
                'created_at' => $created_at,
            ]);
        }
    }
}
