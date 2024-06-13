<?= $this->extend('admin/layouts/newTemplates'); ?>

<?= $this->section('content'); ?>
<?php $role = session()->get('level'); ?>
<?php if ($role != 'admin') : ?>
    <?php return redirect()->to('/forbidden'); ?>
<?php endif; ?>

<!-- Content Wrapper. Contains page content -->
<div class="col-12">
    <div class="row">
        <div class="col-6 col-lg-6 col-md-6">
            <div class="card" style="background-color: pink;">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon purple mb-2">
                                <i class="iconly-boldShow"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-black font-semibold">Data Balita</h6>
                            <h6 class="font-extrabold mb-0 "><?= $jumlah_bayi ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-6 col-md-6">
            <div class="card" style="background-color: pink;">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon blue mb-2">
                                <i class="iconly-boldProfile"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-black font-semibold">Data Ibu</h6>
                            <h6 class="font-extrabold mb-0"><?= $jumlah_ibu; ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="row">
        <section class="section">
            <div class="card" style="background-color: pink;">
                <div class="card-header" style="background-color: pink;">
                    <h5 class="card-title">
                        Tabel Pertumbuhan Balita
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Bayi</th>
                                    <th>Nama Ibu</th>
                                    <th>Nama Balita</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Umur (bln)</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Lingkar Kepala (cm)</th>
                                    <th>Berat Badan (kg)</th>
                                    <th>Tinggi Badan (cm)</th>
                                    <th>IMT</th>
                                    <th>Status Gizi</th>
                                    <th>Tanggal Kunjungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bayi as $key => $value) { ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value['kode_bayi'] ?></td>
                                        <td><?= $value['nama_user'] ?></td>
                                        <td><?= $value['nama_bayi'] ?></td>
                                        <td><?= !empty($value['jenis_kelamin']) ? ($value['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan') : '' ?></td>
                                        <td><?= $value['umur'] ?></td>
                                        <td><?= $value['tgl_lahir'] ?></td>
                                        <td><?= $value['lingkar_kepala'] ?></td>
                                        <td><?= $value['berat_badan'] ?></td>
                                        <td><?= $value['tinggi_badan'] ?></td>
                                        <td><?= $value['imt'] ?></td>
                                        <td><?= $value['status_gizi'] ?></td>
                                        <td><?= $value['created_at'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>


<?= $this->endSection(); ?>