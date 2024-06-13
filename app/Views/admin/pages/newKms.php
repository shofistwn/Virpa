<?= $this->extend('admin/layouts/newTemplates'); ?>

<?= $this->section('content') ?>

<?php $role = session()->get('level'); ?>
<?php if ($role != 'admin') : ?>
    <?php return redirect()->to('/forbidden'); ?>
<?php endif; ?>

<div class="container-fuild">
    <div class="row">
        <!-- general form elements -->
        <div class="col-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title"><?= $breadcrumbs ?> - Lihat KMS</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <?= form_open_multipart('admin/lihat-kms', ['method' => "GET"]) ?>
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Data Ibu</label>
                                <select name="id_user" id="id_user" class="form-control">
                                    <option value="">Pilih Ibu</option>
                                    <?php foreach ($ibu as $i) : ?>
                                        <option value="<?= $i['id_user'] ?>"><?= $i['nama_user'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Lihat Data KMS</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>