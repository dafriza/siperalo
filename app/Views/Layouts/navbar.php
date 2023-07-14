<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="<?= base_url('#') ?>" role="button"><i
                    class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <?= form_open(url_to('logout'), ['id' => 'myform']) ?>
            <a class="nav-link" role="button" onclick="document.getElementById('myform').submit()">
                <i class="fas fa-door-open"></i>
            </a>
            </form>
        </li>
    </ul>
</nav>
