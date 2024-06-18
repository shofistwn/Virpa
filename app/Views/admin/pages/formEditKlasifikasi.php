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
                <?php if (session()->has('error')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session('error') ?>
                    </div>
                <?php endif; ?>
                <div class="card-header">
                    <h4 class="card-title">Edit Klasifikasi</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <?= form_open(base_url() . 'admin/proses-klasifikasi/update', ['class' => 'form form-vertical']) ?>

                        <!-- Additional fields for editing -->
                        <div class="form-group">
                            <input type="hidden" name="id_klasifikasi" value="<?= $klasifikasi['id_klasifikasi'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <option disabled selected>Pilih Jenis Kelamin</option>
                                <option value="L" <?= $klasifikasi['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-laki
                                </option>
                                <option value="P" <?= $klasifikasi['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="umur">Umur Bayi (bulan)</label>
                            <input type="number" class="form-control" id="umur" name="umur"
                                value="<?= $klasifikasi['umur'] ?? '' ?>" min="1">
                        </div>

                        <div class="form-group">
                            <label for="berat_badan">Berat Badan (kg)</label>
                            <input type="number" step="0.01" class="form-control" id="berat_badan" name="berat_badan"
                                value="<?= $klasifikasi['berat_badan'] ?? '' ?>" min="0.5">
                        </div>

                        <div class="form-group">
                            <label for="tinggi_badan">Tinggi Badan (cm)</label>
                            <input type="number" step="0.01" class="form-control" id="tinggi_badan" name="tinggi_badan"
                                value="<?= $klasifikasi['tinggi_badan_cm'] ?? '' ?>" min="1">
                        </div>

                        <div class="form-group">
                            <label for="lingkar_kepala">Lingkar Kepala (cm)</label>
                            <input type="number" step="0.01" class="form-control" id="lingkar_kepala"
                                name="lingkar_kepala" value="<?= $klasifikasi['lingkar_kepala'] ?? '' ?>" min="1">
                        </div>

                        <div class="card-footer d-flex gap-2">
                            <a href="<?php echo base_url('admin/proses-klasifikasi') ?>"
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