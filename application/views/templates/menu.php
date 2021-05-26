<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="<?= base_url('kependudukan'); ?>">
                    <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('kependudukan/data_penduduk'); ?>">
                    <i class="fa fa-book"></i> <span>DATA PENDUDUK</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('kependudukan/data_kelahiran'); ?>">
                    <i class="fa fa-book"></i> <span>DATA KELAHIRAN</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('kependudukan/data_kematian'); ?>">
                    <i class="fa fa-book"></i> <span>DATA KEMATIAN</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('kependudukan/data_pendatang'); ?>">
                    <i class="fa fa-book"></i> <span>DATA PENDATANG</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('kependudukan/data_pindahan'); ?>">
                    <i class="fa fa-book"></i> <span>DATA PINDAHAN</span>
                </a>
            </li>
            <li class="header">SETTING</li>
            <li>
                <a href="<?= base_url('kependudukan/edit_profil'); ?>">
                    <i class="fa fa-user"></i> <span>EDIT PROFIL</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('kependudukan/data_user'); ?>">
                    <i class="fa fa-user"></i> <span>DATA USER</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sign-out"></i>
                    <span>LOGOUT</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>