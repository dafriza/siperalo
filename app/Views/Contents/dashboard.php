<?= $this->extend('masterFile') ?>
<?= $this->section('content') ?>
<?= $this->section('head') ?>
<link rel="stylesheet" href="<?= base_url('../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
<?= $this->endSection() ?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $karyawans ?? 0 ?></h3>

                        <p>Total Karyawan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <!-- <a href="<?= base_url('#') ?>" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $resors ?></h3>

                        <p>Total Resor</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <!-- <a href="<?= base_url('#') ?>" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $radioLoks ?></h3>

                        <p>Total Radio Lok</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <!-- <a href="<?= base_url('#') ?>" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $dataAsets ?></h3>

                        <p>Total Data Aset</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <!-- <a href="<?= base_url('#') ?>" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Radio Lok</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Seri Lokomotif</th>
                                    <th>Tanggal</th>
                                    <th>ID Ralok</th>
                                    <th>Tipe Ralok</th>
                                    <th>Resor</th>
                                    <th>PNC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($radioLoksWithRelations as $key => $radioLoksWithRelation) : ?>
                                <tr>
                                    <td><?= $key + 1;?></td>
                                    <td><?= $radioLoksWithRelation['seri_lokomotif'];?></td>
                                    <td><?= date_format(date_create($radioLoksWithRelation['tanggal']),"Y-M-d")?></td>
                                    <td><?= $radioLoksWithRelation['id_ralok'];?></td>
                                    <td><?= $radioLoksWithRelation['tipe_ralok'];?></td>
                                    <td><?= $radioLoksWithRelation['nama_resor'];?></td>
                                    <td><?= $radioLoksWithRelation['nama_pnc'];?></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Seri Lokomotif</th>
                                    <th>Tanggal</th>
                                    <th>ID Ralok</th>
                                    <th>Tipe Ralok</th>
                                    <th>Resor</th>
                                    <th>PNC</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->section('script') ?>
<script src="<?= base_url('../../plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('../../plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('../../plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('../../plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?= base_url('../../plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('../../plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('../../plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('../../plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('../../plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
<script>
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script>
<?= $this->endSection() ?>

<?= $this->endSection() ?>
