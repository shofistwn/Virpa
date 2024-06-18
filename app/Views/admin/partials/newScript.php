<!-- script -->
<script src="<?= base_url('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>


<script src="<?= base_url('assets/compiled/js/app.js') ?>"></script>



<!-- Need: Apexcharts -->
<script src="<?= base_url('assets/extensions/apexcharts/apexcharts.min.js') ?>"></script>
<script src="<?= base_url('assets/static/js/pages/dashboard.js') ?>"></script>







<script src="<?= base_url('assets/extensions/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/extensions/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') ?>"></script>
<script>
    window.onload = function() {
        var table = document.getElementById('data-klasifikasi');
        
        if (table) {
            var script = document.createElement('script');
            script.src = "<?= base_url('assets/static/js/pages/data-klasifikasi.js') ?>";
            document.body.appendChild(script);
        } else {
            var script = document.createElement('script');
            script.src = "<?= base_url('assets/static/js/pages/datatables.js') ?>";
            document.body.appendChild(script);
        }
    };
</script>
<script src="<?= base_url('assets/extensions/chart.js/chart.umd.js') ?>"></script>
<script src="<?= base_url('assets/static/js/pages/ui-chartjs.js') ?>"></script>

<?php if (uri_string() == 'admin/proses-klasifikasi'): ?>
    <script>
        $(function () {
            var areaChartData = {
                labels: ['Gizi Buruk', 'Gizi Kurang', 'Normal', 'Berisiko Gizi Lebih', 'Gizi Lebih', 'Obesitas'],
                datasets: [{
                    label: 'Status Gizi Bayi',
                    backgroundColor: 'rgba(60, 141, 188, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d2',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',

                    data: [<?= $gizi_buruk; ?>, <?= $gizi_kurang; ?>, <?= $gizi_normal; ?>, <?= $berisiko_gizi_lebih; ?>, <?= $gizi_lebih; ?>, <?= $gizi_obesitas; ?>]
                }]
            }
            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas2 = $('#barChartKlasifikasi').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            barChartData.datasets[0] = temp0

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            var barChart = new Chart(barChartCanvas2, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            });

        })
    </script>
<?php endif; ?>
<?php if (uri_string() == 'admin/pertumbuhan-balita'): ?>
    <script>
        $(function () {
            var areaChartData = {
                labels: ['Gizi Buruk', 'Gizi Kurang', 'Normal', 'Berisiko Gizi Lebih', 'Gizi Lebih', 'Obesitas'],
                datasets: [{
                    label: 'Status Gizi Bayi',
                    backgroundColor: 'rgba(60, 141, 188, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d2',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',

                    data: [<?= $gizi_buruk; ?>, <?= $gizi_kurang; ?>, <?= $gizi_normal; ?>, <?= $berisiko_gizi_lebih; ?>, <?= $gizi_lebih; ?>, <?= $gizi_obesitas; ?>]
                }]
            }
            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas2 = $('#barChartKlasifikasi').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            barChartData.datasets[0] = temp0

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            var barChart = new Chart(barChartCanvas2, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            });


            var areaChartData = {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                datasets: [{
                    label: 'Kunjungan',
                    backgroundColor: 'rgba(60, 141, 188, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d2',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',

                    data: <?= $kunjungan; ?>
                }]
            }
            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            barChartData.datasets[0] = temp0

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            var barChart = new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            });


            var lineChartData = {
                labels: <?= $umur ?>,
                datasets: [{
                    label: 'Indeks Massa Tubuh',
                    backgroundColor: 'rgba(60, 141, 188, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: true,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d2',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',

                    data: <?= $average_imt; ?>
                }]
            }
            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#lineChart').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, lineChartData)
            var temp0 = lineChartData.datasets[0]
            barChartData.datasets[0] = temp0

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            var barChart = new Chart(barChartCanvas, {
                type: 'line',
                data: barChartData,
                options: barChartOptions
            });
        })
    </script>
<?php endif; ?>

<script>
    $(function () {
        // Check that the element exists before initializing Sparkline
        if ($('#sparkline-1').length) {
            new Sparkline($('#sparkline-1')[0], {
                width: '100%',
                height: '100%',
                lineColor: '#3c8dbc',
                fillColor: 'rgba(60,141,188,0.5)',
                lineWidth: 2,
                spotRadius: 4,
                spotColor: '#3c8dbc',
                minSpotColor: '#3c8dbc',
                maxSpotColor: '#3c8dbc',
                highlightSpotColor: '#3c8dbc',
                highlightLineColor: '#3c8dbc',
                resize: true
            });
        }
    });
</script>
<?php if (uri_string() == 'user/kms-online' || uri_string() == 'admin/lihat-kms'): ?>

    <script>
        // Your data array
        <?php if ($latest_bayi['jenis_kelamin'] == "L"): ?>
            var jsonData = [{
                "umur": "0",
                "-3 SD": "10.2",
                "-2 SD": "11.1",
                "-1 SD": "12.2",
                "Median": "13.4",
                "+1 SD": "14.8",
                "+2 SD": "16.3",
                "+3 SD": "18.1"
            },
            {
                "umur": "1",
                "-3 SD": "11.3",
                "-2 SD": "12.4",
                "-1 SD": "13.6",
                "Median": "14.9",
                "+1 SD": "16.3",
                "+2 SD": "17.8",
                "+3 SD": "19.4"
            },
            {
                "umur": "2",
                "-3 SD": "12.5",
                "-2 SD": "13.7",
                "-1 SD": "15.0",
                "Median": "16.3",
                "+1 SD": "17.8",
                "+2 SD": "19.4",
                "+3 SD": "21.1"
            },
            {
                "umur": "3",
                "-3 SD": "13.1",
                "-2 SD": "14.3",
                "-1 SD": "15.5",
                "Median": "16.9",
                "+1 SD": "18.4",
                "+2 SD": "20.0",
                "+3 SD": "21.8"
            },
            {
                "umur": "4",
                "-3 SD": "13.4",
                "-2 SD": "14.5",
                "-1 SD": "15.8",
                "Median": "17.2",
                "+1 SD": "18.7",
                "+2 SD": "20.3",
                "+3 SD": "22.1"
            },
            {
                "umur": "5",
                "-3 SD": "13.5",
                "-2 SD": "14.7",
                "-1 SD": "15.9",
                "Median": "17.3",
                "+1 SD": "18.8",
                "+2 SD": "20.5",
                "+3 SD": "22.3"
            },
            {
                "umur": "6",
                "-3 SD": "13.6",
                "-2 SD": "14.7",
                "-1 SD": "16.0",
                "Median": "17.3",
                "+1 SD": "18.8",
                "+2 SD": "20.5",
                "+3 SD": "22.3"
            },
            {
                "umur": "7",
                "-3 SD": "13.7",
                "-2 SD": "14.8",
                "-1 SD": "16.0",
                "Median": "17.3",
                "+1 SD": "18.8",
                "+2 SD": "20.5",
                "+3 SD": "22.3"
            },
            {
                "umur": "8",
                "-3 SD": "13.6",
                "-2 SD": "14.7",
                "-1 SD": "15.9",
                "Median": "17.3",
                "+1 SD": "18.7",
                "+2 SD": "20.4",
                "+3 SD": "22.2"
            },
            {
                "umur": "9",
                "-3 SD": "13.6",
                "-2 SD": "14.7",
                "-1 SD": "15.8",
                "Median": "17.2",
                "+1 SD": "18.6",
                "+2 SD": "20.3",
                "+3 SD": "22.1"
            },
            {
                "umur": "10",
                "-3 SD": "13.5",
                "-2 SD": "14.6",
                "-1 SD": "15.7",
                "Median": "17.0",
                "+1 SD": "18.5",
                "+2 SD": "20.1",
                "+3 SD": "22.0"
            },
            {
                "umur": "11",
                "-3 SD": "13.4",
                "-2 SD": "14.5",
                "-1 SD": "15.6",
                "Median": "16.9",
                "+1 SD": "18.4",
                "+2 SD": "20.0",
                "+3 SD": "21.8"
            },
            {
                "umur": "12",
                "-3 SD": "13.4",
                "-2 SD": "14.4",
                "-1 SD": "15.5",
                "Median": "16.8",
                "+1 SD": "18.2",
                "+2 SD": "19.8",
                "+3 SD": "21.6"
            },
            {
                "umur": "13",
                "-3 SD": "13.3",
                "-2 SD": "14.3",
                "-1 SD": "15.4",
                "Median": "16.7",
                "+1 SD": "18.1",
                "+2 SD": "19.7",
                "+3 SD": "21.5"
            },
            {
                "umur": "14",
                "-3 SD": "13.2",
                "-2 SD": "14.2",
                "-1 SD": "15.3",
                "Median": "16.6",
                "+1 SD": "18.0",
                "+2 SD": "19.5",
                "+3 SD": "21.3"
            },
            {
                "umur": "15",
                "-3 SD": "13.1",
                "-2 SD": "14.1",
                "-1 SD": "15.2",
                "Median": "16.4",
                "+1 SD": "17.8",
                "+2 SD": "19.4",
                "+3 SD": "21.2"
            },
            {
                "umur": "16",
                "-3 SD": "13.1",
                "-2 SD": "14.0",
                "-1 SD": "15.1",
                "Median": "16.3",
                "+1 SD": "17.7",
                "+2 SD": "19.3",
                "+3 SD": "21.0"
            },
            {
                "umur": "17",
                "-3 SD": "13.0",
                "-2 SD": "13.9",
                "-1 SD": "15.0",
                "Median": "16.2",
                "+1 SD": "17.6",
                "+2 SD": "19.1",
                "+3 SD": "20.9"
            },
            {
                "umur": "18",
                "-3 SD": "12.9",
                "-2 SD": "13.9",
                "-1 SD": "14.9",
                "Median": "16.1",
                "+1 SD": "17.5",
                "+2 SD": "19.0",
                "+3 SD": "20.8"
            },
            {
                "umur": "19",
                "-3 SD": "12.9",
                "-2 SD": "13.8",
                "-1 SD": "14.9",
                "Median": "16.1",
                "+1 SD": "17.4",
                "+2 SD": "18.9",
                "+3 SD": "20.7"
            },
            {
                "umur": "20",
                "-3 SD": "12.8",
                "-2 SD": "13.7",
                "-1 SD": "14.8",
                "Median": "16.0",
                "+1 SD": "17.3",
                "+2 SD": "18.8",
                "+3 SD": "20.6"
            },
            {
                "umur": "21",
                "-3 SD": "12.8",
                "-2 SD": "13.7",
                "-1 SD": "14.7",
                "Median": "15.9",
                "+1 SD": "17.2",
                "+2 SD": "18.7",
                "+3 SD": "20.5"
            },
            {
                "umur": "22",
                "-3 SD": "12.7",
                "-2 SD": "13.6",
                "-1 SD": "14.7",
                "Median": "15.8",
                "+1 SD": "17.2",
                "+2 SD": "18.7",
                "+3 SD": "20.4"
            },
            {
                "umur": "23",
                "-3 SD": "12.7",
                "-2 SD": "13.6",
                "-1 SD": "14.6",
                "Median": "15.8",
                "+1 SD": "17.1",
                "+2 SD": "18.6",
                "+3 SD": "20.3"
            },
            {
                "umur": "24 ",
                "-3 SD": "12.9",
                "-2 SD": "13.8",
                "-1 SD": "14.8",
                "Median": "16.0",
                "+1 SD": "17.3",
                "+2 SD": "18.9",
                "+3 SD": "20.6"
            },
            {
                "umur": "25",
                "-3 SD": "12.8",
                "-2 SD": "13.8",
                "-1 SD": "14.8",
                "Median": "16.0",
                "+1 SD": "17.3",
                "+2 SD": "18.8",
                "+3 SD": "20.5"
            },
            {
                "umur": "26",
                "-3 SD": "12.8",
                "-2 SD": "13.7",
                "-1 SD": "14.8",
                "Median": "15.9",
                "+1 SD": "17.3",
                "+2 SD": "18.8",
                "+3 SD": "20.5"
            },
            {
                "umur": "27",
                "-3 SD": "12.7",
                "-2 SD": "13.7",
                "-1 SD": "14.7",
                "Median": "15.9",
                "+1 SD": "17.2",
                "+2 SD": "18.7",
                "+3 SD": "20.4"
            },
            {
                "umur": "28",
                "-3 SD": "12.7",
                "-2 SD": "13.6",
                "-1 SD": "14.7",
                "Median": "15.9",
                "+1 SD": "17.2",
                "+2 SD": "18.7",
                "+3 SD": "20.4"
            },
            {
                "umur": "29",
                "-3 SD": "12.7",
                "-2 SD": "13.6",
                "-1 SD": "14.7",
                "Median": "15.8",
                "+1 SD": "17.1",
                "+2 SD": "18.6",
                "+3 SD": "20.3"
            },
            {
                "umur": "30",
                "-3 SD": "12.6",
                "-2 SD": "13.6",
                "-1 SD": "14.6",
                "Median": "15.8",
                "+1 SD": "17.1",
                "+2 SD": "18.6",
                "+3 SD": "20.2"
            },
            {
                "umur": "31",
                "-3 SD": "12.6",
                "-2 SD": "13.5",
                "-1 SD": "14.6",
                "Median": "15.8",
                "+1 SD": "17.1",
                "+2 SD": "18.5",
                "+3 SD": "20.2"
            },
            {
                "umur": "32",
                "-3 SD": "12.5",
                "-2 SD": "13.5",
                "-1 SD": "14.6",
                "Median": "15.7",
                "+1 SD": "17.0",
                "+2 SD": "18.5",
                "+3 SD": "20.1"
            },
            {
                "umur": "33",
                "-3 SD": "12.5",
                "-2 SD": "13.5",
                "-1 SD": "14.5",
                "Median": "15.7",
                "+1 SD": "17.0",
                "+2 SD": "18.5",
                "+3 SD": "20.1"
            },
            {
                "umur": "34",
                "-3 SD": "12.5",
                "-2 SD": "13.4",
                "-1 SD": "14.5",
                "Median": "15.7",
                "+1 SD": "17.0",
                "+2 SD": "18.4",
                "+3 SD": "20.0"
            },
            {
                "umur": "35",
                "-3 SD": "12.4",
                "-2 SD": "13.4",
                "-1 SD": "14.5",
                "Median": "15.6",
                "+1 SD": "16.9",
                "+2 SD": "18.4",
                "+3 SD": "20.0"
            },
            {
                "umur": "36",
                "-3 SD": "12.4",
                "-2 SD": "13.4",
                "-1 SD": "14.4",
                "Median": "15.6",
                "+1 SD": "16.9",
                "+2 SD": "18.4",
                "+3 SD": "20.0"
            },
            {
                "umur": "37",
                "-3 SD": "12.4",
                "-2 SD": "13.3",
                "-1 SD": "14.4",
                "Median": "15.6",
                "+1 SD": "16.9",
                "+2 SD": "18.3",
                "+3 SD": "19.9"
            },
            {
                "umur": "38",
                "-3 SD": "12.3",
                "-2 SD": "13.3",
                "-1 SD": "14.4",
                "Median": "15.5",
                "+1 SD": "16.8",
                "+2 SD": "18.3",
                "+3 SD": "19.9"
            },
            {
                "umur": "39",
                "-3 SD": "12.3",
                "-2 SD": "13.3",
                "-1 SD": "14.3",
                "Median": "15.5",
                "+1 SD": "16.8",
                "+2 SD": "18.3",
                "+3 SD": "19.9"
            },
            {
                "umur": "40",
                "-3 SD": "12.3",
                "-2 SD": "13.2",
                "-1 SD": "14.3",
                "Median": "15.5",
                "+1 SD": "16.8",
                "+2 SD": "18.2",
                "+3 SD": "19.9"
            },
            {
                "umur": "41",
                "-3 SD": "12.2",
                "-2 SD": "13.2",
                "-1 SD": "14.3",
                "Median": "15.5",
                "+1 SD": "16.8",
                "+2 SD": "18.2",
                "+3 SD": "19.9"
            },
            {
                "umur": "42",
                "-3 SD": "12.2",
                "-2 SD": "13.2",
                "-1 SD": "14.3",
                "Median": "15.4",
                "+1 SD": "16.8",
                "+2 SD": "18.2",
                "+3 SD": "19.8"
            },
            {
                "umur": "43",
                "-3 SD": "12.2",
                "-2 SD": "13.2",
                "-1 SD": "14.2",
                "Median": "15.4",
                "+1 SD": "16.7",
                "+2 SD": "18.2",
                "+3 SD": "19.8"
            },
            {
                "umur": "44",
                "-3 SD": "12.2",
                "-2 SD": "13.1",
                "-1 SD": "14.2",
                "Median": "15.4",
                "+1 SD": "16.7",
                "+2 SD": "18.2",
                "+3 SD": "19.8"
            },
            {
                "umur": "45",
                "-3 SD": "12.2",
                "-2 SD": "13.1",
                "-1 SD": "14.2",
                "Median": "15.4",
                "+1 SD": "16.7",
                "+2 SD": "18.2",
                "+3 SD": "19.8"
            },
            {
                "umur": "46",
                "-3 SD": "12.1",
                "-2 SD": "13.1",
                "-1 SD": "14.2",
                "Median": "15.4",
                "+1 SD": "16.7",
                "+2 SD": "18.2",
                "+3 SD": "19.8"
            },
            {
                "umur": "47",
                "-3 SD": "12.1",
                "-2 SD": "13.1",
                "-1 SD": "14.2",
                "Median": "15.3",
                "+1 SD": "16.7",
                "+2 SD": "18.2",
                "+3 SD": "19.9"
            },
            {
                "umur": "48",
                "-3 SD": "12.1",
                "-2 SD": "13.1",
                "-1 SD": "14.1",
                "Median": "15.3",
                "+1 SD": "16.7",
                "+2 SD": "18.2",
                "+3 SD": "19.9"
            },
            {
                "umur": "49",
                "-3 SD": "12.1",
                "-2 SD": "13.0",
                "-1 SD": "14.1",
                "Median": "15.3",
                "+1 SD": "16.7",
                "+2 SD": "18.2",
                "+3 SD": "19.9"
            },
            {
                "umur": "50",
                "-3 SD": "12.1",
                "-2 SD": "13.0",
                "-1 SD": "14.1",
                "Median": "15.3",
                "+1 SD": "16.7",
                "+2 SD": "18.2",
                "+3 SD": "19.9"
            },
            {
                "umur": "51",
                "-3 SD": "12.1",
                "-2 SD": "13.0",
                "-1 SD": "14.1",
                "Median": "15.3",
                "+1 SD": "16.6",
                "+2 SD": "18.2",
                "+3 SD": "19.9"
            },
            {
                "umur": "52",
                "-3 SD": "12.0",
                "-2 SD": "13.0",
                "-1 SD": "14.1",
                "Median": "15.3",
                "+1 SD": "16.6",
                "+2 SD": "18.2",
                "+3 SD": "19.9"
            },
            {
                "umur": "53",
                "-3 SD": "12.0",
                "-2 SD": "13.0",
                "-1 SD": "14.1",
                "Median": "15.3",
                "+1 SD": "16.6",
                "+2 SD": "18.2",
                "+3 SD": "20.0"
            },
            {
                "umur": "54",
                "-3 SD": "12.0",
                "-2 SD": "13.0",
                "-1 SD": "14.0",
                "Median": "15.3",
                "+1 SD": "16.6",
                "+2 SD": "18.2",
                "+3 SD": "20.0"
            },
            {
                "umur": "55",
                "-3 SD": "12.0",
                "-2 SD": "13.0",
                "-1 SD": "14.0",
                "Median": "15.2",
                "+1 SD": "16.6",
                "+2 SD": "18.2",
                "+3 SD": "20.0"
            },
            {
                "umur": "56",
                "-3 SD": "12.0",
                "-2 SD": "12.9",
                "-1 SD": "14.0",
                "Median": "15.2",
                "+1 SD": "16.6",
                "+2 SD": "18.2",
                "+3 SD": "20.1"
            },
            {
                "umur": "57",
                "-3 SD": "12.0",
                "-2 SD": "12.9",
                "-1 SD": "14.0",
                "Median": "15.2",
                "+1 SD": "16.6",
                "+2 SD": "18.2",
                "+3 SD": "20.1"
            },
            {
                "umur": "58",
                "-3 SD": "12.0",
                "-2 SD": "12.9",
                "-1 SD": "14.0",
                "Median": "15.2",
                "+1 SD": "16.6",
                "+2 SD": "18.3",
                "+3 SD": "20.2"
            },
            {
                "umur": "59",
                "-3 SD": "12.0",
                "-2 SD": "12.9",
                "-1 SD": "14.0",
                "Median": "15.2",
                "+1 SD": "16.6",
                "+2 SD": "18.3",
                "+3 SD": "20.2"
            },
            {
                "umur": "60",
                "-3 SD": "12.0",
                "-2 SD": "12.9",
                "-1 SD": "14.0",
                "Median": "15.2",
                "+1 SD": "16.6",
                "+2 SD": "18.3",
                "+3 SD": "20.3"
            }
            ];
        <?php else: ?>
            var jsonData = [{

                "umur": "0",
                "-3 SD": "10.1",
                "-2 SD": "11.1",
                "-1 SD": "12.2",
                "Median": "13.3",
                "+1 SD": "14.6",
                "+2 SD": "16.1",
                "+3 SD": "17.7"
            },
            {
                "umur": "1",
                "-3 SD": "10.8",
                "-2 SD": "12.0",
                "-1 SD": "13.2",
                "Median": "14.6",
                "+1 SD": "16.0",
                "+2 SD": "17.5",
                "+3 SD": "19.1"
            },
            {
                "umur": "2",
                "-3 SD": "11.8",
                "-2 SD": "13.0",
                "-1 SD": "14.3",
                "Median": "15.8",
                "+1 SD": "17.3",
                "+2 SD": "19.0",
                "+3 SD": "20.7"
            },
            {
                "umur": "3",
                "-3 SD": "12.4",
                "-2 SD": "13.6",
                "-1 SD": "14.9",
                "Median": "16.4",
                "+1 SD": "17.9",
                "+2 SD": "19.7",
                "+3 SD": "21.5"
            },
            {
                "umur": "4",
                "-3 SD": "12.7",
                "-2 SD": "13.9",
                "-1 SD": "15.2",
                "Median": "16.7",
                "+1 SD": "18.3",
                "+2 SD": "20.0",
                "+3 SD": "22.0"
            },
            {
                "umur": "5",
                "-3 SD": "12.9",
                "-2 SD": "14.1",
                "-1 SD": "15.4",
                "Median": "16.8",
                "+1 SD": "18.4",
                "+2 SD": "20.2",
                "+3 SD": "22.2"
            },
            {
                "umur": "6",
                "-3 SD": "13.0",
                "-2 SD": "14.1",
                "-1 SD": "15.5",
                "Median": "16.9",
                "+1 SD": "18.5",
                "+2 SD": "20.3",
                "+3 SD": "22.3"
            },
            {
                "umur": "7",
                "-3 SD": "13.0",
                "-2 SD": "14.2",
                "-1 SD": "15.5",
                "Median": "16.9",
                "+1 SD": "18.5",
                "+2 SD": "20.3",
                "+3 SD": "22.3"
            },
            {
                "umur": "8",
                "-3 SD": "13.0",
                "-2 SD": "14.1",
                "-1 SD": "15.4",
                "Median": "16.8",
                "+1 SD": "18.4",
                "+2 SD": "20.2",
                "+3 SD": "22.2"
            },
            {
                "umur": "9",
                "-3 SD": "12.9",
                "-2 SD": "14.1",
                "-1 SD": "15.3",
                "Median": "16.7",
                "+1 SD": "18.3",
                "+2 SD": "20.1",
                "+3 SD": "22.1"
            },
            {
                "umur": "10",
                "-3 SD": "12.9",
                "-2 SD": "14.0",
                "-1 SD": "15.2",
                "Median": "16.6",
                "+1 SD": "18.2",
                "+2 SD": "19.9",
                "+3 SD": "21.9"
            },
            {
                "umur": "11",
                "-3 SD": "12.8",
                "-2 SD": "13.9",
                "-1 SD": "15.1",
                "Median": "16.5",
                "+1 SD": "18.0",
                "+2 SD": "19.8",
                "+3 SD": "21.8"
            },
            {
                "umur": "12",
                "-3 SD": "12.7",
                "-2 SD": "13.8",
                "-1 SD": "15.0",
                "Median": "16.4",
                "+1 SD": "17.9",
                "+2 SD": "19.6",
                "+3 SD": "21.6"
            },
            {
                "umur": "13",
                "-3 SD": "12.6",
                "-2 SD": "13.7",
                "-1 SD": "14.9",
                "Median": "16.2",
                "+1 SD": "17.7",
                "+2 SD": "19.5",
                "+3 SD": "21.4"
            },
            {
                "umur": "14",
                "-3 SD": "12.6",
                "-2 SD": "13.6",
                "-1 SD": "14.8",
                "Median": "16.1",
                "+1 SD": "17.6",
                "+2 SD": "19.3",
                "+3 SD": "21.3"
            },
            {
                "umur": "15",
                "-3 SD": "12.5",
                "-2 SD": "13.5",
                "-1 SD": "14.7",
                "Median": "16.0",
                "+1 SD": "17.5",
                "+2 SD": "19.2",
                "+3 SD": "21.1"
            },
            {
                "umur": "16",
                "-3 SD": "12.4",
                "-2 SD": "13.5",
                "-1 SD": "14.6",
                "Median": "15.9",
                "+1 SD": "17.4",
                "+2 SD": "19.1",
                "+3 SD": "21.0"
            },
            {
                "umur": "17",
                "-3 SD": "12.4",
                "-2 SD": "13.4",
                "-1 SD": "14.5",
                "Median": "15.8",
                "+1 SD": "17.3",
                "+2 SD": "18.9",
                "+3 SD": "20.9"
            },
            {
                "umur": "18",
                "-3 SD": "12.3",
                "-2 SD": "13.3",
                "-1 SD": "14.4",
                "Median": "15.7",
                "+1 SD": "17.2",
                "+2 SD": "18.8",
                "+3 SD": "20.8"
            },
            {
                "19": "20",
                "12.3": "12.2",
                "13.3": "13.2",
                "14.4": "14.3",
                "15.7": "15.6",
                "17.1": "17.0",
                "18.8": "18.7",
                "20.7": "20.6"
            },
            {
                "19": "21",
                "12.3": "12.2",
                "13.3": "13.2",
                "14.4": "14.3",
                "15.7": "15.5",
                "17.1": "17.0",
                "18.8": "18.6",
                "20.7": "20.5"
            },
            {
                "19": "22",
                "12.3": "12.2",
                "13.3": "13.1",
                "14.4": "14.2",
                "15.7": "15.5",
                "17.1": "16.9",
                "18.8": "18.5",
                "20.7": "20.4"
            },
            {
                "19": "23",
                "12.3": "12.2",
                "13.3": "13.1",
                "14.4": "14.2",
                "15.7": "15.4",
                "17.1": "16.9",
                "18.8": "18.5",
                "20.7": "20.4"
            },
            {
                "25": "26",
                "12.4": "12.3",
                "13.3": "13.3",
                "14.4": "14.4",
                "15.7": "15.6",
                "17.1": "17.0",
                "18.7": "18.7",
                "20.6": "20.6"
            },
            {
                "25": "27",
                "12.4": "12.3",
                "13.3": "13.3",
                "14.4": "14.4",
                "15.7": "15.6",
                "17.1": "17.0",
                "18.7": "18.6",
                "20.6": "20.5"
            },
            {
                "25": "28",
                "12.4": "12.3",
                "13.3": "13.3",
                "14.4": "14.3",
                "15.7": "15.6",
                "17.1": "17.0",
                "18.7": "18.6",
                "20.6": "20.5"
            },
            {
                "25": "29",
                "12.4": "12.3",
                "13.3": "13.2",
                "14.4": "14.3",
                "15.7": "15.6",
                "17.1": "17.0",
                "18.7": "18.6",
                "20.6": "20.4"
            },
            {
                "25": "30",
                "12.4": "12.3",
                "13.3": "13.2",
                "14.4": "14.3",
                "15.7": "15.5",
                "17.1": "16.9",
                "18.7": "18.5",
                "20.6": "20.4"
            },
            {
                "25": "31",
                "12.4": "12.2",
                "13.3": "13.2",
                "14.4": "14.3",
                "15.7": "15.5",
                "17.1": "16.9",
                "18.7": "18.5",
                "20.6": "20.4"
            },
            {
                "25": "32",
                "12.4": "12.2",
                "13.3": "13.2",
                "14.4": "14.3",
                "15.7": "15.5",
                "17.1": "16.9",
                "18.7": "18.5",
                "20.6": "20.4"
            },
            {
                "25": "33",
                "12.4": "12.2",
                "13.3": "13.1",
                "14.4": "14.2",
                "15.7": "15.5",
                "17.1": "16.9",
                "18.7": "18.5",
                "20.6": "20.3"
            },
            {
                "25": "34",
                "12.4": "12.2",
                "13.3": "13.1",
                "14.4": "14.2",
                "15.7": "15.4",
                "17.1": "16.8",
                "18.7": "18.5",
                "20.6": "20.3"
            },
            {
                "25": "35",
                "12.4": "12.1",
                "13.3": "13.1",
                "14.4": "14.2",
                "15.7": "15.4",
                "17.1": "16.8",
                "18.7": "18.4",
                "20.6": "20.3"
            },
            {
                "25": "36",
                "12.4": "12.1",
                "13.3": "13.1",
                "14.4": "14.2",
                "15.7": "15.4",
                "17.1": "16.8",
                "18.7": "18.4",
                "20.6": "20.3"
            },
            {
                "25": "37",
                "12.4": "12.1",
                "13.3": "13.1",
                "14.4": "14.1",
                "15.7": "15.4",
                "17.1": "16.8",
                "18.7": "18.4",
                "20.6": "20.3"
            },
            {
                "25": "38",
                "12.4": "12.1",
                "13.3": "13.0",
                "14.4": "14.1",
                "15.7": "15.4",
                "17.1": "16.8",
                "18.7": "18.4",
                "20.6": "20.3"
            },
            {
                "25": "39",
                "12.4": "12.0",
                "13.3": "13.0",
                "14.4": "14.1",
                "15.7": "15.3",
                "17.1": "16.8",
                "18.7": "18.4",
                "20.6": "20.3"
            },
            {
                "25": "40",
                "12.4": "12.0",
                "13.3": "13.0",
                "14.4": "14.1",
                "15.7": "15.3",
                "17.1": "16.8",
                "18.7": "18.4",
                "20.6": "20.3"
            },
            {
                "25": "41",
                "12.4": "12.0",
                "13.3": "13.0",
                "14.4": "14.1",
                "15.7": "15.3",
                "17.1": "16.8",
                "18.7": "18.4",
                "20.6": "20.4"
            },
            {
                "25": "42",
                "12.4": "12.0",
                "13.3": "12.9",
                "14.4": "14.0",
                "15.7": "15.3",
                "17.1": "16.8",
                "18.7": "18.4",
                "20.6": "20.4"
            },
            {
                "25": "43",
                "12.4": "11.9",
                "13.3": "12.9",
                "14.4": "14.0",
                "15.7": "15.3",
                "17.1": "16.8",
                "18.7": "18.4",
                "20.6": "20.4"
            },
            {
                "44": "45",
                "11.9": "11.9",
                "12.9": "12.9",
                "14.0": "14.0",
                "15.3": "15.3",
                "16.8": "16.8",
                "18.5": "18.5",
                "20.4": "20.5"
            },
            {
                "44": "46",
                "11.9": "11.9",
                "12.9": "12.9",
                "14.0": "14.0",
                "15.3": "15.3",
                "16.8": "16.8",
                "18.5": "18.5",
                "20.4": "20.5"
            },
            {
                "44": "47",
                "11.9": "11.8",
                "12.9": "12.8",
                "14.0": "14.0",
                "15.3": "15.3",
                "16.8": "16.8",
                "18.5": "18.5",
                "20.4": "20.5"
            },
            {
                "44": "48",
                "11.9": "11.8",
                "12.9": "12.8",
                "14.0": "14.0",
                "15.3": "15.3",
                "16.8": "16.8",
                "18.5": "18.5",
                "20.4": "20.6"
            },
            {
                "44": "49",
                "11.9": "11.8",
                "12.9": "12.8",
                "14.0": "13.9",
                "15.3": "15.3",
                "16.8": "16.8",
                "18.5": "18.5",
                "20.4": "20.6"
            },
            {
                "44": "50",
                "11.9": "11.8",
                "12.9": "12.8",
                "14.0": "13.9",
                "15.3": "15.3",
                "16.8": "16.8",
                "18.5": "18.6",
                "20.4": "20.7"
            },
            {
                "44": "51",
                "11.9": "11.8",
                "12.9": "12.8",
                "14.0": "13.9",
                "15.3": "15.3",
                "16.8": "16.8",
                "18.5": "18.6",
                "20.4": "20.7"
            },
            {
                "44": "52",
                "11.9": "11.7",
                "12.9": "12.8",
                "14.0": "13.9",
                "15.3": "15.2",
                "16.8": "16.8",
                "18.5": "18.6",
                "20.4": "20.7"
            },
            {
                "44": "53",
                "11.9": "11.7",
                "12.9": "12.7",
                "14.0": "13.9",
                "15.3": "15.3",
                "16.8": "16.8",
                "18.5": "18.6",
                "20.4": "20.8"
            },
            {
                "44": "54",
                "11.9": "11.7",
                "12.9": "12.7",
                "14.0": "13.9",
                "15.3": "15.3",
                "16.8": "16.8",
                "18.5": "18.7",
                "20.4": "20.8"
            },
            {
                "44": "55",
                "11.9": "11.7",
                "12.9": "12.7",
                "14.0": "13.9",
                "15.3": "15.3",
                "16.8": "16.8",
                "18.5": "18.7",
                "20.4": "20.9"
            },
            {
                "44": "56",
                "11.9": "11.7",
                "12.9": "12.7",
                "14.0": "13.9",
                "15.3": "15.3",
                "16.8": "16.8",
                "18.5": "18.7",
                "20.4": "20.9"
            },
            {
                "44": "57",
                "11.9": "11.7",
                "12.9": "12.7",
                "14.0": "13.9",
                "15.3": "15.3",
                "16.8": "16.9",
                "18.5": "18.7",
                "20.4": "21.0"
            },
            {
                "44": "58",
                "11.9": "11.7",
                "12.9": "12.7",
                "14.0": "13.9",
                "15.3": "15.3",
                "16.8": "16.9",
                "18.5": "18.8",
                "20.4": "21.0"
            },
            {
                "44": "59",
                "11.9": "11.6",
                "12.9": "12.7",
                "14.0": "13.9",
                "15.3": "15.3",
                "16.8": "16.9",
                "18.5": "18.8",
                "20.4": "21.0"
            },
            {
                "44": "60",
                "11.9": "11.6",
                "12.9": "12.7",
                "14.0": "13.9",
                "15.3": "15.3",
                "16.8": "16.9",
                "18.5": "18.8",
                "20.4": "21.1"
            }
            ];
        <?php endif; ?>


        // Extract labels and datasets from the data
        var labels = jsonData.map(item => item.umur);
        var datasets = Object.keys(jsonData[0]).slice(1).map(key => ({
            label: key,
            data: jsonData.map(item => parseFloat(item[key])),
            borderColor: getRandomColor(),
            backgroundColor: 'transparent',
            borderWidth: 2,
            fill: false
        }));

        var dummy = Object.keys(jsonData[0]).slice(1).map(key => ({
            label: key,
            data: jsonData.map(item => parseFloat(item[key])),
        }));

        console.log(dummy);

        // Create the chart
        // var ctx = document.getElementById('stackedLineChart').getContext('2d');
        var stackedLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: datasets
            },
            options: {
                scales: {
                    x: {
                        type: 'linear',
                        position: 'bottom',
                        title: {
                            display: true,
                            text: 'Umur (Bulan)',
                        }
                    },
                    y: {
                        stacked: true,
                        title: {
                            display: true,
                            text: 'IMT(Indeks Massa Tubuh)',
                        },
                    }
                }
            }
        });

        // Function to generate random color
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // ==================================================================================================


        // Data for line chart
        var lineChartData = {
            labels: labels,
            datasets: datasets
        };

        // Data for scatter plot
        var scatterChartData = {
            datasets: [{
                label: 'IMT Grafik',
                data: [{
                    x: <?= $latest_bayi['umur']; ?>,
                    y: <?= $latest_bayi['imt']; ?>,
                }],
                backgroundColor: function (context) {
                    var category = context.dataset.data[context.dataIndex].category;
                    return getCategoryColor(category);
                },
                borderColor: 'rgba(0, 0, 0, 0.8)',
                borderWidth: 1,
                pointRadius: 8,
                pointHoverRadius: 10,
            }]
        };



        // Chart Configuration
        var config = {
            type: 'line', // Change to 'bar', 'line', or other chart type as needed
            data: {
                labels: labels, // Assuming labels are the same for both charts
                datasets: [

                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                title: {
                    display: true,
                    text: 'Combined Chart',
                },
                scales: {
                    x: {
                        type: 'linear',
                        position: 'bottom',
                        title: {
                            display: true,
                            text: 'Umur (Bulan)',
                        }
                    },
                    y: {
                        type: 'linear', // Assuming 'linear' scale for the y-axis
                        stacked: true,
                        title: {
                            display: true,
                            text: 'IMT(Indeks Massa Tubuh)',
                        },
                        position: 'right',
                    },
                }

            },
        };


        // Line chart datasets
        for (var i = 0; i < lineChartData.datasets.length; i++) {
            config.data.datasets.push({
                label: lineChartData.datasets[i].label,
                data: lineChartData.datasets[i].data,
                borderColor: 'rgba(255, 99, 132, 1)',
                fill: false,
                yAxisID: 'y',
            });
        }

        // Scatter plot dataset
        config.data.datasets.push({
            label: 'IMT(Indeks Massa Tubuh)',
            data: [{
                x: <?= $latest_bayi['umur']; ?>,
                y: <?= $latest_bayi['imt']; ?>,
                category: 'ScatterCategory', // Add a category property for the scatter plot
            }],
            backgroundColor: 'rgba(0, 0, 0, 0.8)',
            borderColor: 'rgba(0, 0, 0, 0.8)',
            borderWidth: 1,
            pointRadius: 8,
            pointHoverRadius: 10,
            yAxisID: 'y', // Use the same y-axis as the line chart
        });


        // Create the chart
        var ctx = document.getElementById('combinedChart').getContext('2d');
        var combinedChart = new Chart(ctx, config);


        function getCategoryColor(category) {
            if (typeof category !== 'undefined') {
                switch (category) {
                    case 'Underweight':
                        return 'rgba(255, 0, 0, 0.8)';
                    case 'Normal Weight':
                        return 'rgba(0, 128, 0, 0.8)';
                    case 'Overweight':
                        return 'rgba(255, 255, 0, 0.8)';
                    case 'Obese':
                        return 'rgba(255, 0, 0, 0.8)';
                    default:
                        return 'rgba(0, 0, 255, 0.8)';
                }
            } else {
                // Handle the case where category is undefined
                return 'rgba(0, 0, 0, 0.8)';
            }
        }


        // ==================================================================================================
    </script>
    <script>
        // var ctx = document.getElementById('bmiChart').getContext('2d');

        var bmiChart = new Chart(ctx, {
            type: 'scatter',
            data: {
                datasets: [{
                    label: 'IMT Grafik',
                    data: [{
                        x: <?= $latest_bayi['umur']; ?>,
                        y: <?= is_numeric($latest_bayi['imt']) ? (float) $latest_bayi['imt'] : 0.0; ?>,

                    },],
                    backgroundColor: function (context) {
                        var category = context.dataset.data[context.dataIndex].category;
                        return getCategoryColor(category);
                    },
                    borderColor: 'rgba(0, 0, 0, 0.8)',
                    borderWidth: 1,
                    pointRadius: 8,
                    pointHoverRadius: 10,
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Grafik IMT',
                    fontSize: 16,
                },
                scales: {
                    x: {
                        type: 'linear',
                        position: 'bottom',
                        title: {
                            display: true,
                            text: 'Umur (Bulan)',
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'IMT(Indeks Massa Tubuh)',
                        },
                    },
                },
                legend: {
                    display: false,
                },
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem) {
                            return `BMI: ${tooltipItem.yLabel.toFixed(2)} (${tooltipItem.xLabel} Bulan)`;
                        },
                    },
                },
            }
        });

        function getCategoryColor(category) {
            // Define colors based on BMI categories
            switch (category) {
                case 'Underweight':
                    return 'rgba(255, 0, 0, 0.8)';
                case 'Normal Weight':
                    return 'rgba(0, 128, 0, 0.8)';
                case 'Overweight':
                    return 'rgba(255, 255, 0, 0.8)';
                case 'Obese':
                    return 'rgba(255, 0, 0, 0.8)';
                default:
                    return 'rgba(0, 0, 255, 0.8)';
            }
        }
    </script>

<?php endif; ?>

<?php if (uri_string() == 'admin/proses-klasifikasi'): ?>

    <script>
        $(document).ready(function () {
            $('#klasifikasi-form').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function (response) {
                        // handle success response here
                        console.log(response);
                        $('#hasil').text(response.predicted);


                    },
                    error: function (xhr, status, error) {
                        // handle error response here
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
<?php endif; ?>

<?php if (uri_string() == 'admin/sdidtk'): ?>

    <script>
        $(document).ready(function () {
            $('#bayi-from').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function (response) {
                        // handle success response here
                        var data = $.parseJSON(response);
                        console.log(response);
                        console.log(data.nama_bayi);
                        $('#nama_bayi').val(data.nama_bayi);
                        $('#usia_bayi').val(data.umur);
                        $('#jenis_kelamin option[value="' + jenis_kelamin + '"]').attr("selected", "selected");
                        $('#berat_badan').val(data.berat_badan);
                        $('#tinggi_badan').val(data.tinggi_badan);
                        $('#lingkar_kepala').val(data.lingkar_kepala);
                        $('#imt').val(data.imt);
                        $('#status_gizi').val(data.status_gizi);

                    },
                    error: function (xhr, status, error) {
                        // handle error response here
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
<?php endif; ?>