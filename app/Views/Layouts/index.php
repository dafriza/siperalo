<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('Layouts/head') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url('dist/img/AdminLTELogo.png') ?>" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        <?= $this->include('Layouts/navbar') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?= $this->include('Layouts/sidebar');?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?= $this->renderSection('content');?>
        </div>
        <!-- /.content-wrapper -->
        <?= $this->include('Layouts/footer');?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?= $this->include('Layouts/script');?>
    <?= $this->include('Components/sweetalert') ?>
</body>

</html>
