<?php
$sql = "SELECT * FROM barang WHERE id = '{$_GET['id']}'";
$data = mysqli_fetch_array(mysqli_query($db, $sql));
?>

<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Stok Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Ubah Stok Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="?p=stok&id=<?php echo $data['id'] ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label>Kode ID</label>
                    <input type="text" name="id" value="<?php echo $data['id'] ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Jenis Barang</label>
                    <input type="text" name="jenis_barang" value="<?php echo $data['jenis_barang'] ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Merk Barang</label>
                    <input type="text" name="merk_barang" value="<?php echo $data['merk_barang'] ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" value="<?php echo $data['nama_barang'] ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Harga Barang</label>
                    <input type="text" name="harga" value="<?php echo $data['harga'] ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Jumlah Barang</label>
                    <input type="text" name="jumlah" value="<?php echo $data['jumlah'] ?>" class="form-control">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
  <!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>