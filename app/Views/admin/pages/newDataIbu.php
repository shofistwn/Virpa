<?= $this->extend('admin/layouts/newTemplates'); ?>

<?= $this->section('content') ?>

<?php $role = session()->get('level'); ?>
<?php if ($role != 'admin') : ?>
    <?php return redirect()->to('/forbidden'); ?>
<?php endif; ?>

<div class="col-12">
    <div class="row">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Tabel Data Ibu
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Ibu</th>
                                    <th>Telepon</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Created At</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ibu as $key => $value) { ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value['nama_user'] ?></td>
                                        <td><?= $value['telepon'] ?></td>
                                        <td><?= $value['email'] ?></td>
                                        <td><?= $value['username'] ?></td>

                                        <td><?= $value['created_at'] ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/edit-ibu?id=') . $value['id_user']; ?>" class="btn btn-warning">Edit</a>
                                            <a href="<?= base_url('admin/hapus-data-ibu/') . $value['id_user']; ?>" class="btn btn-danger" onclick="return confirmDelete()">Delete</a>
                                        </td>
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

<script>
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus data ini?');
    }
</script>

<?= $this->endSection() ?>