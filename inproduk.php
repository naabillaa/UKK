 
<?php
include 'config.php';
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit(); // Terminate script execution after the redirect
}
 
if (isset($_POST['submit'])) {
    
  $ProdukID = $_POST["ProdukID"];
  $NamaProduk = $_POST["NamaProduk"];
  $Harga = $_POST["Harga"];
  $Stok = $_POST["Stok"];
  



    $sqlPenjualan = "INSERT INTO produk (ProdukID, NamaProduk, Harga, Stok) VALUES ('$ProdukID', '$NamaProduk', '$Harga', '$Stok')";
    $conn->query($sqlPenjualan);
  
    // Get the last inserted ID
    // $lastID = $conn->insert_id;
  
    // Insert data into pengaduan table
    // $sqlDetail = "INSERT INTO detail_penjualan (ProdukID) VALUES ('$ProdukID')";
    // $conn->query($sqlDetail);

   // Redirect to a success page or do something else
  header("Location: dataProduk.php");
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
                <input type="number" placeholder="ID Produk" name="ProdukID" required>
            </div>
            <div class="input-group">
                <input type="Text" placeholder="Nama Produk.." name="NamaProduk" required>
            </div>
            <div class="input-group">
                <input type="number" placeholder="Harga.." name="Harga" required>
            </div>
            <div class="input-group">
                <input type="number" placeholder="Stok.." name="Stok" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Tambah</button>
            </div>
        </form>
    </div>
</body>
</html>