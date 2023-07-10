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
                        <h3 class="card-title"><?= $title;?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <?= form_open(url_to('pnc.update')) ?>
                                <input type="hidden" value="<?= $findPNC->id;?>" name="id">
                                <div class="form-group">
                                    <label for="nipp">NIPP</label>
                                    <input type="text" class="form-control" id="nipp" name="nipp"
                                        value="<?= $findPNC->nipp ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama_pnc">Nama PNC</label>
                                    <input type="text" class="form-control" id="nama_pnc" name="nama_pnc"
                                        value="<?= $findPNC->nama_pnc ?>">
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
