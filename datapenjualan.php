<?php 
include 'config.php';
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit(); // Terminate script execution after the redirect
}?>
<!DOCTYPE html>
<html>
<head>
 <title>Membuat CRUD Dengan PHP Dan MySQL - Menampilkan data dari database</title>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

 <link rel="stylesheet" type="text/css" href="sstyle.css">
</head>
<body><center>
<div class="pos-f-t">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-2">
    <form action="logout.php" method="POST" class="login-email">
                <button type="submit"  class="btn">Logout</button>
                </form>
    </div>
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div>
 <div class="judul"> 
 <h1>Data Penjualan</h1>
 <h2>Menampilkan data dari database</h2>
 </div>
 <br/>

 <br/>
 <a class="tombol" href="inpenjualan.php">+ Tambah Data Baru</a>
 
 <h3>Data Pennjualan</h3>
 <form>
 <input type="button" value=" go back!" onclick="history.go(-1)">
</form>
<form method="post" action="">
 <input type="text" name="search" placeholder="cari disini">
 <input type="submit" name="submit" value="search">
</form>

 <?php
include('config.php');

$query = "SELECT * FROM penjualan";
$result = mysqli_query($conn, $query);
?>
<table border ="1" cellspacing="0" cellpadding="10">
  <tr>
  <th>NO</th>
    <th>PenjualanID</th>
    <th>Tanggal Penjualan</th>
    <th>Total Harga</th>
    <th>Aksi</th>

   
  </tr>
<?php
if(isset($_GET['search'])){
    $cari = $_GET['search'];
    $data = "select * from penjualan where PenjualanID like '%".$cari."%'"; 
    }else{
    $data ="select * from penjualan"; 
    }
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tr>
   <td><?php echo $sn; ?> </td>
   <td><?php echo $data['PenjualanID']; ?> </td>
   <td><?php echo $data['TanggalPenjualan']; ?> </td>
   <td><?php echo $data['TotalHarga']; ?>,00 </td>
<td> 
 <a class="edit" href="edit.php?PenjualanID=<?php echo $data['PenjualanID']; ?>">Edit</a> |
 <a class="hapus" href="hapuspenjualan.php?PenjualanID=<?php echo $data['PenjualanID']; ?>">Hapus</a> 
    </td>
   
   
 <tr>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
 <a class="edit" href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
 <a class="hapus" href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a> 
    </tr>
   
  </table>
 
 <?php } ?>

 </td>
 </tr>
 </table>
</body></center>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>