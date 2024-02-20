<?php 
include 'config.php';
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit(); // Terminate script execution after the redirect
}

$ProdukID = $_GET['ProdukID'];
$sqlPenjualan = "DELETE FROM detail_penjualan WHERE ProdukID='$ProdukID'";
$conn->query($sqlPenjualan);
  

header("Location: datadetail.php");
exit();

?>

