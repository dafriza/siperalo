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
                        <h3 class="card-title">Resor</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <?= form_open(url_to('resor.update')) ?>
                                <div class="form-group">
                                    <label for="nama_resor">Nama Resor</label>
                                    <input type="text" class="form-control" id="nama_resor" name="nama_resor">
                                </div>
                                <div class="form-group">
                                    <label for="kode_resor">Kode Resor</label>
                                    <input type="text" class="form-control" id="kode_resor" name="kode_resor">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<?= $this->endSection() ?>
