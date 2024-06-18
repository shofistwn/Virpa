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
                                        <td><?= $value['status_gizi'] ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/edit-data-bayi/') . $value['id_bayi']; ?>"
                                                class="btn btn-warning">Edit</a>
                                            <a href="<?= base_url('admin/hapus-data-bayi/') . $value['id_bayi']; ?>"
                                                class="btn btn-danger" onclick="return confirmDelete()">Delete</a>
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
</div>

<script>
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus data ini?');
    }
</script>

<?= $this->endSection() ?>