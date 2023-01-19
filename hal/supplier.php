<?php
if(isset($_POST['tambah'])){
  $kode = $_POST['kode'];
  $nama = $_POST['nama'];
  $password = $_POST['password'];
  
  $sql = "INSERT INTO supplier (kode, nama, password) VALUES ('$kode', '$nama', '$password')";
  mysqli_query($db, $sql);
}

if(isset($_GET['del'])){
  $id = $_GET['del'];

  $sql = "DELETE FROM supplier WHERE id = '$id'";
  mysqli_query($db, $sql);
}

if(isset($_POST['ubah'])){
  $id = $_GET['id'];
  $kode = $_POST['kode'];
  $nama = $_POST['nama'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  
  $sql = "UPDATE supplier SET kode='$kode', nama='$nama', password='$password' WHERE id='$id'";
  mysqli_query($db, $sql);
}

$sql = "SELECT * FROM supplier";
$result = mysqli_query($db, $sql);
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
            <h1 class="m-0">Supplier</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?p=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Supplier</li>
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Supplier</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table kode="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Kode Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php while($row = mysqli_fetch_array($result)){?>
                  <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['kode']?></td>
                    <td><?php echo $row['nama']?></td>
                    <td><a href="?p=supplier&del=<?php echo $row['id'] ?>">Hapus</a> | <a href="?p=edit_supplier&id=<?php echo $row['id'] ?>">Ubah</a></td>
                  </tr>
                  
                  <?php } ?>
                  
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Kode Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="?p=supplier">
                <div class="card-body">
                  <div class="form-group">
                    <label>Kode Supplier</label>
                    <input type="text" name="kode" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Nama Supplier</label>
                    <input type="text" name="nama" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
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