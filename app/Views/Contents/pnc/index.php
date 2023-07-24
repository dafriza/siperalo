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
        <!-- Main row -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="<?= base_url(url_to('pnc.add')) ?>" class="btn btn-success mb-3" role="button">
                            <i class="fas fa-plus"></i>
                            Tambah Data
                        </a>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIPP</th>
                                    <th>Nama PNC</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pncs as $key => $pnc) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $pnc->nipp ?></td>
                                    <td><?= $pnc->nama_pnc ?></td>
                                    <td>
                                        <a href="<?= base_url(url_to('pnc.edit', $pnc->id)) ?>" role="button"
                                            class="btn btn-secondary mr-2">
                                            <i class="fas fa-pen"></i>
                                            Edit</a>
                                        <a href="<?= base_url(url_to('pnc.delete', $pnc->id)) ?>" role="button"
                                            class="btn btn-danger mr-2">
                                            <i class="fas fa-trash"></i>
                                            Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                            <!-- <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>NIPP</th>
                                    <th>Nama PNC</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot> -->
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
        "buttons": ["pdf"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script>
<?= $this->endSection() ?>

<?= $this->endSection() ?>
