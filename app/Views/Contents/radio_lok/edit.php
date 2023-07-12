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
                                    <input type="text" class="form-control" id="seri_lokomotif" name="seri_lokomotif"
                                        value="<?= $findRadioLok->seri_lokomotif ?>">
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
                                    <input type="date" class="form-control" id="tanggal" name="tanggal"
                                        value="<?= date_format(date_create($findRadioLok->tanggal), 'Y-m-d') ?>">
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
                                    <option value="<?= $findRadioLok->ralok_id ?>" selected>
                                        <?= $findRadioLok->id_ralok ?></option>
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
                                    <option value="<?= $findRadioLok->resor_id ?>" selected>
                                        <?= $findRadioLok->kode_resor . ' ' . $findRadioLok->nama_resor ?></option>
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
                                <!-- RTC -->
                                <tr>
                                    <td>1</td>
                                    <td>RTC Call</td>
                                    <td>
                                        <?php if($findRadioLok->rtc_call == 1): ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_rtc_call" name="rtc_call"
                                                class="custom-control-input" value="1" checked="checked">
                                            <label class="custom-control-label" for="OK_rtc_call">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_rtc_call" name="rtc_call"
                                                class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="NOK_rtc_call">NOK</label>
                                        </div>
                                        <?php else:?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_rtc_call" name="rtc_call"
                                                class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="OK_rtc_call">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_rtc_call" name="rtc_call"
                                                class="custom-control-input" value="0" checked="checked">
                                            <label class="custom-control-label" for="NOK_rtc_call">NOK</label>
                                        </div>
                                        <?php endif ;?>
                                    </td>
                                    <td>
                                        <?= $findRadioLok->rtc_call == 1 ? 'Baik' : 'Tombol RTC Rusak!';?>
                                    </td>
                                </tr>
                                <!-- PC -->
                                <tr>
                                    <td>2</td>
                                    <td>PC Call</td>
                                    <td>
                                    <?php if($findRadioLok->pc_call == 1): ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_pc_call" name="pc_call"
                                                class="custom-control-input" value="1" checked="checked">
                                            <label class="custom-control-label" for="OK_pc_call">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_pc_call" name="pc_call"
                                                class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="NOK_pc_call">NOK</label>
                                        </div>
                                        <?php else:?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_pc_call" name="pc_call"
                                                class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="OK_pc_call">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_pc_call" name="pc_call"
                                                class="custom-control-input" value="0" checked="checked">
                                            <label class="custom-control-label" for="NOK_pc_call">NOK</label>
                                        </div>
                                        <?php endif ;?>
                                    </td>
                                    <td><?= $findRadioLok->pc_call == 1 ? 'Baik' : 'Tombol PC Rusak!';?></td>
                                </tr>
                                <!-- Incoming -->
                                <tr>
                                    <td>3</td>
                                    <td>Incoming Call</td>
                                    <td>
                                    <?php if($findRadioLok->incoming_call == 1): ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_incoming_call_clock_display" name="incoming_call"
                                                class="custom-control-input" value="1" checked="checked">
                                            <label class="custom-control-label" for="OK_incoming_call_clock_display">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_incoming_call_clock_display" name="incoming_call"
                                                class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="NOK_incoming_call_clock_display">NOK</label>
                                        </div>
                                        <?php else:?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_incoming_call_clock_display" name="incoming_call"
                                                class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="OK_incoming_call_clock_display">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_incoming_call_clock_display" name="incoming_call"
                                                class="custom-control-input" value="0" checked="checked">
                                            <label class="custom-control-label" for="NOK_incoming_call_clock_display">NOK</label>
                                        </div>
                                        <?php endif ;?>
                                    </td>
                                    <td>
                                        <?= $findRadioLok->incoming_call == 1 ? 'Baik' : 'Incoming Rusak!';?>
                                    </td>
                                </tr>
                                <!-- Clock Display -->
                                <tr>
                                    <td>4</td>
                                    <td>Clock Display</td>
                                    <td>
                                    <?php if($findRadioLok->clock_display == 1): ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_clock_display" name="clock_display"
                                                class="custom-control-input" value="1" checked="checked">
                                            <label class="custom-control-label" for="OK_clock_display">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_clock_display" name="clock_display"
                                                class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="NOK_clock_display">NOK</label>
                                        </div>
                                        <?php else:?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_clock_display" name="clock_display"
                                                class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="OK_clock_display">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_clock_display" name="clock_display"
                                                class="custom-control-input" value="0" checked="checked">
                                            <label class="custom-control-label" for="NOK_clock_display">NOK</label>
                                        </div>
                                        <?php endif ;?>
                                    </td>
                                    <td>
                                        <?= $findRadioLok->clock_display == 1 ? 'Baik' : 'Clock Rusak!';?>
                                    </td>
                                </tr>
                                <!-- Channel Section -->
                                <tr>
                                    <td>5</td>
                                    <td>Channel Section</td>
                                    <td>
                                    <?php if($findRadioLok->channel_section == 1): ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_channel_section" name="channel_section"
                                                class="custom-control-input" value="1" checked="checked">
                                            <label class="custom-control-label" for="OK_channel_section">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_channel_section" name="channel_section"
                                                class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="NOK_channel_section">NOK</label>
                                        </div>
                                        <?php else:?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_channel_section" name="channel_section"
                                                class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="OK_channel_section">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_channel_section" name="channel_section"
                                                class="custom-control-input" value="0" checked="checked">
                                            <label class="custom-control-label" for="NOK_channel_section">NOK</label>
                                        </div>
                                        <?php endif ;?>
                                    </td>
                                    <td>
                                        <?= $findRadioLok->channel_section == 1 ? 'Baik' : 'Channel Rusak!';?>
                                    </td>
                                </tr>
                                <!-- Volume -->
                                <tr>
                                    <td>6</td>
                                    <td>Volume</td>
                                    <td>
                                    <?php if($findRadioLok->volume == 1): ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_volume" name="volume"
                                                class="custom-control-input" value="1" checked="checked">
                                            <label class="custom-control-label" for="OK_volume">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_volume" name="volume"
                                                class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="NOK_volume">NOK</label>
                                        </div>
                                        <?php else:?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_volume" name="volume"
                                                class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="OK_volume">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_volume" name="volume"
                                                class="custom-control-input" value="0" checked="checked">
                                            <label class="custom-control-label" for="NOK_volume">NOK</label>
                                        </div>
                                        <?php endif ;?>
                                    </td>
                                    <td>
                                        <?= $findRadioLok->volume == 1 ? 'Baik' : 'Volume Rusak!';?>
                                    </td>
                                </tr>
                                <!-- Emergency -->
                                <tr>
                                    <td>7</td>
                                    <td>Emergency Call</td>
                                    <td>
                                    <?php if($findRadioLok->emergency_call == 1): ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_emergency_call" name="emergency_call"
                                                class="custom-control-input" value="1" checked="checked">
                                            <label class="custom-control-label" for="OK_emergency_call">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_emergency_call" name="emergency_call"
                                                class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="NOK_emergency_call">NOK</label>
                                        </div>
                                        <?php else: ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_emergency_call" name="emergency_call"
                                                class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="OK_emergency_call">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_emergency_call" name="emergency_call"
                                                class="custom-control-input" value="0" checked="checked">
                                            <label class="custom-control-label" for="NOK_emergency_call">NOK</label>
                                        </div>
                                        <?php endif ;?>
                                    </td>
                                    <td>
                                        <?= $findRadioLok->emergency_call == 1 ? 'Baik' : 'Emergency Rusak!';?>
                                    </td>
                                </tr>
                                <!-- Connector -->
                                <tr>
                                    <td>8</td>
                                    <td>Connector</td>
                                    <td>
                                    <?php if($findRadioLok->connector == 1): ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_connector" name="connector"
                                                class="custom-control-input" value="1" checked="checked">
                                            <label class="custom-control-label" for="OK_connector">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_connector" name="connector"
                                                class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="NOK_connector">NOK</label>
                                        </div>
                                        <?php else:?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="OK_connector" name="connector"
                                                class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="OK_connector">OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="NOK_connector" name="connector"
                                                class="custom-control-input" value="0" checked="checked">
                                            <label class="custom-control-label" for="NOK_connector" checked>NOK</label>
                                        </div>
                                        <?php endif ;?>
                                    </td>
                                    <td>
                                        <?= $findRadioLok->connector == 1 ? 'Baik' : 'Connector Rusak!';?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="hidden" name="id" value="<?= $findRadioLok->id;?>">
                        <button type="submit" class="btn btn-outline-primary">Update</button>
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
