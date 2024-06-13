<?= $this->extend('admin/layouts/newTemplates'); ?>

<?= $this->section('content'); ?>

<?php $role = session()->get('level'); ?>
<?php if ($role != 'admin') : ?>
    <?php return redirect()->to('/forbidden'); ?>
<?php endif; ?>

<div class="col-12">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Grafik Pertumbuhan Balita - Kunjungan</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="barChart" style="min-height: 250px; height: 350px; max-height: 450px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Grafik Pertumbuhan Balita - Status Gizi Bayi</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="barChartKlasifikasi" style="min-height: 250px; height: 350px; max-height: 450px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
</div>
<div class="col-12">
    <!-- <?php echo '<pre>' . var_export($hasilPerhitungan, true) . '</pre>'; ?> -->
    <div class="row">
        <section class="section">
            <div class="card">
                <div class="card-header">
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
                                    <th>Tahun</th>
                                    <th>Bulan</th>
                                    <th>Gizi Buruk</th>
                                    <th>Kurang Gizi</th>
                                    <th>Normal</th>
                                    <th>Berisiko Gizi Lebih</th>
                                    <th>Gizi Lebih</th>
                                    <th>Obese</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($hasilPerhitungan as $tahun => $bulanData) { ?>
                                    <?php foreach ($bulanData as $bulan => $value) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $tahun ?></td>
                                            <td><?= $bulan ?></td>
                                            <td><?= $value['Gizi Buruk'] ?? 0 ?></td>
                                            <td><?= $value['Gizi Kurang'] ?? 0 ?></td>
                                            <td><?= $value['Normal'] ?? 0 ?></td>
                                            <td><?= $value['Berisiko Gizi Lebih'] ?? 0 ?></td>
                                            <td><?= $value['Gizi Lebih'] ?? 0 ?></td>
                                            <td><?= $value['Obese'] ?? 0 ?></td>
                                        </tr>
                                    <?php } ?>
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