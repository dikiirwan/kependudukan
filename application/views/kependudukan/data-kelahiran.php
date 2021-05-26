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
        <div class="row">
            <div class="col-xs-12">
                <?= $this->session->flashdata('message'); ?>
                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('kependudukan/tambah_kelahiran'); ?>" class="btn btn-info"><i class="fa fa-plus"></i> TAMBAH</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>TEMPAT LAHIR</th>
                                    <th>TGL LAHIR</th>
                                    <th>NO KTP AYAH</th>
                                    <th>NO KTP IBU</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>DIBUAT PADA</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kelahiran as $kl) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $kl['nama']; ?></td>
                                        <td><?= $kl['tmpt_lahir']; ?></td>
                                        <td><?= $kl['tgl_lahir']; ?></td>
                                        <td><?= $kl['no_ktp_ayah']; ?></td>
                                        <td><?= $kl['no_ktp_ibu']; ?></td>
                                        <td><?= $kl['jenis_kelamin']; ?></td>
                                        <td><?= date('d F Y', $kl['date_created']); ?></td>
                                        <td>
                                            <a href="<?= base_url('kependudukan/edit_kelahiran/') . $kl['id_kelahiran']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('kependudukan/hapus_kelahiran/') . $kl['id_kelahiran']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>TGL LAHIR</th>
                                    <th>NO KTP AYAH</th>
                                    <th>NO KTP IBU</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>DIBUAT PADA</th>
                                    <th>ACTION</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
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
<!-- DataTables -->
<script src="<?= base_url('assets/'); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url('assets/'); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/'); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/'); ?>js/demo.js"></script>
<!-- page script -->
<script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>
</body>

</html>