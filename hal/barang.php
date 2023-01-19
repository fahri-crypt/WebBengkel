<?php
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
            <h1 class="m-0">Spare Part</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?p=dashboard">Home</a></li>
              <li class="breadcrumb-item active">List Barang</li>
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
                <h3 class="card-title">List Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Jenis</th>
                    <th>Merk Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah Barang</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php while($row = mysqli_fetch_array($result)){ ?>
                  
                  <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['jenis_barang']?></td>
                    <td><?php echo $row['merk_barang']?></td>
                    <td><?php echo $row['nama_barang']?></td>
                    <td><?php echo "Rp " . number_format($row['harga'], 2, ",", ".")?></td>
                    <td><?php echo $row['jumlah']?></td>
                  </tr>
                  <?php } ?>
                  
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Jenis</th>
                    <th>Merk Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah Barang</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

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