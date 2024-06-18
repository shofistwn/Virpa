<!DOCTYPE html>
<html lang="en">


<!-- header -->

<?= $this->include('admin/partials/newHeader'); ?>

<body>
    <div id="app" style="background: #FFD6E7;">


        <!-- sidebard -->
        <?= $this->include('admin/partials/newSidebar'); ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3 class="text-black"><?= $breadcrumbs ?></h3>
            </div>

            <!-- main content -->
            <div class="page-content">
                <?php if (session()->getFlashdata('success_form')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('success_form') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <section class="row">

                    <!-- content -->
                    <?= $this->renderSection('content'); ?>
                    <!-- /.content -->

                </section>
            </div>


            <!-- footer -->
            <?= $this->include('admin/partials/newFooter'); ?>

        </div>
    </div>


    <!-- script -->
    <script>
        const base_url = '<?= base_url() ?>';
    </script>
    <?= $this->include('admin/partials/newScript'); ?>
    <script>
        console.log('<?= $role ?>');
    </script>


</body>

</html>