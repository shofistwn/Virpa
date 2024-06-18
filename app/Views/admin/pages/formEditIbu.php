<?= $this->extend('admin/layouts/newTemplates'); ?>

<?= $this->section('content'); ?>

<?php $role = session()->get('level'); ?>
<?php if ($role != 'admin'): ?>
    <?php return redirect()->to('/forbidden'); ?>
<?php endif; ?>

<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Ibu</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <?= form_open(base_url() . 'admin/update-ibu', ['class' => 'form form-vertical']) ?>

                        <!-- Additional fields for editing -->
                        <div class="form-group">
                            <input type="hidden" name="id_user" value="<?= $ibu['id_user'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="<?= $ibu['username'] ?? '' ?>">
                        </div>

                        <div class="form-group">
                            <label for="nama_user">Nama Ibu</label>
                            <input type="text" class="form-control" id="nama_user" name="nama_user"
                                value="<?= $ibu['nama_user'] ?? '' ?>">
                        </div>

                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon"
                                value="<?= $ibu['telepon'] ?? '' ?>">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?= $ibu['email'] ?? '' ?>">
                        </div>

                        <div class="form-group">
                            <label for="password">Ganti Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="card-footer d-flex gap-2">
                            <a href="<?php echo base_url('admin/data-ibu') ?>"
                                class="btn btn-secondary form-control">Batal</a>
                            <button type="submit" class="btn btn-primary form-control">Simpan</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>