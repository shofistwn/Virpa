<?= $this->extend('admin/layouts/newTemplates'); ?>

<?= $this->section('content'); ?>

<div class="col-12">
    <div class="row">
        <!-- <div class="col-6">
            <div class="card card-success">
                <div class="card-header">

                    <h3 class="card-title">Grafik KMS Anak</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="bmiChart" style="width: 100%; height: 400px;"></canvas>

                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Grafik Permenkes</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="combinedChart" style="width: 100%; height: 400px;"></canvas>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="row">
        <div class="col-12">
            <div class="card card-success">
                <div class="card-header">
                    <h4 class="card-title">Data Balita</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="first-name-horizontal">Nama</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="first-name-horizontal">:</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <label for="first-name-horizontal"><?= $latest_bayi['nama_bayi']; ?></label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="email-horizontal">Umur</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="first-name-horizontal">:</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <label for="email-horizontal"><?= $latest_bayi['umur']; ?> bulan</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="contact-info-horizontal">Berat Badan</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="first-name-horizontal">:</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <label for="contact-info-horizontal"><?= $latest_bayi['berat_badan']; ?> kg</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="contact-info-horizontal">Tinggi Badan</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="first-name-horizontal">:</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <label for="contact-info-horizontal"><?= $latest_bayi['tinggi_badan']; ?> cm</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="contact-info-horizontal">Lingkar Kepala</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="first-name-horizontal">:</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <label for="contact-info-horizontal"><?= $latest_bayi['lingkar_kepala']; ?> cm</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="contact-info-horizontal">Lingkar Kepala</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="first-name-horizontal">:</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <label for="contact-info-horizontal"><?= empty($latest_bayi['jenis_kelamin']) ? '' : ($latest_bayi['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan') ?></label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="contact-info-horizontal">IMT</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="first-name-horizontal">:</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <label for="contact-info-horizontal"><?= $latest_bayi['imt']; ?></label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="contact-info-horizontal">Status</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="first-name-horizontal">:</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <label for="contact-info-horizontal"><?= $latest_bayi['status_gizi']; ?></label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$tbIdeal = 0;
$bbIdeal = 0;

?>
<?php foreach ($ideal as $value) {
    if ($latest_bayi['umur'] == $value['usia']) {
        $tbIdeal = $value['tb'];
        $bbIdeal = $value['bb'];
    }
} ?>
<?php $anjuran_1 = [
    [
        "Umur" => "0 - 5 bulan",
        "Berat badan (Kg)" => "6",
        "Tinggi Badan (Cm)" => "60",
        "Energi (kkal)" => "550",
        "Protein (g)" => "9",
        "Total" => "31",
        "Omega 3" => "0,5",
        "Omega 6" => "4,4",
        "Karbohidrat (g)" => "59",
        "Serat (g)" => "0",
        "Air (ml)" => "700"
    ],
    [
        "Umur" => "6 - 11 bulan ",
        "Berat badan (Kg)" => "9",
        "Tinggi Badan (Cm)" => "72",
        "Energi (kkal)" => "800",
        "Protein (g)" => "15",
        "Total" => "35",
        "Omega 3" => "0,5",
        "Omega 6" => "4,4",
        "Karbohidrat (g)" => "105",
        "Serat (g)" => "11",
        "Air (ml)" => "900"
    ],
    [
        "Umur" => "12 - 36 bulan",
        "Berat badan (Kg)" => "13",
        "Tinggi Badan (Cm)" => "92",
        "Energi (kkal)" => "1350",
        "Protein (g)" => "20",
        "Total" => "45",
        "Omega 3" => "0,7",
        "Omega 6" => "7",
        "Karbohidrat (g)" => "215",
        "Serat (g)" => "19",
        "Air (ml)" => "1150"
    ],
    [
        "Umur" => "37 - 72 bulan",
        "Berat badan (Kg)" => "19",
        "Tinggi Badan (Cm)" => "113",
        "Energi (kkal)" => "1400",
        "Protein (g)" => "25",
        "Total" => "50",
        "Omega 3" => "0,9",
        "Omega 6" => "10",
        "Karbohidrat (g)" => "220",
        "Serat (g)" => "20",
        "Air (ml)" => "1450"
    ]
]; ?>

<?php $anjuran_2 = [
    [
        "Umur" => "0 - 5 bulan",
        "Vit. A" => "375",
        "Vit. D" => "10",
        "Vit. E" => "4",
        "Vit. K" => "5",
        "Vit. B1" => "0,2",
        "Vit. B2" => "0,3",
        "Vit. B3" => "2",
        "Vit. B5 (Pantotenat)" => "1,7",
        "Vit. B6" => "0,1",
        "Folat" => "80",
        "Vit. B12" => "0,4",
        "Biotin" => "5",
        "Kolin" => "125",
        "Vit. C" => "40"
    ],
    [
        "Umur" => "6 - 11 bulan",
        "Vit. A" => "400",
        "Vit. D" => "10",
        "Vit. E" => "5",
        "Vit. K" => "10",
        "Vit. B1" => "0,3",
        "Vit. B2" => "0,4",
        "Vit. B3" => "4",
        "Vit. B5 (Pantotenat)" => "1,8",
        "Vit. B6" => "0,3",
        "Folat" => "80",
        "Vit. B12" => "1,5",
        "Biotin" => "6",
        "Kolin" => "150",
        "Vit. C" => "50"
    ],
    [
        "Umur" => "12 - 36 bulan",
        "Vit. A" => "400",
        "Vit. D" => "15",
        "Vit. E" => "6",
        "Vit. K" => "15",
        "Vit. B1" => "0,5",
        "Vit. B2" => "0,5",
        "Vit. B3" => "6",
        "Vit. B5 (Pantotenat)" => "2",
        "Vit. B6" => "0,5",
        "Folat" => "160",
        "Vit. B12" => "1,5",
        "Biotin" => "8",
        "Kolin" => "200",
        "Vit. C" => "40"
    ],
    [
        "Umur" => "37 - 72 bulan",
        "Vit. A" => "450",
        "Vit. D" => "15",
        "Vit. E" => "7",
        "Vit. K" => "20",
        "Vit. B1" => "0,6",
        "Vit. B2" => "0,6",
        "Vit. B3" => "8",
        "Vit. B5 (Pantotenat)" => "3",
        "Vit. B6" => "0,6",
        "Folat" => "200",
        "Vit. B12" => "1,5",
        "Biotin" => "12",
        "Kolin" => "250",
        "Vit. C" => "45"
    ]
]; ?>

<?php $anjuran_3 = [
    [
        "Umur" => "0 - 5 bulan",
        "Kalsium" => "200",
        "Fosfor" => "100",
        "Magnesium" => "30",
        "Besi" => "0,3",
        "Iodium" => "90",
        "Seng" => "1,1",
        "Selenium" => "7",
        "Mangan" => "0,003",
        "Flour" => "0,01",
        "Kromium" => "0,2",
        "Kalium" => "400",
        "Natrium" => "120",
        "Klor" => "180",
        "Tembaga" => "200"
    ],
    [
        "Umur" => "6 - 11 bulan",
        "Kalsium" => "270",
        "Fosfor" => "275",
        "Magnesium" => "55",
        "Besi" => "11",
        "Iodium" => "120",
        "Seng" => "3",
        "Selenium" => "10",
        "Mangan" => "0,7",
        "Flour" => "0,5",
        "Kromium" => "6",
        "Kalium" => "700",
        "Natrium" => "370",
        "Klor" => "570",
        "Tembaga" => "220"
    ],
    [
        "Umur" => "12 - 36 bulan",
        "Kalsium" => "650",
        "Fosfor" => "460",
        "Magnesium" => "65",
        "Besi" => "7",
        "Iodium" => "90",
        "Seng" => "3",
        "Selenium" => "18",
        "Mangan" => "1,2",
        "Flour" => "0,7",
        "Kromium" => "14",
        "Kalium" => "2600",
        "Natrium" => "800",
        "Klor" => "1200",
        "Tembaga" => "340"
    ],
    [
        "Umur" => "37 - 72 bulan",
        "Kalsium" => "1000",
        "Fosfor" => "500",
        "Magnesium" => "95",
        "Besi" => "10",
        "Iodium" => "120",
        "Seng" => "5",
        "Selenium" => "21",
        "Mangan" => "1,5",
        "Flour" => "1",
        "Kromium" => "16",
        "Kalium" => "2700",
        "Natrium" => "900",
        "Klor" => "1300",
        "Tembaga" => "440"
    ]
]; ?>

<?php $refMakan = [
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Cah Brokoli Sosis",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "157,3 kkal"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Cah Brokoli Sosis",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "6,9 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Cah Brokoli Sosis",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "8,1 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Cah Brokoli Sosis",
        "Kandungan Gizi" => "Karbohidrat",
        "Jumlah" => "16,5 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Tumis Makaroni",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "191,5 kkal"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Tumis Makaroni",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "7,3 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Tumis Makaroni",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "3,6 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Tumis Makaroni",
        "Kandungan Gizi" => "Karbohidrat",
        "Jumlah" => "32,4 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Pangsit Kuah",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "207,8 kkal"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Pangsit Kuah",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "18,4 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Pangsit Kuah",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "11 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Pangsit Kuah",
        "Kandungan Gizi" => "Karbohidrat",
        "Jumlah" => "8,1 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Sup Kacang Merah",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "138,4 kkal"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Sup Kacang Merah",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "8,6 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Sup Kacang Merah",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "3,4 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Sup Kacang Merah",
        "Kandungan Gizi" => "Karbohidrat",
        "Jumlah" => "16,9 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Timlo Ayam",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "190,9 kkal"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Timlo Ayam",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "11,3 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Timlo Ayam",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "8,2 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Timlo Ayam",
        "Kandungan Gizi" => "Karbohidrat",
        "Jumlah" => "17,3 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Bakso Sehat",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "23,9 kkal"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Bakso Sehat",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "1,9 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Bakso Sehat",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "1,2 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Bakso Sehat",
        "Kandungan Gizi" => "Karbohidrat",
        "Jumlah" => "1,5 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Nugget Ikan Tahu",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "120,1 kkal"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Nugget Ikan Tahu",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "10,2 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Nugget Ikan Tahu",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "6,2 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Nugget Ikan Tahu",
        "Kandungan Gizi" => "Karbohidrat",
        "Jumlah" => "6 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Bola Daging Kecap",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "174,8 kkal"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Bola Daging Kecap",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "9,3 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Bola Daging Kecap",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "6,4 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Bola Daging Kecap",
        "Kandungan Gizi" => "Karbohidrat",
        "Jumlah" => "20,5 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Rolade Tahu Sosis",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "112,4 kkal"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Rolade Tahu Sosis",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "3,3 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Rolade Tahu Sosis",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "7,9 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Rolade Tahu Sosis",
        "Kandungan Gizi" => "Karbohidrat",
        "Jumlah" => "3 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Dadar Makaroni Sayur",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "120,1 kkal"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Dadar Makaroni Sayur",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "8,2 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Dadar Makaroni Sayur",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "7,9 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Dadar Makaroni Sayur",
        "Kandungan Gizi" => "Karbohidrat",
        "Jumlah" => "3,3 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Steak Tempe",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "296,6 kkal"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Steak Tempe",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "21,2 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Steak Tempe",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "16,5 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Steak Tempe",
        "Kandungan Gizi" => "Karbohidrat",
        "Jumlah" => "16 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Bitterbollen Kentang",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "73 kkal"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Bitterbollen Kentang",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "4 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Bitterbollen Kentang",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "3,9 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Bitterbollen Kentang",
        "Kandungan Gizi" => "Karbohidrat",
        "Jumlah" => "6,6 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Tim Ikan Menado",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "234,3 kkal"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Tim Ikan Menado",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "10,7 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Tim Ikan Menado",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "8,8 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Soto Lamongan",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "268,5 kkal"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Soto Lamongan",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "10,5 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Soto Lamongan",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "8,9 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Lapis Saus Madu",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "169,5 kkal"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Lapis Saus Madu",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "4 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Lapis Saus Madu",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "3,1 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Lapis Saus Madu",
        "Kandungan Gizi" => "Karbohidrat",
        "Jumlah" => "31,3 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Pancake",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "228,1 kkal"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Pancake",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "5 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Pancake",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "8,6 gr"
    ],
    [
        "Usia" => "0 - 11",
        "Nama Makanan" => "Pancake",
        "Kandungan Gizi" => "Karbohidrat",
        "Jumlah" => "33,1 gr"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Nugget Ayam Sayur",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "69,7 kkal"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Nugget Ayam Sayur",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "4,7 gr"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Nugget Ayam Sayur",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "5 gr"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Nugget Ayam Sayur",
        "Kandungan Gizi" => "Karbohidrat",
        "Jumlah" => "1,5 gr"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Bakso Ayam Jamur",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "390,7 kkal"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Bakso Ayam Jamur",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "17,5 gr"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Bakso Ayam Jamur",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "16,3 gr"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Bakso Ayam Jamur",
        "Kandungan Gizi" => "Karbohidrat",
        "Jumlah" => "45,4 gr"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Naxsi Bakar, Ikan Tongkol + Pepaya",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "270,5 kkal"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Naxsi Bakar, Ikan Tongkol + Pepaya",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "10,6 gr"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Naxsi Bakar, Ikan Tongkol + Pepaya",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "15,7 gr"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Pepes Tahu",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "304,7 kkal"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Pepes Tahu",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "17,9 gr"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Pepes Tahu",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "17,0 gr"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Omelet Mie",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "335,9 kkal"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Omelet Mie",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "15,9 gr"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Omelet Mie",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "21,7 gr"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Roti Goreng Isi Ragout Ayam Sayuran",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "319,2 kkal"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Roti Goreng Isi Ragout Ayam Sayuran",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "16,8 gr"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Roti Goreng Isi Ragout Ayam Sayuran",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "12,0 gr"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Ayam Masak Kecap Sayur",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "148,6 kkal"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Ayam Masak Kecap Sayur",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "7 gr"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Ayam Masak Kecap Sayur",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "12,8 gr"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Ikan Bakar",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "140,6 kkal"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Ikan Bakar",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "19,7 gr"
    ],
    [
        "Usia" => "12 - 35",
        "Nama Makanan" => "Ikan Bakar",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "5,6 gr"
    ],
    [
        "Usia" => "36 - 72",
        "Nama Makanan" => "Ayam crispy Lapis Sayuran",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "307,2 kkal"
    ],
    [
        "Usia" => "36 - 72",
        "Nama Makanan" => "Ayam crispy Lapis Sayuran",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "20,4 gr"
    ],
    [
        "Usia" => "36 - 72",
        "Nama Makanan" => "Ayam crispy Lapis Sayuran",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "20,4 gr"
    ],
    [
        "Usia" => "36 - 72",
        "Nama Makanan" => "Ayam crispy Lapis Sayuran",
        "Kandungan Gizi" => "Karbohidrat",
        "Jumlah" => "7,3 gr"
    ],
    [
        "Usia" => "36 - 72",
        "Nama Makanan" => "Nasi ayam Katsu, Tumis Sayuran, Nano-nano + Melon",
        "Kandungan Gizi" => "Energi ",
        "Jumlah" => "403,3 kkal"
    ],
    [
        "Usia" => "36 - 72",
        "Nama Makanan" => "Nasi ayam Katsu, Tumis Sayuran, Nano-nano + Melon",
        "Kandungan Gizi" => "Protein",
        "Jumlah" => "12,0 gr"
    ],
    [
        "Usia" => "36 - 72",
        "Nama Makanan" => "Nasi ayam Katsu, Tumis Sayuran, Nano-nano + Melon",
        "Kandungan Gizi" => "Lemak",
        "Jumlah" => "17,7 gr"
    ]
];

$groupedMakanan = [];

// Group the food items by name
foreach ($refMakan as $makanan) {
    $foodName = $makanan['Nama Makanan'];

    if (!isset($groupedMakanan[$foodName])) {
        $groupedMakanan[$foodName] = [
            'Usia' => $makanan['Usia'],
            'Kandungan Gizi' => $makanan['Kandungan Gizi'],
            'Jumlah' => $makanan['Jumlah'],
        ];
    } else {
        // If the food name already exists, combine nutritional information
        $groupedMakanan[$foodName]['Usia'] .= ', ' . $makanan['Usia'];
        $groupedMakanan[$foodName]['Kandungan Gizi'] .= ', ' . $makanan['Kandungan Gizi'];
        $groupedMakanan[$foodName]['Jumlah'] .= ', ' . $makanan['Jumlah'];
    }
}
?>

<div class="col-12">
    <div class="row">
        <div class="col-12">
            <div class="card card-success">
                <div class="card-header">
                    <h4 class="card-title">Keterangan</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h3>Anjuran</h3>
                                <?php if ($latest_bayi['status_gizi'] == "Normal") { ?>
                                    <p>harus tetap menjaga pola makan dengan tetap memperhatikan angka kecukupan gizi setiap hari,
                                        balita dengan umur <b><?= $latest_bayi['umur'] ?></b> bulan memiliki berat badan ideal <b><?= $bbIdeal ?></b> kg dan tinggi badan <b><?= $tbIdeal ?></b> dengan status gizi NORMAL
                                    </p>
                                <?php } elseif ($latest_bayi['status_gizi'] == "Gizi Kurang" || $latest_bayi['status_gizi'] == "Gizi Kurang") { ?>
                                    <p>
                                        harus mengubah pola makan menjadi lebih banyak dengan tetap memperhatikan angka kecukupan gizi setiap hari,
                                        balita dengan umur <b><?= $latest_bayi['umur'] ?></b> bulan memiliki berat badan ideal <b><?= $bbIdeal ?></b> kg dan tinggi badan <b><?= $tbIdeal ?></b> dengan status gizi NORMAL
                                    </p>
                                <?php } elseif ($latest_bayi['status_gizi'] == "Gizi Lebih" || $latest_bayi['status_gizi'] == "Obese") { ?>
                                    <p>
                                        harus mengubah pola makan menjadi lebih berkurang dengan tetap memperhatikan angka kecukupan gizi setiap hari,
                                        balita dengan umur <b><?= $latest_bayi['umur'] ?></b> bulan memiliki berat badan ideal <b><?= $bbIdeal ?></b> kg dan tinggi badan <b><?= $tbIdeal ?></b> dengan status gizi NORMAL

                                    </p>
                                <?php } ?>


                                <hr>
                                <h3>Angka Kecukupan Energi, Protein, Lemak, Karbohidrat, Serat, dan Air</h3>
                                <p>Angka Kecukupan Energi, Protein, Lemak, Karbohidrat, Serat, dan Air yang dianjurkan (per orang per hari)</p>
                                <?php foreach ($anjuran_1 as $range) {
                                    // Extract lower and upper bounds of the age range
                                    list($lower, $upper) = explode(' - ', $range['Umur']);
                                    if ($latest_bayi['umur']  <= 5) {
                                        echo "<p>Pemenuhan kebutuhan gizi bayi 0-5 bulan bersumber dari pemberian ASI Eksklusif</p>";
                                    }

                                    // Check if the age is within the current range
                                    if ($latest_bayi['umur']  >= (int)$lower && $latest_bayi['umur']  <= (int)$upper) {
                                        // Display the nutrient information for the current age range
                                ?>
                                        <div class="table-responsive">
                                            <table border="1" class="table table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>Umur</th>
                                                        <th>"Berat badan (Kg)"</th>
                                                        <th>"Tinggi Badan (Cm)"</th>
                                                        <th>"Energi (kkal)"</th>
                                                        <th>"Protein (g)"</th>
                                                        <th>"Total"</th>
                                                        <th>"Omega 3"</th>
                                                        <th>"Omega 6"</th>
                                                        <th>"Karbohidrat (g)"</th>
                                                        <th>"Serat (g)"</th>
                                                        <th>"Air (ml)"</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?= $range['Umur'] ?></td>
                                                        <td><?= $range['Berat badan (Kg)'] ?></td>
                                                        <td><?= $range['Tinggi Badan (Cm)'] ?></td>
                                                        <td><?= $range['Energi (kkal)'] ?></td>
                                                        <td><?= $range['Protein (g)'] ?></td>
                                                        <td><?= $range['Total'] ?></td>
                                                        <td><?= $range['Omega 3'] ?></td>
                                                        <td><?= $range['Omega 6'] ?></td>
                                                        <td><?= $range['Karbohidrat (g)'] ?></td>
                                                        <td><?= $range['Serat (g)'] ?></td>
                                                        <td><?= $range['Air (ml)'] ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                <?php
                                        // Break out of the loop since we found the matching range
                                        break;
                                    }
                                }
                                ?>
                                <hr>

                                <h3>Angka Kecukupan Vitamin</h3>
                                <p>Angka Kecukupan Vitamin yang Dianjurkan (per orang per hari)</p>
                                <?php foreach ($anjuran_2 as $range) {
                                    // Extract lower and upper bounds of the age range
                                    list($lower, $upper) = explode(' - ', $range['Umur']);
                                    if ($latest_bayi['umur']  <= 5) {
                                        echo "<p>Pemenuhan kebutuhan gizi bayi 0-5 bulan bersumber dari pemberian ASI Eksklusif</p>";
                                    }

                                    // Check if the age is within the current range
                                    if ($latest_bayi['umur']  >= (int)$lower && $latest_bayi['umur']  <= (int)$upper) {
                                        // Display the nutrient information for the current age range
                                ?>
                                        <div class="table-responsive">
                                            <table border="1" class="table table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>Umur</th>
                                                        <th>Vit. A (RE)</th>
                                                        <th>Vit. D (mcg)</th>
                                                        <th>Vit. E (mcg)</th>
                                                        <th>Vit. K (mcg)</th>
                                                        <th>Vit. B1 (mcg)</th>
                                                        <th>Vit. B2 (mcg)</th>
                                                        <th>Vit. B3 (mcg)</th>
                                                        <th>Vit. B5 (Pantotenat)(mcg)</th>
                                                        <th>Vit. B6 (mcg)</th>
                                                        <th>Folat (mcg)</th>
                                                        <th>Vit. B12 (mcg)</th>
                                                        <th>Biotin (mcg)</th>
                                                        <th>Kolin (mcg)</th>
                                                        <th>Vit. C (mcg)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?= $range['Umur'] ?></td>
                                                        <td><?= $range['Vit. A'] ?></td>
                                                        <td><?= $range['Vit. D'] ?></td>
                                                        <td><?= $range['Vit. E'] ?></td>

                                                        <td><?= $range['Vit. K'] ?></td>
                                                        <td><?= $range['Vit. B1'] ?></td>

                                                        <td><?= $range['Vit. B2'] ?></td>
                                                        <td><?= $range['Vit. B3'] ?></td>
                                                        <td><?= $range['Vit. B5 (Pantotenat)'] ?></td>
                                                        <td><?= $range['Vit. B6'] ?></td>

                                                        <td><?= $range['Folat'] ?></td>
                                                        <td><?= $range['Vit. B12'] ?></td>
                                                        <td><?= $range['Biotin'] ?></td>

                                                        <td><?= $range['Kolin'] ?></td>
                                                        <td><?= $range['Vit. C'] ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                <?php
                                        // Break out of the loop since we found the matching range
                                        break;
                                    }
                                }
                                ?>
                                <hr>
                                <h3>Angka Kecukupan Mineral</h3>
                                <p>Angka Kecukupan Mineral yang dianjurkan (per orang per hari)</p>
                                <?php foreach ($anjuran_3 as $range) {
                                    // Extract lower and upper bounds of the age range
                                    list($lower, $upper) = explode(' - ', $range['Umur']);
                                    if ($latest_bayi['umur']  <= 5) {
                                        echo "<p>Pemenuhan kebutuhan gizi bayi 0-5 bulan bersumber dari pemberian ASI Eksklusif</p>";
                                    }

                                    // Check if the age is within the current range
                                    if ($latest_bayi['umur']  >= (int)$lower && $latest_bayi['umur']  <= (int)$upper) {
                                        // Display the nutrient information for the current age range
                                ?>
                                        <div class="table-responsive">
                                            <table border="1" class="table table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>Umur</th>
                                                        <th>Kalsium (mg)</th>
                                                        <th>Fosfor (mg)</th>
                                                        <th>Magnesium (mg)</th>
                                                        <th>Besi (mg)</th>
                                                        <th>Iodium (mcg)</th>
                                                        <th>Seng (mg)</th>
                                                        <th>Selenium (mcg)</th>
                                                        <th>Mangan (mg)</th>
                                                        <th>Flour (mg)</th>
                                                        <th>Kromium (mcg)</th>
                                                        <th>Kalium (mcg)</th>
                                                        <th>Natrium (mcg)</th>
                                                        <th>Klor (mcg)</th>
                                                        <th>Tembaga (mcg)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?= $range['Umur'] ?></td>
                                                        <td><?= $range['Kalsium'] ?></td>
                                                        <td><?= $range['Fosfor'] ?></td>
                                                        <td><?= $range['Magnesium'] ?></td>
                                                        <td><?= $range['Besi'] ?></td>
                                                        <td><?= $range['Iodium'] ?></td>
                                                        <td><?= $range['Seng'] ?></td>
                                                        <td><?= $range['Selenium'] ?></td>
                                                        <td><?= $range['Mangan'] ?></td>
                                                        <td><?= $range['Flour'] ?></td>
                                                        <td><?= $range['Kromium'] ?></td>
                                                        <td><?= $range['Kalium'] ?></td>
                                                        <td><?= $range['Natrium'] ?></td>
                                                        <td><?= $range['Klor'] ?></td>
                                                        <td><?= $range['Tembaga'] ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                <?php
                                        // Break out of the loop since we found the matching range
                                        break;
                                    }
                                }
                                ?>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="row">
        <div class="col-12">
            <div class="card card-success">
                <div class="card-header">
                    <h4 class="card-title">Referensi Makanan</h4>
                </div>
                <div class="card-content" style="margin-top: 15px;">
                    <div class="card-body">
                        <div class="row">
                            <?php $cardCount = 0; ?>
                            <?php foreach ($groupedMakanan as $foodName => $info) {
                                // Extract lower and upper bounds of the age range
                                list($lower, $upper) = explode(' - ', $info['Usia']);

                                // Check if the age is within the current range
                                if ($latest_bayi['umur'] >= (int)$lower && $latest_bayi['umur'] <= (int)$upper) {
                                    // Display the nutrient information for the current age range
                                    if ($cardCount % 3 === 0 && $cardCount !== 0) {
                                        // Start a new row after every 3 cards
                                        echo '</div><div class="row">';
                                    }
                            ?>
                                    <div class="col-4">
                                        <div class="food-item" style="
        border: 1px solid #ddd;
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 5px;
    ">
                                            <h3><?= $foodName ?></h3>
                                            <!-- <p>Usia: <?= $info['Usia'] ?></p> -->
                                            <p>Kandungan Gizi: <b><?= $info['Kandungan Gizi'] ?></b></p>
                                            <p>Jumlah: <b><?= $info['Jumlah'] ?></b></p>
                                        </div>
                                    </div>
                            <?php
                                    $cardCount++;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?= $this->endSection(); ?>