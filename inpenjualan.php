 
<?php
include 'config.php';
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit(); // Terminate script execution after the redirect
}
 
if (isset($_POST['submit'])) {
    
  $PenjualanID = $_POST["PenjualanID"];
  $TanggalPenjualan = $_POST["TanggalPenjualan"];
  $TotalHarga = $_POST["TotalHarga"];



    $sqlPenjualan = "INSERT INTO Penjualan (PenjualanID, TanggalPenjualan, TotalHarga) VALUES ('$PenjualanID', '$TanggalPenjualan', '$TotalHarga')";
    $conn->query($sqlPenjualan);
  
    // Get the last inserted ID
    // $lastID = $conn->insert_id;
  
    // Insert data into pengaduan table
    $sqlDetail = "INSERT INTO detail_penjualan (PenjualanID) VALUES ('$PenjualanID')";
    $conn->query($sqlDetail);

   // Redirect to a success page or do something else
  header("Location: datapenjualan.php");
  exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Niagahoster Tutorial</title>
</head>
<body>
<div class="pos-f-t">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
      <h4 class="text-white">Collapsed content</h4>
      <span class="text-muted">Toggleable via the navbar brand.</span>
    </div>
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div>
    <div class="container">
        <form action="" method="POST" class="">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Tambah Penjualan</p>
            <div class="input-group">
                <input type="number" placeholder="ID Penjualan" name="PenjualanID" required>
            </div>
            <div class="input-group">
                <input type="date" placeholder="Tanggal Penjualan" name="TanggalPenjualan" required>
            </div>
            <div class="input-group">
                <input type="number" placeholder="Total harga.." name="TotalHarga" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Tambah</button>
            </div>
        </form>
    </div>
</body>
</html>