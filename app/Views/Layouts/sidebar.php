<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <!-- <a href="<?= base_url('#') ?>" class="d-block">Alexander Pierce</a> -->
                <a href="<?= base_url('#') ?>" class="d-block"><?= session('data')['nama'] ?? '' ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="<?= base_url(url_to('dashboard')) ?>"
                        class="nav-link <?= url_to('dashboard') == current_url() ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <?php if(session('data')['role'] == 'superadmin'): ;?>
                <!-- Resor -->
                <li class="nav-item menu-open">
                    <a href="<?= base_url(url_to('resor.index')) ?>"
                        class="nav-link <?= url_to('resor.index') == current_url() ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-city"></i>
                        <p>
                            Resor
                        </p>
                    </a>
                </li>
                <!-- PNC -->
                <li class="nav-item menu-open">
                    <a href="<?= base_url(url_to('pnc.index')) ?>"
                        class="nav-link <?= url_to('pnc.index') == current_url() ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            PNC
                        </p>
                    </a>
                </li>
                <!-- Data Aset -->
                <li class="nav-item menu-open">
                    <a href="<?= base_url(url_to('data_aset.index')) ?>"
                        class="nav-link <?= url_to('data_aset.index') == current_url() ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-server"></i>
                        <p>
                            Data Aset
                        </p>
                    </a>
                </li>
                <!-- Radio Lokomotif -->
                <li class="nav-item menu-open">
                    <a href="<?= base_url(url_to('radio_lok.index')) ?>"
                        class="nav-link <?= url_to('radio_lok.index') == current_url() ? 'active' : '' ?>">
                        <i class="fas fa-folder-open"></i>
                        <p>
                            Radio Lokomotif
                        </p>
                    </a>
                </li>
                <?php elseif(session('data')['role'] == 'karyawan'): ;?>
                <li class="nav-item menu-open">
                    <a href="<?= base_url(url_to('radio_lok.laporan')) ?>"
                        class="nav-link <?= url_to('radio_lok.laporan') == current_url() ? 'active' : '' ?>">
                        <i class="fas fa-upload"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>
                <?php endif ;?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
