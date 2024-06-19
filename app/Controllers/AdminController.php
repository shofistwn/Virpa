<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use DateTime;

class AdminController extends BaseController
{
    const STATUS_GIZI_BURUK = 'Gizi Buruk';
    const STATUS_GIZI_KURANG = 'Gizi Kurang';
    const STATUS_GIZI_NORMAL = 'Normal';
    const STATUS_GIZI_BERESIKO_GIZI_LEBIH = 'Beresiko Gizi Lebih';
    const STATUS_GIZI_LEBIH = 'Gizi Lebih';
    const STATUS_GIZI_OBESITAS = 'Obese';

    public function __construct()
    {
        helper('form');
    }

    private function calculateImt($bb, $tb)
    {
        return $bb / (($tb / 100) * ($tb / 100));
    }

    function formatNumber($number)
    {
        if (strpos($number, '.') !== false) {
            $number = rtrim(rtrim($number, '0'), '.');
        }
        return $number;
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin',
            'breadcrumbs' => 'Dashboard',

        ];
        // get role and name from session
        $data['role'] = session()->get('level');
        $data['name'] = session()->get('nama_user');
        // get count data user from database where level = ibu
        $model = new \App\Models\UserModel();
        $data['jumlah_ibu'] = $model->where('level', 'ibu')->countAllResults();

        // get count data bayi from database
        $model = new \App\Models\BayiModel();
        $data['jumlah_bayi'] = $model->countAllResults();


        // join table bayi and user
        $model = new \App\Models\BayiModel();
        $data['bayi'] = $model->select('bayi.*, user.nama_user')->join('user', 'user.id_user = bayi.id_user')->findAll();



        return view('admin/pages/newDashboard', $data);
        // var_dump($data);
    }

    public function prosesKlasifikasi()
    {
        $data = [
            'title' => 'Proses Klasifikasi',
            'breadcrumbs' => 'Proses Klasifikasi',
        ];
        // get role and name from session
        $data['role'] = session()->get('level');
        $data['name'] = session()->get('nama_user');

        // get all data klasisfikasi from database
        $model = new \App\Models\DataKlasifikasi();

        $data['gizi_buruk'] = $model->where('status_gizi', 'Gizi Buruk')->countAllResults();
        $data['gizi_kurang'] = $model->where('status_gizi', 'Gizi Kurang')->countAllResults();
        $data['gizi_normal'] = $model->where('status_gizi', 'Normal')->countAllResults();
        $data['berisiko_gizi_lebih'] = $model->where('status_gizi', 'Berisiko Gizi Lebih')->countAllResults();
        $data['gizi_lebih'] = $model->where('status_gizi', 'Gizi Lebih')->countAllResults();
        $data['gizi_obesitas'] = $model->where('status_gizi', 'Obese')->countAllResults();

        $data['statusGiziBuruk'] = self::STATUS_GIZI_BURUK;
        $data['statusGiziKurang'] = self::STATUS_GIZI_KURANG;
        $data['statusGiziNormal'] = self::STATUS_GIZI_NORMAL;
        $data['statusGiziBeresikoGiziLebih'] = self::STATUS_GIZI_BERESIKO_GIZI_LEBIH;
        $data['statusGiziLebih'] = self::STATUS_GIZI_LEBIH;
        $data['statusGiziObesitas'] = self::STATUS_GIZI_OBESITAS;

        return view('admin/pages/newDataKlasifikasi', $data);
    }

    public function prosesEditKlasifikasi()
    {
        $id = $this->request->getGet('id');

        $data = [
            'title' => 'Edit Klasifikasi',
            'breadcrumbs' => 'Edit Klasifikasi',
        ];

        // // get role and name from session
        $data['role'] = session()->get('level');
        $data['name'] = session()->get('nama_user');

        // // get all data klasisfikasi from database
        $model = new \App\Models\DataKlasifikasi();
        $data['klasifikasi'] = $model->find($id);

        $data['klasifikasi']['berat_badan'] = $this->formatNumber($data['klasifikasi']['berat_badan']);
        $data['klasifikasi']['tinggi_badan_cm'] = $this->formatNumber($data['klasifikasi']['tinggi_badan_cm']);
        $data['klasifikasi']['lingkar_kepala'] = $this->formatNumber($data['klasifikasi']['lingkar_kepala']);

        $data['statusGizi'] = [
            self::STATUS_GIZI_BURUK,
            self::STATUS_GIZI_KURANG,
            self::STATUS_GIZI_NORMAL,
            self::STATUS_GIZI_BERESIKO_GIZI_LEBIH,
            self::STATUS_GIZI_LEBIH,
            self::STATUS_GIZI_OBESITAS,
        ];

        return view('admin/pages/formEditKlasifikasi', $data);
    }

    public function prosesUpdateKlasifikasi()
    {
        $id = $this->request->getPost('id_klasifikasi');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $umur = $this->request->getPost('umur');
        $berat_badan = $this->request->getPost('berat_badan');
        $tinggi_badan = $this->request->getPost('tinggi_badan');
        $lingkar_kepala = $this->request->getPost('lingkar_kepala');

        $imt = $this->calculateImt($berat_badan, $tinggi_badan);

        $AiController = new AiController();
        $result = $AiController->directMethod([
            'imt' => $imt,
        ]);

        $data = array(
            'jenis_kelamin' => $jenis_kelamin,
            'umur' => $umur,
            'berat_badan' => $berat_badan,
            'tinggi_badan_cm' => $tinggi_badan,
            'tinggi_badan_m' => ($tinggi_badan ?? 0) / 100,
            'lingkar_kepala' => $lingkar_kepala,
            'imt' => $imt,
            'status_gizi' => $result['status_gizi'][0]['status_gizi'],
        );

        try {
            $model = new \App\Models\DataKlasifikasi();
            $model->update($id, $data);
        } catch (\Exception $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->to(base_url('admin/proses-klasifikasi'));
        }

        session()->setFlashdata('success_form', 'Data klasifikasi berhasil diubah');
        return redirect()->to(base_url('admin/proses-klasifikasi'));
    }

    public function prosesDeleteKlasifikasi()
    {
        $id = $this->request->getGet('id');

        try {
            $model = new \App\Models\DataKlasifikasi();
            $model->delete($id);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => false,
                'message' => $e->getMessage(),
            ])->setStatusCode(500);
        }

        session()->setFlashdata('success_form', 'Data klasifikasi berhasil dihapus!');
        return redirect()->to(base_url('admin/proses-klasifikasi'));
    }

    public function ajaxKlasifikasi()
    {
        $model = new \App\Models\DataKlasifikasi();
        $data = $model->orderBy('id_klasifikasi', 'DESC')->findAll();

        $AiController = new AiController();

        $dataKlasifikasi = [];
        foreach ($data as $klasifikasi) {
            $imt = $this->calculateImt($klasifikasi['berat_badan'], $klasifikasi['tinggi_badan_cm']);
            $result = $AiController->directMethod([
                'imt' => $imt,
            ]);
            $dataKlasifikasi[] = $klasifikasi;
        }

        return $this->response->setJSON([
            'data' => $dataKlasifikasi,
        ])->setStatusCode(200);
    }

    public function getDataKlasifikasi()
    {
        $berat_badan = $this->request->getGet('berat_badan');
        $tinggi_badan_cm = $this->request->getGet('tinggi_badan_cm');

        if (is_numeric($berat_badan) && is_numeric($tinggi_badan_cm) && $berat_badan >= 0.5 && $tinggi_badan_cm > 0) {
            $data = array(
                'berat_badan' => $berat_badan,
                'tinggi_badan_cm' => $tinggi_badan_cm,
                'tinggi_badan_m' => $tinggi_badan_cm / 100,
                'imt' => $this->calculateImt($berat_badan, $tinggi_badan_cm),
            );

            try {
                $model = new \App\Models\DataKlasifikasi();
                $model->insert($data);
            } catch (\Exception $e) {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => $e->getMessage(),
                ])->setStatusCode(500);
            }
        } else {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Data yang diterima tidak valid',
            ])->setStatusCode(400);
        }

        return $this->response->setJSON([
            'status' => $model->resultID,
            'message' => 'Data berhasil disimpan',
        ])->setStatusCode(200);
    }

    public function pertumbuhanBalita()
    {
        $data = [
            'title' => 'Pertumbuhan Balita',
            'breadcrumbs' => 'Pertumbuhan Balita',
        ];
        // get role and name from session
        $data['role'] = session()->get('level');
        $data['name'] = session()->get('nama_user');

        // join table bayi and user
        $model = new \App\Models\BayiModel();
        $data['bayi'] = $model->select('bayi.*, user.nama_user')->join('user', 'user.id_user = bayi.id_user')->findAll();

        $bayiData = $model->select('bayi.*, user.nama_user')->join('user', 'user.id_user = bayi.id_user')->findAll();
        // initialize the kunjungan array
        $kunjungan = [];


        $hasilPerhitungan = [];


        // loop through the bayi data and group by month and year
        foreach ($bayiData as $bayi) {
            $bulan = date('m', strtotime($bayi['created_at']));
            $tahun = date('Y', strtotime($bayi['created_at']));
            $kunjungan[$tahun][$bulan][] = $bayi;

            $tahunBayi = date('Y', strtotime($bayi['created_at']));
            $bulanBayi = date('m', strtotime($bayi['created_at']));

            // Hitung jumlah bayi berdasarkan status gizi per bulan
            if (!isset($hasilPerhitungan[$tahunBayi][$bulanBayi])) {
                $hasilPerhitungan[$tahunBayi][$bulanBayi] = [
                    'tahun' => $tahunBayi,
                    'bulan' => $bulanBayi,
                    'Obese' => 0,
                    'Kurang Gizi' => 0,
                    'Buruk' => 0,
                    'Normal' => 0,
                    'Lebih' => 0,
                ];
            }

            if (!isset($hasilPerhitungan[$tahunBayi][$bulanBayi][$bayi['status_gizi']])) {
                $hasilPerhitungan[$tahunBayi][$bulanBayi][$bayi['status_gizi']] = 0;
            }

            $hasilPerhitungan[$tahunBayi][$bulanBayi][$bayi['status_gizi']]++;

            // // Hitung jumlah bayi berdasarkan status gizi per tahun
            // if (!isset($hasilPerhitungan[$tahunBayi]['Total'])) {
            //     $hasilPerhitungan[$tahunBayi]['Total'] = [
            //         'tahun' => $tahunBayi,
            //         'bulan' => 'Total',
            //         'Obese' => 0,
            //         'Kurang Gizi' => 0,
            //         'Buruk' => 0,
            //         'Normal' => 0,
            //         'Lebih' => 0,
            //     ];
            // }

            // $hasilPerhitungan[$tahunBayi]['Total'][$bayi['status_gizi']]++;
        }

        $data['hasilPerhitungan'] = $hasilPerhitungan;

        // loop through the kunjungan array and generate the data for the chart
        $kunjunganArr = [];
        for ($i = 1; $i <= 12; $i++) {
            $jumlahKunjungan = 0;
            foreach ($kunjungan as $tahun => $bulanData) {
                if (isset($bulanData[str_pad($i, 2, '0', STR_PAD_LEFT)])) {
                    $jumlahKunjungan += count($bulanData[str_pad($i, 2, '0', STR_PAD_LEFT)]);
                }
            }
            $kunjunganArr[] = $jumlahKunjungan;
        }
        $data['kunjungan'] = "[" . implode(", ", $kunjunganArr) . "]";


        // get all umur values from database
        $umurValues = $model->distinct()->select('umur')->findAll();

        // initialize the array to store the average imt values
        $averageImtValues = [];

        // initialize the array to store the imt sum for each umur value
        $imtSumValues = [];

        // loop through the umur values and calculate the average imt value for each umur value
        foreach ($umurValues as $umurValue) {
            $umur = $umurValue['umur'];
            $imtValues = $model->select('imt')->where('umur', $umur)->findAll();
            $imtSum = 0;
            foreach ($imtValues as $imtValue) {
                $imtSum += $imtValue['imt'];
            }
            $averageImtValues[] = [
                'umur' => $umur,
                'average_imt' => count($imtValues) > 0 ? $imtSum / count($imtValues) : 0
            ];
            $imtSumValues[] = [
                'umur' => $umur,
                'imt_sum' => $imtSum
            ];
        }

        // sort the $averageImtValues array by umur value
        usort($averageImtValues, function ($a, $b) {
            return $a['umur'] - $b['umur'];
        });

        // sort the $imtSumValues array by umur value
        usort($imtSumValues, function ($a, $b) {
            return $a['umur'] - $b['umur'];
        });

        // generate the string representation of the umur and average_imt arrays
        $umurArray = array_map(function ($value) {
            return $value['umur'];
        }, $averageImtValues);
        $averageImtArray = array_map(function ($value) {
            return $value['average_imt'];
        }, $averageImtValues);
        $imtSumArray = array_map(function ($value) {
            return $value['imt_sum'];
        }, $imtSumValues);
        $umurString = '[' . implode(',', $umurArray) . ']';
        $averageImtString = '[' . implode(',', $averageImtArray) . ']';
        $imtSumString = '[' . implode(',', $imtSumArray) . ']';
        $data['umur'] = $umurString;
        $data['average_imt'] = $averageImtString;
        $data['imt_sum'] = $imtSumString;


        $data['gizi_buruk'] = $model->where('status_gizi', 'Gizi Buruk')->countAllResults();
        $data['gizi_kurang'] = $model->where('status_gizi', 'Gizi Kurang')->countAllResults();
        $data['gizi_normal'] = $model->where('status_gizi', 'Normal')->countAllResults();

        $data['berisiko_gizi_lebih'] = $model->where('status_gizi', 'Berisiko Gizi Lebih')->countAllResults();
        $data['gizi_lebih'] = $model->where('status_gizi', 'Gizi Lebih')->countAllResults();
        $data['gizi_obesitas'] = $model->where('status_gizi', 'Obese')->countAllResults();

        return view('admin/pages/newPertumbuhanBalita', $data);
    }

    public function dataBalita()
    {
        $data = [
            'title' => 'Data Balita',
            'breadcrumbs' => 'Data Balita',
        ];

        // get role and name from session
        $data['role'] = session()->get('level');
        $data['name'] = session()->get('nama_user');

        // get all data bayi from database
        $model = new \App\Models\BayiModel();
        $data['bayi'] = $model->findAll();



        return view('admin/pages/newDataBalita', $data);
    }

    public function sdidtk()
    {
        $data = [
            'title' => 'Format SDIDTK',
            'breadcrumbs' => 'Format SDIDTK',
            'radio' => true
        ];
        // get role and name from session
        $data['role'] = session()->get('level');
        $data['name'] = session()->get('nama_user');
        return view('admin/pages/newSdidtk', $data);
    }

    public function formBayi($id = null)
    {
        $data = [
            'title' => empty($id) ? 'Tambah' : 'Edit' . ' Data Bayi',
            'breadcrumbs' => empty($id) ? 'Tambah Data Bayi' : 'Edit Data Bayi',
        ];

        // get role and name from session
        $data['role'] = session()->get('level');
        $data['name'] = session()->get('nama_user');

        // get all data ibu from database using dependency injection
        $model = new \App\Models\UserModel();
        $data['dataIbu'] = $model->where('level', 'ibu')->findAll();

        // If $id is provided, it's an edit operation
        if (!empty($id)) {
            // get data bayi from database using dependency injection
            $bayiModel = new \App\Models\BayiModel();
            $data['bayi'] = $bayiModel->find($id);

            // get data ibu with id_user from data bayi
            $data['ibu'] = null;
            if (!empty($data['bayi']['id_user'])) {
                $ibu = new \App\Models\UserModel();
                $data['ibu'] = $ibu->find($data['bayi']['id_user']);
            }
        }

        return view('admin/pages/formDataBalita', $data);
    }
    public function tambahBayi()
    {
        $data = [
            'title' => 'Tambah Data Bayi',
            'breadcrumbs' => 'Tambah Data Bayi',
        ];
        // get role and name from session
        $data['role'] = session()->get('level');
        $data['name'] = session()->get('nama_user');


        // get all data ibu from database
        $model = new \App\Models\UserModel();
        $data['ibu'] = $model->where('level', 'ibu')->findAll();

        return view('admin/pages/formDataBalita', $data);
    }

    public function editBayi($id)
    {
        $data = [
            'title' => 'Edit Data Bayi',
            'breadcrumbs' => 'Edit Data Bayi',
        ];
        // get role and name from session
        $data['role'] = session()->get('level');
        $data['name'] = session()->get('nama_user');

        // get data bayi from database
        $model = new \App\Models\BayiModel();
        $data['bayi'] = $model->find($id);

        // get data ibu with id_user from data bayi
        $data['ibu'] = null;
        if (!empty($data['bayi']['id_user'])) {
            $ibu = new \App\Models\UserModel();
            $data['ibu'] = $ibu->find($data['bayi']['id_user']);
        } else {
            // get all data ibu from database
            $ibu = new \App\Models\UserModel();
            $data['ibu'] = $ibu->where('level', 'ibu')->findAll();
        }


        return view('admin/pages/editBayi', $data);
    }

    public function deleteBayi($id)
    {
        // detele data bayi from database
        $model = new \App\Models\BayiModel();
        $model->delete($id);

        // use flashdata to show alert success
        session()->setFlashdata('success_form', 'Data bayi berhasil dihapus');

        // redirect to data balita
        return redirect()->to(base_url('admin/data-balita'));
    }

    public function prosesTambahBayi()
    {
        $id_user = $this->request->getPost('ibu');
        $nama_bayi = $this->request->getPost('nama_bayi');
        $tgl_lahir = $this->request->getPost('tgl_lahir');
        $berat_badan = $this->request->getPost('berat_badan');
        $tinggi_badan = $this->request->getPost('tinggi_badan');
        $lingkar_kepala = $this->request->getPost('lingkar_kepala');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');

        try {
            if (!isset($id_user)) {
                throw new \Exception('Data ibu tidak boleh kosong');
            }
            if (!isset($jenis_kelamin)) {
                throw new \Exception('Jenis kelamin tidak boleh kosong');
            }
            if (!isset($tgl_lahir)) {
                throw new \Exception('Tanggal lahir tidak boleh kosong');
            }

            $tgl_lahir_dt = new DateTime($tgl_lahir ?? '');
            $sekarang_dt = new DateTime();
            $diff = $tgl_lahir_dt->diff($sekarang_dt);
            $umur = $diff->y * 12 + $diff->m;

            if (!isset($berat_badan) || !is_numeric($berat_badan) || $berat_badan <= 0)
                throw new \Exception('Berat badan tidak boleh kosong dan harus lebih dari 0');
            if (!isset($tinggi_badan) || !is_numeric($tinggi_badan) || $tinggi_badan <= 0)
                throw new \Exception('Tinggi badan tidak boleh kosong dan harus lebih dari 0');

            $imt = $this->calculateImt($berat_badan, $tinggi_badan);

            $AiController = new AiController();
            $result = $AiController->directMethod([
                'imt' => $imt,
            ]);

            $data = array(
                'id_user' => $id_user,
                'kode_bayi' => $this->generateKodeBayi(),
                'nama_bayi' => $nama_bayi,
                'tgl_lahir' => $tgl_lahir,
                'umur' => $umur,
                'berat_badan' => $berat_badan,
                'tinggi_badan' => $tinggi_badan,
                'lingkar_kepala' => $lingkar_kepala,
                'jenis_kelamin' => $jenis_kelamin,
                'imt' => $this->calculateImt($berat_badan, $tinggi_badan),
                'status_gizi' => $result['status_gizi'][0]['status_gizi'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            $model = new \App\Models\BayiModel();
            $model->insert($data);
        } catch (\Exception $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->to(base_url('admin/tambah-data-bayi'));
        }

        session()->setFlashdata('success_form', 'Data bayi berhasil ditambahkan');
        return redirect()->to(base_url('admin/data-balita'));
    }

    public function generateKodeBayi()
    {
        $model = new \App\Models\BayiModel();
        $kode_bayi = rand(1000, 9999);
        $is_exist = $model->where('kode_bayi', $kode_bayi)->first();
        while ($is_exist) {
            $kode_bayi = rand(1000, 9999);
            $is_exist = $model->where('kode_bayi', $kode_bayi)->first();
        }
        return $kode_bayi;
    }

    public function prosesEditBayi()
    {
        $id_bayi = $this->request->getPost('id_bayi');
        $id_user = $this->request->getPost('ibu');
        $nama_bayi = $this->request->getPost('nama_bayi');
        $tgl_lahir = $this->request->getPost('tgl_lahir');
        $berat_badan = $this->request->getPost('berat_badan');
        $tinggi_badan = $this->request->getPost('tinggi_badan');
        $lingkar_kepala = $this->request->getPost('lingkar_kepala');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');

        try {
            if (!isset($id_user)) {
                throw new \Exception('Data ibu tidak boleh kosong');
            }
            if (!isset($jenis_kelamin)) {
                throw new \Exception('Jenis kelamin tidak boleh kosong');
            }
            if (!isset($tgl_lahir)) {
                throw new \Exception('Tanggal lahir tidak boleh kosong');
            }

            $tgl_lahir_dt = new DateTime($tgl_lahir ?? '');
            $sekarang_dt = new DateTime();
            $diff = $tgl_lahir_dt->diff($sekarang_dt);
            $umur = $diff->y * 12 + $diff->m;

            if (!isset($berat_badan) || !is_numeric($berat_badan) || $berat_badan <= 0)
                throw new \Exception('Berat badan tidak boleh kosong dan harus lebih dari 0');
            if (!isset($tinggi_badan) || !is_numeric($tinggi_badan) || $tinggi_badan <= 0)
                throw new \Exception('Tinggi badan tidak boleh kosong dan harus lebih dari 0');

            $imt = $this->calculateImt($berat_badan, $tinggi_badan);

            $AiController = new AiController();
            $result = $AiController->directMethod([
                'imt' => $imt,
            ]);

            $data = array(
                'id_user' => $id_user,
                'nama_bayi' => $nama_bayi,
                'tgl_lahir' => $tgl_lahir,
                'umur' => $umur,
                'berat_badan' => $berat_badan,
                'tinggi_badan' => $tinggi_badan,
                'lingkar_kepala' => $lingkar_kepala,
                'jenis_kelamin' => $jenis_kelamin,
                'imt' => $this->calculateImt($berat_badan, $tinggi_badan),
                'status_gizi' => $result['status_gizi'][0]['status_gizi'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            $model = new \App\Models\BayiModel();
            $model->update($id_bayi, $data);
        } catch (\Exception $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->to(base_url('admin/tambah-data-bayi'));
        }

        session()->setFlashdata('success_form', 'Data bayi berhasil diubah');
        return redirect()->to(base_url('admin/data-balita'));
    }


    public function print()
    {
        $nama_bayi = $this->request->getPost('nama_bayi');
        $usia_bayi = $this->request->getPost('usia_bayi');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $berat_badan = $this->request->getPost('berat_badan');
        $tinggi_badan = $this->request->getPost('tinggi_badan');
        $lingkar_kepala = $this->request->getPost('lingkar_kepala');
        $imt = $this->request->getPost('imt');
        $status_gizi = $this->request->getPost('status_gizi');
        $gerak_kasar = $this->request->getPost('gerak_kasar');
        $gerak_halus = $this->request->getPost('gerak_halus');
        $bicara_bahasa = $this->request->getPost('bicara_bahasa');
        $sos_kem = $this->request->getPost('sos_kem');
        $postData = [
            'nama_bayi' => $nama_bayi,
            'usia_bayi' => $usia_bayi,
            'jenis_kelamin' => $jenis_kelamin,
            'berat_badan' => $berat_badan,
            'tinggi_badan' => $tinggi_badan,
            'lingkar_kepala' => $lingkar_kepala,
            'imt' => $imt,
            'status_gizi' => $status_gizi,
            'gerak_kasar' => $gerak_kasar,
            'gerak_halus' => $gerak_halus,
            'bicara_bahasa' => $bicara_bahasa,
            'sos_kem' => $sos_kem,

        ];

        return view('admin/pages/print', $postData);
    }

    public function getOneDataBayiByKodeBayi()
    {
        $kode_bayi = $this->request->getPost('kode_bayi');
        $model = new \App\Models\BayiModel();
        $data = $model->where('kode_bayi', $kode_bayi)->first();
        // echo json_encode($data);
        return json_encode($data);
    }

    public function dataIbu()
    {
        $data = [
            'title' => 'Data Ibu',
            'breadcrumbs' => 'Data Ibu',
        ];

        // get role and name from session
        $data['role'] = session()->get('level');
        $data['name'] = session()->get('nama_user');

        // get all data ibu from database
        $model = new \App\Models\UserModel();
        $data['ibu'] = $model->where('level', 'ibu')->findAll();

        return view('admin/pages/newDataIbu', $data);
    }

    public function deleteIbu($id)
    {
        // detele data ibu from database
        $model = new \App\Models\UserModel();
        $model->delete($id);

        $bayimodel = new \App\Models\BayiModel();
        $bayimodel->where('id_user', $id)->delete();


        // use flashdata to show alert success
        session()->setFlashdata('success_form', 'Data ibu berhasil dihapus');

        // redirect to data ibu
        return redirect()->to(base_url('admin/data-ibu'));
    }


    public function apiTambahDataBayi()
    {

        // get data from form
        $berat_badan = $this->request->getPost('berat_badan');
        $tinggi_badan = $this->request->getPost('tinggi_badan');
        $lingkar_kepala = $this->request->getPost('lingkar_kepala');

        // generate kode bayi
        $kode_bayi = $this->generateKodeBayi();
        $data_for_insert = [
            'kode_bayi' => $kode_bayi,
            'berat_badan' => $berat_badan,
            'tinggi_badan' => $tinggi_badan,
            'lingkar_kepala' => $lingkar_kepala,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // insert data bayi to database
        $model = new \App\Models\BayiModel();
        if ($model->insert($data_for_insert)) {
            // return success response
            return $this->response->setJSON(['status' => 'success', 'message' => 'Data bayi berhasil ditambahkan']);
        } else {
            // return error response
            return $this->response->setJSON(['status' => 'error', 'message' => 'Terjadi kesalahan saat menambahkan data bayi']);
        }
    }

    public function kms()
    {
        $data = [
            'title' => 'KMS',
            'breadcrumbs' => 'KMS',
            'radio' => true
        ];
        // get role and name from session
        $data['role'] = session()->get('level');
        $data['name'] = session()->get('nama_user');

        // get all data ibu from database
        $model = new \App\Models\UserModel();
        $data['ibu'] = $model->select('*')
            ->join('bayi', 'user.id_user = bayi.id_user')
            ->where('bayi.id_user IS NOT NULL')
            ->where('level', 'ibu')
            ->orderBy('user.created_at', 'DESC') // Order by timestamp in descending order
            ->findAll();
        return view('admin/pages/newKms', $data);
    }

    public function kms_online()
    {

        $id_user = $this->request->getPostGet('id_user');

        $data = [
            'title' => 'KMS Online',
            'breadcrumbs' => 'KMS Online',
        ];

        // get role and name from session
        $data['role'] = session()->get('level');
        $data['name'] = session()->get('nama_user');

        $bayiModel = new \App\Models\BayiModel();
        $data['latest_bayi'] = $bayiModel->find($id_user);

        $beratArr = [];

        $beratArr[0] = ['x' => $data['latest_bayi']['umur'], 'y' => $data['latest_bayi']['imt'], 'status_gizi' => $data['latest_bayi']['status_gizi']];

        $data['grafik'] = $beratArr;

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

        return view('admin/pages/newKmsOnline', $data);
    }

    public function editIbu()
    {
        $id = $this->request->getGet('id');
        $data = [
            'title' => 'Edit Ibu',
            'breadcrumbs' => 'Edit Ibu',
        ];

        // get role and name from session
        $data['role'] = session()->get('level');
        $data['name'] = session()->get('nama_user');

        // get all data ibu from database
        $model = new \App\Models\UserModel();
        $data['ibu'] = $model->where('level', 'ibu')->find($id);

        return view('admin/pages/formEditIbu', $data);
    }

    public function updateIbu()
    {
        $id = $this->request->getPost('id_user');
        $nama_user = $this->request->getPost('nama_user');
        $telepon = $this->request->getPost('telepon');
        $email = $this->request->getPost('email');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $data = array(
            'nama_user' => $nama_user,
            'telepon' => $telepon,
            'email' => $email,
            'username' => $username,
        );

        if (!empty($password) && is_string($password)) {
            $data['password'] = password_hash($password, PASSWORD_BCRYPT);
        }

        try {
            $model = new \App\Models\UserModel();
            $model->update($id, $data);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => false,
                'message' => $e->getMessage(),
            ])->setStatusCode(500);
        }

        session()->setFlashdata('success_form', 'Data ibu berhasil diubah');
        return redirect()->to(base_url('admin/data-ibu'));
    }
}
