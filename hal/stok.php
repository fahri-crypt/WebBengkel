<?php
if(isset($_POST['tambah'])){
  $id = $_POST['id'];
  $jenis_barang = $_POST['jenis_barang'];
  $merk_barang = $_POST['merk_barang'];
  $nama_barang = $_POST['nama_barang'];
  $harga = $_POST['harga'];
  $jumlah = $_POST['jumlah'];

  $sql = "INSERT INTO barang (id, jenis_barang, merk_barang, nama_barang, harga, jumlah) VALUES ('$id', '$jenis_barang', '$merk_barang', '$nama_barang', '$harga', '$jumlah')";
  mysqli_query($db, $sql);
}

if(isset($_GET['del'])){
  $id = $_GET['del'];

  $sql = "DELETE FROM barang WHERE id = '$id'";
  mysqli_query($db, $sql);
}

if(isset($_POST['ubah'])){
  $id = $_GET['id'];
  $jenis_barang = $_POST['jenis_barang'];
  $merk_barang = $_POST['merk_barang'];
  $nama_barang = $_POST['nama_barang'];
  $harga = $_POST['harga'];
  $jumlah = $_POST['jumlah'];

  $sql = "UPDATE barang SET id='$id', jenis_barang='$jenis_barang', merk_barang='$merk_barang', nama_barang='$nama_barang', harga='$harga', jumlah='$jumlah' WHERE id='$id'";
  mysqli_query($db, $sql);
}

$sql = "SELECT * FROM barang";
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
            <h1 class="m-0">Data Stok Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?p=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Stok Barang</li>
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
                <h3 class="card-title">Edit Stock</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Jenis Barang</th>
                    <th>Merk Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah Barang</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php while($row = mysqli_fetch_array($result)){?>
                  <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['jenis_barang']?></td>
                    <td><?php echo $row['merk_barang']?></td>
                    <td><?php echo $row['nama_barang']?></td>
                    <td><?php echo "Rp " . number_format($row['harga'], 2, ",", ".")?></td>
                    <td><?php echo $row['jumlah']?></td>
                    <td><a href="?p=stok&del=<?php echo $row['id'] ?>">Hapus</a> | <a href="?p=edit_stok&id=<?php echo $row['id'] ?>">Ubah</a></td>
                  </tr>
                  
                  <?php } ?>
                  
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Jenis Barang</th>
                    <th>Merk Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah Barang</th>
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
              <form method="post" action="?p=stok">
                <div class="card-body">
                  <div class="form-group">
                    <label>Kode ID</label>
                    <input type="text" name="id" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Jenis Barang</label>
                    <input type="text" name="jenis_barang" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Merk Barang</label>
                    <input type="text" name="merk_barang" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="text" name="harga" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Jumlah Barang</label>
                    <input type="text" name="jumlah" class="form-control">
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