<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('Layouts/head') ?>
    <?= $this->renderSection('head') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url('dist/img/AdminLTELogo.png') ?>" alt="AdminLTELogo"
                height="60" width="60">
        </div> -->

        <!-- Navbar -->
        <?= $this->include('Layouts/navbar') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?= $this->include('Layouts/sidebar') ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $title;?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url(url_to('dashboard')) ?>">Home</a></li>
                                <li class="breadcrumb-item active"><?= $title;?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <?= $this->renderSection('content') ?>
        </div>
        <!-- /.content-wrapper -->
        <?= $this->include('Layouts/footer') ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?= $this->include('Layouts/script') ?>
    <?= $this->renderSection('script') ?>
    <?= $this->include('Components/sweetalert') ?>
</body>

</html>
