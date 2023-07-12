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
                        <a href="<?= base_url(url_to('radio_lok.add')) ?>" class="btn btn-success mb-3" role="button">
                            <i class="fas fa-plus"></i>
                            Tambah Data
                        </a>
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
                                    <th>Approved</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($radioLoksWithRelations as $key => $radioLok) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $radioLok->seri_lokomotif ?></td>
                                    <td><?= date_format(date_create($radioLok->tanggal), 'Y-M-d') ?></td>
                                    <td><?= $radioLok->id_ralok ?></td>
                                    <td><?= $radioLok->tipe_ralok ?></td>
                                    <td><?= $radioLok->nama_resor ?></td>
                                    <td><?= $radioLok->nama_pnc ?></td>
                                    <td><?= $radioLok->approved == 1 ? 'Diterima' : 'Pending' ?></td>
                                    <td>
                                        <?php if($radioLok->approved == 1): ;?>
                                        <button role="button" class="btn btn-primary mr-2 mb-2" disabled>
                                            <i class="fas fa-check"></i>
                                            Approved!</button>
                                        <?php else:?>
                                        <a role="button" class="btn btn-success mr-2 mb-2" href="<?= base_url(url_to('radio_lok.edit',$radioLok->id));?>">
                                            <i class="fas fa-pen"></i>
                                            Edit
                                        </a>
                                        <?php endif; ;?>
                                        <a href="<?= base_url(url_to('radio_lok.delete', $radioLok->id)) ?>"
                                            role="button" class="btn btn-danger mr-2">
                                            <i class="fas fa-trash"></i>
                                            Hapus</a>
                                        <a href="<?= base_url(url_to('radio_lok.detail', $radioLok->id)) ?>"
                                            role="button" class="btn btn-warning mr-2">
                                            <i class="fas fa-sticky-note"></i>
                                            Detail</a>
                                    </td>
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
                                    <th>Approved</th>
                                    <th>Action</th>
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
