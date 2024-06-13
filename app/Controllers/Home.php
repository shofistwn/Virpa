<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [];
        $data['tampilkan'] = true;
        return view("landing/v_main.php", $data);
    }

    public function register(): string
    {
        return view('register');
    }

    public function login(): string
    {
        return view('login');
    }

    public function logout()
    {
        session()->destroy();

        session()->setFlashdata('success_logout', 'Anda berhasil logout');
        return redirect()->to('/login');
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard User',
            'breadcrumbs' => 'Dashboard User',
        ];

        // get role and name from session
        $data['role'] = session()->get('level');
        $data['name'] = session()->get('nama_user');

        // get data bayi where id_user = session id_user
        $bayiModel = new \App\Models\BayiModel();
        $data['bayi'] = $bayiModel->where('id_user', session()->get('id_user'))->findAll();

        // check if the array has any elements
        if (count($data['bayi']) > 0) {
            // get the first nama bayi
            $data['nama_bayi'] = $data['bayi'][0]['nama_bayi'];

            // get the first status gizi
            $data['status_gizi'] = end($data['bayi'])['status_gizi'];
        } else {
            // set default values if the array is empty
            $data['nama_bayi'] = '';
            $data['status_gizi'] = '';
        }

        return view('user/newDashboard', $data);
    }

    public function kms_online()
    {
        $data = [
            'title' => 'KMS Online',
            'breadcrumbs' => 'KMS Online',
        ];

        // get role and name from session
        $data['role'] = session()->get('level');
        $data['name'] = session()->get('nama_user');

        // get data bayi berat badan dan umur where id_user = session id_user
        $bayiModel = new \App\Models\BayiModel();
        $data['bayi'] = $bayiModel->where('id_user', session()->get('id_user'))->findAll();

        // get latest bayi data
        $data['latest_bayi'] = end($data['bayi']);
        // sort data bayi by umur
        usort($data['bayi'], function ($a, $b) {
            return $a['umur'] - $b['umur'];
        });

        // berikan saya data berat dan umur bayinya perbulan dan jadiin array
        $beratArr = [];
        $umurArr = [];

        foreach ($data['bayi'] as $key => $value) {
            $beratArr[$key] = ['x' => $value['umur'], 'y' => $value['imt'], 'status_gizi' => $value['status_gizi']];
        }

        $data['grafik'] = $beratArr;

        // $data['berat'] = '[' . implode(',', $beratArr) . ']';
        $data['umur'] = '[' . implode(',', $umurArr) . ']';



        if ($data['latest_bayi']['jenis_kelamin'] == 'L') {
            $data['ideal'] = [
                [
                    "usia" => "0",
                    "bb" => "3.3",
                    "tb" => "49.9"
                ],
                [
                    "usia" => "1",
                    "bb" => "4.5",
                    "tb" => "54.7"
                ],
                [
                    "usia" => "2",
                    "bb" => "5.6",
                    "tb" => "58.4"
                ],
                [
                    "usia" => "3",
                    "bb" => "6.4",
                    "tb" => "61.4"
                ],
                [
                    "usia" => "4",
                    "bb" => "7.0",
                    "tb" => "63.9"
                ],
                [
                    "usia" => "5",
                    "bb" => "7.5",
                    "tb" => "65.9"
                ],
                [
                    "usia" => "6",
                    "bb" => "7.9",
                    "tb" => "67.6"
                ],
                [
                    "usia" => "7",
                    "bb" => "8.3",
                    "tb" => "69.2"
                ],
                [
                    "usia" => "8",
                    "bb" => "8.6",
                    "tb" => "70.6"
                ],
                [
                    "usia" => "9",
                    "bb" => "8.9",
                    "tb" => "72.0"
                ],
                [
                    "usia" => "10",
                    "bb" => "9.2",
                    "tb" => "73.3"
                ],
                [
                    "usia" => "11",
                    "bb" => "9.4",
                    "tb" => "74.5"
                ],
                [
                    "usia" => "12",
                    "bb" => "9.6",
                    "tb" => "75.7"
                ],
                [
                    "usia" => "13",
                    "bb" => "9.9",
                    "tb" => "76.9"
                ],
                [
                    "usia" => "14",
                    "bb" => "10.1",
                    "tb" => "78.0"
                ],
                [
                    "usia" => "15",
                    "bb" => "10.3",
                    "tb" => "79.1"
                ],
                [
                    "usia" => "16",
                    "bb" => "10.5",
                    "tb" => "80.2"
                ],
                [
                    "usia" => "17",
                    "bb" => "10.7",
                    "tb" => "81.2"
                ],
                [
                    "usia" => "18",
                    "bb" => "10.9",
                    "tb" => "82.3"
                ],
                [
                    "usia" => "19",
                    "bb" => "11.1",
                    "tb" => "83.2"
                ],
                [
                    "usia" => "20",
                    "bb" => "11.3",
                    "tb" => "84.2"
                ],
                [
                    "usia" => "21",
                    "bb" => "11.5",
                    "tb" => "85.1"
                ],
                [
                    "usia" => "22",
                    "bb" => "11.8",
                    "tb" => "86.0"
                ],
                [
                    "usia" => "23",
                    "bb" => "12.0",
                    "tb" => "86.9"
                ],
                [
                    "usia" => "24",
                    "bb" => "12.2",
                    "tb" => "87.1"
                ],
                [
                    "usia" => "25",
                    "bb" => "12.4",
                    "tb" => "88.0"
                ],
                [
                    "usia" => "26",
                    "bb" => "12.5",
                    "tb" => "88.8"
                ],
                [
                    "usia" => "27",
                    "bb" => "12.7",
                    "tb" => "89.6"
                ],
                [
                    "usia" => "28",
                    "bb" => "12.9",
                    "tb" => "90.4"
                ],
                [
                    "usia" => "29",
                    "bb" => "13.1",
                    "tb" => "91.2"
                ],
                [
                    "usia" => "30",
                    "bb" => "13.3",
                    "tb" => "91.9"
                ],
                [
                    "usia" => "31",
                    "bb" => "13.5",
                    "tb" => "92.7"
                ],
                [
                    "usia" => "32",
                    "bb" => "13.7",
                    "tb" => "93.4"
                ],
                [
                    "usia" => "33",
                    "bb" => "13.8",
                    "tb" => "94.1"
                ],
                [
                    "usia" => "34",
                    "bb" => "14.0",
                    "tb" => "94.8"
                ],
                [
                    "usia" => "35",
                    "bb" => "14.2",
                    "tb" => "95.4"
                ],
                [
                    "usia" => "36",
                    "bb" => "14.3",
                    "tb" => "96.1"
                ],
                [
                    "usia" => "37",
                    "bb" => "14.5",
                    "tb" => "96.7"
                ],
                [
                    "usia" => "38",
                    "bb" => "14.7",
                    "tb" => "97.4"
                ],
                [
                    "usia" => "39",
                    "bb" => "14.8",
                    "tb" => "98.0"
                ],
                [
                    "usia" => "40",
                    "bb" => "15.0",
                    "tb" => "98.6"
                ],
                [
                    "usia" => "41",
                    "bb" => "15.2",
                    "tb" => "99.2"
                ],
                [
                    "usia" => "42",
                    "bb" => "15.3",
                    "tb" => "99.9"
                ],
                [
                    "usia" => "43",
                    "bb" => "15.5",
                    "tb" => "100.4"
                ],
                [
                    "usia" => "44",
                    "bb" => "15.7",
                    "tb" => "101.0"
                ],
                [
                    "usia" => "45",
                    "bb" => "15.8",
                    "tb" => "101.6"
                ],
                [
                    "usia" => "46",
                    "bb" => "16.0",
                    "tb" => "102.2"
                ],
                [
                    "usia" => "47",
                    "bb" => "16.2",
                    "tb" => "102.8"
                ],
                [
                    "usia" => "48",
                    "bb" => "16.3",
                    "tb" => "103.3"
                ],
                [
                    "usia" => "49",
                    "bb" => "16.5",
                    "tb" => "103.9"
                ],
                [
                    "usia" => "50",
                    "bb" => "16.7",
                    "tb" => "104.4"
                ],
                [
                    "usia" => "51",
                    "bb" => "16.8",
                    "tb" => "105.0"
                ],
                [
                    "usia" => "52",
                    "bb" => "17.0",
                    "tb" => "105.6"
                ],
                [
                    "usia" => "53",
                    "bb" => "17.2",
                    "tb" => "106.1"
                ],
                [
                    "usia" => "54",
                    "bb" => "17.3",
                    "tb" => "106.7"
                ],
                [
                    "usia" => "55",
                    "bb" => "17.5",
                    "tb" => "107.2"
                ],
                [
                    "usia" => "56",
                    "bb" => "17.7",
                    "tb" => "107.8"
                ],
                [
                    "usia" => "57",
                    "bb" => "17.8",
                    "tb" => "108.3"
                ],
                [
                    "usia" => "58",
                    "bb" => "18.0",
                    "tb" => "108.9"
                ],
                [
                    "usia" => "59",
                    "bb" => "18.2",
                    "tb" => "109.4"
                ],
                [
                    "usia" => "60",
                    "bb" => "18.3",
                    "tb" => "110.0"
                ]
            ];
        } else {
            $data['ideal'] = [
                [
                    "usia" => "0",
                    "bb" => "3.2",
                    "tb" => "49.1"
                ],
                [
                    "usia" => "1",
                    "bb" => "4.2",
                    "tb" => "53.7"
                ],
                [
                    "usia" => "2",
                    "bb" => "5.1",
                    "tb" => "57.1"
                ],
                [
                    "usia" => "3",
                    "bb" => "5.8",
                    "tb" => "59.8"
                ],
                [
                    "usia" => "4",
                    "bb" => "6.4",
                    "tb" => "62.1"
                ],
                [
                    "usia" => "5",
                    "bb" => "6.9",
                    "tb" => "64.0"
                ],
                [
                    "usia" => "6",
                    "bb" => "7.3",
                    "tb" => "65.7"
                ],
                [
                    "usia" => "7",
                    "bb" => "7.6",
                    "tb" => "67.3"
                ],
                [
                    "usia" => "8",
                    "bb" => "7.9",
                    "tb" => "68.7"
                ],
                [
                    "usia" => "9",
                    "bb" => "8.2",
                    "tb" => "70.1"
                ],
                [
                    "usia" => "10",
                    "bb" => "8.5",
                    "tb" => "71.5"
                ],
                [
                    "usia" => "11",
                    "bb" => "8.7",
                    "tb" => "72.8"
                ],
                [
                    "usia" => "12",
                    "bb" => "8.9",
                    "tb" => "74.0"
                ],
                [
                    "usia" => "13",
                    "bb" => "9.2",
                    "tb" => "75.2"
                ],
                [
                    "usia" => "14",
                    "bb" => "9.4",
                    "tb" => "76.4"
                ],
                [
                    "usia" => "15",
                    "bb" => "9.6",
                    "tb" => "77.5"
                ],
                [
                    "usia" => "16",
                    "bb" => "9.8",
                    "tb" => "78.6"
                ],
                [
                    "usia" => "17",
                    "bb" => "10.0",
                    "tb" => "79.7"
                ],
                [
                    "usia" => "18",
                    "bb" => "10.2",
                    "tb" => "80.7"
                ],
                [
                    "usia" => "19",
                    "bb" => "10.4",
                    "tb" => "81.7"
                ],
                [
                    "usia" => "20",
                    "bb" => "10.6",
                    "tb" => "82.7"
                ],
                [
                    "usia" => "21",
                    "bb" => "10.9",
                    "tb" => "83.7"
                ],
                [
                    "usia" => "22",
                    "bb" => "11.1",
                    "tb" => "84.6"
                ],
                [
                    "usia" => "23",
                    "bb" => "11.3",
                    "tb" => "85.5"
                ],
                [
                    "usia" => "24",
                    "bb" => "11.5",
                    "tb" => "85.7"
                ],
                [
                    "usia" => "25",
                    "bb" => "11.7",
                    "tb" => "86.6"
                ],
                [
                    "usia" => "26",
                    "bb" => "11.9",
                    "tb" => "87.4"
                ],
                [
                    "usia" => "27",
                    "bb" => "12.1",
                    "tb" => "88.3"
                ],
                [
                    "usia" => "28",
                    "bb" => "12.3",
                    "tb" => "89.1"
                ],
                [
                    "usia" => "29",
                    "bb" => "12.5",
                    "tb" => "89.9"
                ],
                [
                    "usia" => "30",
                    "bb" => "12.7",
                    "tb" => "90.7"
                ],
                [
                    "usia" => "31",
                    "bb" => "12.9",
                    "tb" => "91.4"
                ],
                [
                    "usia" => "32",
                    "bb" => "13.1",
                    "tb" => "92.2"
                ],
                [
                    "usia" => "33",
                    "bb" => "13.3",
                    "tb" => "92.9"
                ],
                [
                    "usia" => "34",
                    "bb" => "13.5",
                    "tb" => "93.6"
                ],
                [
                    "usia" => "35",
                    "bb" => "13.7",
                    "tb" => "94.4"
                ],
                [
                    "usia" => "36",
                    "bb" => "13.9",
                    "tb" => "95.1"
                ],
                [
                    "usia" => "37",
                    "bb" => "14.0",
                    "tb" => "95.7"
                ],
                [
                    "usia" => "38",
                    "bb" => "14.2",
                    "tb" => "96.4"
                ],
                [
                    "usia" => "39",
                    "bb" => "14.4",
                    "tb" => "97.1"
                ],
                [
                    "usia" => "40",
                    "bb" => "14.6",
                    "tb" => "97.7"
                ],
                [
                    "usia" => "41",
                    "bb" => "14.8",
                    "tb" => "98.4"
                ],
                [
                    "usia" => "42",
                    "bb" => "15.0",
                    "tb" => "99.0"
                ],
                [
                    "usia" => "43",
                    "bb" => "15.2",
                    "tb" => "99.7"
                ],
                [
                    "usia" => "44",
                    "bb" => "15.3",
                    "tb" => "100.3"
                ],
                [
                    "usia" => "45",
                    "bb" => "15.5",
                    "tb" => "100.9"
                ],
                [
                    "usia" => "46",
                    "bb" => "15.7",
                    "tb" => "101.5"
                ],
                [
                    "usia" => "47",
                    "bb" => "15.9",
                    "tb" => "102.1"
                ],
                [
                    "usia" => "48",
                    "bb" => "16.1",
                    "tb" => "102.7"
                ],
                [
                    "usia" => "49",
                    "bb" => "16.3",
                    "tb" => "103.3"
                ],
                [
                    "usia" => "50",
                    "bb" => "16.4",
                    "tb" => "103.9"
                ],
                [
                    "usia" => "51",
                    "bb" => "16.6",
                    "tb" => "104.5"
                ],
                [
                    "usia" => "52",
                    "bb" => "16.8",
                    "tb" => "105.0"
                ],
                [
                    "usia" => "53",
                    "bb" => "17.0",
                    "tb" => "105.6"
                ],
                [
                    "usia" => "54",
                    "bb" => "17.2",
                    "tb" => "106.2"
                ],
                [
                    "usia" => "55",
                    "bb" => "17.3",
                    "tb" => "106.7"
                ],
                [
                    "usia" => "56",
                    "bb" => "17.5",
                    "tb" => "107.3"
                ],
                [
                    "usia" => "57",
                    "bb" => "17.7",
                    "tb" => "107.8"
                ],
                [
                    "usia" => "58",
                    "bb" => "17.9",
                    "tb" => "108.4"
                ],
                [
                    "usia" => "59",
                    "bb" => "18.0",
                    "tb" => "108.9"
                ],
                [
                    "usia" => "60",
                    "bb" => "18.2",
                    "tb" => "109.4"
                ]
            ];
        }

        return view('user/newKmsOnline', $data);
    }

    public function forbidden()
    {

        return view('forbidden');
    }
}
