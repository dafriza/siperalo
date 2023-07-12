<?= $this->extend('masterFile') ?>
<?= $this->section('content') ?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- Main row -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title ?></h3>
                    </div> <!-- /.card-header -->
                    <div class="card-body">
                        <?php if(session('data')['role'] == 'superadmin'):?>
                        <a href="<?= base_url(url_to('radio_lok.index')) ?>" class="mr-2"><i
                                class="fas fa-arrow-left"></i> Kembali</a>
                        <?php elseif(session('data')['role'] == 'karyawan'):?>
                        <a href="<?= base_url(url_to('radio_lok.laporan')) ?>" class="mr-2"><i
                                class="fas fa-arrow-left"></i> Kembali</a>
                        <?php endif ;?>
                        <hr>
                        <table>
                            <tr>
                                <td>Seri Lokomotif </td>
                                <td>: <?= $findRadioLok->seri_lokomotif ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal </td>
                                <td>: <?= date_format(date_create($findRadioLok->tanggal), 'Y-M-d') ?></td>
                            </tr>
                            <tr>
                                <td>ID Ralok </td>
                                <td>: <?= $findRadioLok->id_ralok ?></td>
                            </tr>
                            <tr>
                                <td>Resor </td>
                                <td>: <?= $findRadioLok->kode_resor ?> <?= $findRadioLok->nama_resor ?></td>
                            </tr>
                            <tr>
                                <td>PNC </td>
                                <td>: <?= $findRadioLok->nama_pnc ?></td>
                            </tr>
                        </table>
                        <hr>
                        <h4 style="text-align:center" class="mb-3">Keterangan</h4>
                        <h5 class="mb-3">Checklist</h5>
                        <table>
                            <tr>
                                <td>RTS Call </td>
                                <td>: <?= $findRadioLok->rts_call == 1 ? 'Baik' : 'Tombol RTS tidak berfungsi' ?></td>
                            </tr>
                            <tr>
                                <td>PC Call </td>
                                <td>: <?= $findRadioLok->pc_call == 1 ? 'Baik' : 'Tombol PC tidak berfungsi' ?></td>
                            </tr>
                            <tr>
                                <td>Incoming Call </td>
                                <td>:
                                    <?= $findRadioLok->incoming_call == 1 ? 'Baik' : 'Tombol Incoming tidak berfungsi' ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Clock Display </td>
                                <td>: <?= $findRadioLok->clock_display == 1 ? 'Baik' : 'Clock tidak berfungsi' ?></td>
                            </tr>
                            <tr>
                                <td>Channel Section </td>
                                <td>: <?= $findRadioLok->channel_section == 1 ? 'Baik' : 'Channel tidak berfungsi' ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Volume </td>
                                <td>: <?= $findRadioLok->volume == 1 ? 'Baik' : 'Volume tidak berfungsi' ?></td>
                            </tr>
                            <tr>
                                <td>Emergency Call </td>
                                <td>:
                                    <?= $findRadioLok->emergency_call == 1 ? 'Baik' : 'Tombol Emergency tidak berfungsi' ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Connector </td>
                                <td>: <?= $findRadioLok->connector == 1 ? 'Baik' : 'Connector tidak berfungsi' ?></td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<?= $this->endSection() ?>
