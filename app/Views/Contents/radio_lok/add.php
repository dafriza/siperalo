<?= $this->extend('masterFile') ?>
<?= $this->section('content') ?>
<?= $this->section('head') ?>
<link rel="stylesheet" href="<?= base_url('../../plugins/select2/css/select2.min.css') ?>">
<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 1.2rem !important;
    }
</style>
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
                        <?= form_open(url_to('radio_lok.update')) ?>
                        <!-- Seri Lokomotif -->
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="seri_lokomotif">Seri Lokomotif</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="seri_lokomotif"
                                        name="seri_lokomotif">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="id_ralok">ID Ralok</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <select class="js-example-basic-single" name="ralok_id">
                                    <?php foreach ($raloks as $key => $ralok): ?>
                                    <option value="<?= $ralok->id ?>"><?= $ralok->id_ralok ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="resor">Resor</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <select class="js-example-basic-single" name="resor_id">
                                    <?php foreach ($resors as $key => $resor): ?>
                                    <option value="<?= $resor->id ?>">
                                        <?= $resor->kode_resor . ' ' . $resor->nama_resor ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="pnc">PNC</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="pnc"
                                        value="<?= session('data')['nama'] ?>" disabled>
                                    <input type="hidden" class="form-control" id="pnc" name="pnc_id"
                                        value="<?= session('data')['id'] ?>">
                                </div>
                            </div>
                        </div>
                        <h5 class="my-3">Item Checklist</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Checklist</th>
                                    <th>Console</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- RTS -->
                                <tr>
                                    <td>1</td>
                                    <td>RTC Call</td>
                                    <td>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_rtc_call" name="rtc_call"
                                                class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="OK_rtc_call">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_rtc_call" name="rtc_call"
                                                class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="NOK_rtc_call">NOK</label>
                                        </div>
                                    </td>
                                </tr>
                                <!-- PC -->
                                <tr>
                                    <td>2</td>
                                    <td>PC Call</td>
                                    <td>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_pc_call" name="pc_call"
                                                class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="OK_pc_call">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_pc_call" name="pc_call"
                                                class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="NOK_pc_call">NOK</label>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Incoming -->
                                <tr>
                                    <td>3</td>
                                    <td>Incoming Call</td>
                                    <td>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_incoming_call" name="incoming_call"
                                                class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="OK_incoming_call">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_incoming_call" name="incoming_call"
                                                class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="NOK_incoming_call">NOK</label>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Clock Display -->
                                <tr>
                                    <td>4</td>
                                    <td>Clock Display</td>
                                    <td>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_clock_display" name="clock_display"
                                                class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="OK_clock_display">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_clock_display" name="clock_display"
                                                class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="NOK_clock_display">NOK</label>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Channel Section -->
                                <tr>
                                    <td>5</td>
                                    <td>Channel Section</td>
                                    <td>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_channel_section" name="channel_section"
                                                class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="OK_channel_section">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_channel_section" name="channel_section"
                                                class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="NOK_channel_section">NOK</label>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Volume -->
                                <tr>
                                    <td>6</td>
                                    <td>Volume</td>
                                    <td>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_volume" name="volume"
                                                class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="OK_volume">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_volume" name="volume"
                                                class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="NOK_volume">NOK</label>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Emergency -->
                                <tr>
                                    <td>7</td>
                                    <td>Emergency Call</td>
                                    <td>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_emergency_call" name="emergency_call"
                                                class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="OK_emergency_call">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_emergency_call" name="emergency_call"
                                                class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="NOK_emergency_call">NOK</label>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Connector -->
                                <tr>
                                    <td>8</td>
                                    <td>Connector</td>
                                    <td>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_connector" name="connector"
                                                class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="OK_connector">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_connector" name="connector"
                                                class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="NOK_connector">NOK</label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<?= $this->section('script') ?>
<script src="<?= base_url('../../plugins/select2/js/select2.min.js') ?>"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $('.js-example-basic-single').select2({
        width: '100%',
        dropdownAutoWidth: true
    });
</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>
