<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->


<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $titlepage; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><?= $title; ?></a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- content -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-info">

                <!-- /.box-header -->
                <!-- form start -->
                <form action="<?= base_url('kependudukan/tambah_user'); ?>" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
                        </div>
                        <div class="form-group">
                            <label for="password1">Password</label>
                            <input type="password" class="form-control" id="Password1" name="password1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="password2">Password</label>
                            <input type="password" class="form-control" id="Password2" name="password2" placeholder="Password Lagi">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-info">Simpan</button>
                        <a href="<?= base_url('kependudukan/data_user'); ?>" class="btn btn-info">Kembali</a>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!-- end content -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer text-center">
    <strong>Copyright &copy; 2019 <a href="#">Modify By. Diki Irwan</a>.</strong> All rights
    reserved.
</footer>


<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url('assets/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url('assets/'); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/'); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/'); ?>js/demo.js"></script>
<script>
    $(document).ready(function() {
        $('.sidebar-menu').tree()
    })
</script>
</body>

</html>