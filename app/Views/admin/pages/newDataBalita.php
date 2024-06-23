<?= $this->extend('admin/layouts/newTemplates'); ?>

<?= $this->section('content') ?>

<?php $role = session()->get('level'); ?>
<?php if ($role != 'admin'): ?>
    <?php return redirect()->to('/forbidden'); ?>
<?php endif; ?>

<div class="col-12">
    <div class="row">
        <a class="btn btn-lg btn-success" href="<?= base_url('/admin/tambah-data-bayi') ?>">Tambah Data</a>
    </div>
</div>

<div class="col-12">
    <div class="row">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Tabel Data Balita
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Bayi</th>
                                    <th>Nama Balita</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Umur (bln)</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Lingkar Kepala (cm)</th>
                                    <th>Berat Badan (kg)</th>
                                    <th>Tinggi Badan (cm)</th>
                                    <th>IMT</th>
                                    <th>Klasifikasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bayi as $key => $value): ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value['kode_bayi'] ?></td>
                                        <td><?= $value['nama_bayi'] ?></td>
                                        <td><?= empty($value['jenis_kelamin']) ? '' : ($value['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan') ?>
                                        </td>
                                        <td><?= $value['umur'] ?></td>
                                        <td><?= $value['tgl_lahir'] ?></td>
                                        <td><?= $value['lingkar_kepala'] ?></td>
                                        <td><?= $value['berat_badan'] ?></td>
                                        <td><?= $value['tinggi_badan'] ?></td>
                                        <td><?= $value['imt'] ?></td>
                                        <td>
                                            <?= $value['status_gizi'] ?>
                                        </td>
                                        <td>
                                            <?php if ($value['jenis_kelamin'] === 'L'): ?>
                                                <button type="button" class="d-block btn btn-sm btn-primary"
                                                    data-bs-toggle="modal" data-bs-target="#modalLaki">
                                                    Cara Menghitung
                                                </button>
                                            <?php else: ?>
                                                <button type="button" class="d-block btn btn-sm btn-primary"
                                                    data-bs-toggle="modal" data-bs-target="#modalPerempuan">
                                                    Cara Menghitung
                                                </button>
                                            <?php endif; ?>
                                            <a href="<?= base_url('admin/edit-data-bayi/') . $value['id_bayi']; ?>"
                                                class="d-block btn btn-warning my-2">Edit</a>
                                            <a href="<?= base_url('admin/hapus-data-bayi/') . $value['id_bayi']; ?>"
                                                class="d-block btn btn-danger" onclick="return confirmDelete()">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="modalLaki" tabindex="-1" aria-labelledby="modalLakiLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLakiLabel">IMT Anak Laki-Laki</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="<?= base_url('imt-laki.png') ?>" alt="" class="w-full img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalPerempuan" tabindex="-1" aria-labelledby="modalPerempuanLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalPerempuanLabel">IMT Anak Perempuan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="<?= base_url('imt-perempuan.png') ?>" alt="" class="w-full img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus data ini?');
    }
</script>

<?= $this->endSection() ?>