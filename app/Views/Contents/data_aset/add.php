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
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <?= form_open(url_to('data_aset.update')) ?>
                                <div class="form-group">
                                    <label for="id_ralok">ID Ralok</label>
                                    <input type="text" class="form-control" id="id_ralok" name="id_ralok">
                                </div>
                                <div class="form-group">
                                    <label for="tipe_ralok">Tipe Ralok</label>
                                    <input type="text" class="form-control" id="tipe_ralok" name="tipe_ralok">
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
