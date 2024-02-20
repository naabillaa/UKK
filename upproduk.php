<?php 
 
include 'config.php';
$ProdukID = $_POST['ProdukID'];
$NamaProduk = $_POST['NamaProduk'];
$Harga = $_POST['Harga'];
$Stok = $_POST['Stok'];
 

$mysql_query = "UPDATE produk SET NamaProduk='$NamaProduk', Harga='$Harga', Stok='$Stok' WHERE ProdukID='$ProdukID'";
$conn->query($mysql_query);

// Redirect to a success page or do something else
header("Location: dataproduk.php");
exit();
?>