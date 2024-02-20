 
<?php
include 'config.php';
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit(); // Terminate script execution after the redirect
}
 
if (isset($_POST['submit'])) {
    
  $DetailID = $_POST["DetailID"];
  $PenjualanID = $_POST["PenjualanID"];
  $ProdukID = $_POST["ProdukID"];
  $JumlahProduk = $_POST["JumlahProduk"];
  $PenjualanID= $_POST["PenjualanID"];
  $TanggalPenjualan = $_POST["TanggalPenjualan"];



  $sqlDetail = "INSERT INTO detail_penjualan (DetailID,PenjualanID,ProdukID,JumlahProduk) VALUES ('$DetailID,$PenjualanID,$ProdukID,$JumlahProduk')";
  $conn->query($sqlDetail);

  // Get the last inserted ID
  $lastID = $conn->insert_id;

  // Insert data into pengaduan table
  $sqlPenjualan = "INSERT INTO  penjualan (PenjualanID, TanggalPenjualan) VALUES ('$PenjualanID', '$TanggalPenjualan')";
  $conn->query($sqlPenjualan);

  // Close the database connection
  $conn->close();

  // Redirect to a success page or do something else
  header("Location: datadetail.php");
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
    <div class="container">
        <form action="" method="POST" class="">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Tambah Penjualan</p>
            <div class="input-group">
                <input type="number" placeholder="Detail ID" name="DetailID" required>
            </div>
            <div class="input-group">
                <input type="number" placeholder="ID Penjualan" name="PenjualanID" required>
            </div>
            <div class="input-group">
                <input type="number" placeholder="ID Produk" name="ProdukID" required>
            </div>
            <div class="input-group">
                <input type="number" placeholder="Jumlah Produk" name="JumlahProduk" required>
            </div>
            <div class="input-group">
                <input type="Date" placeholder="Tanggal Pnjualan" name="TanggalPenjualan" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Tambah</button>
            </div>
        </form>
    </div>
</body>
</html>