<?php 
include 'config.php';
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit(); // Terminate script execution after the redirect
}

$PenjualanID = $_GET['PenjualanID'];
$sqlPenjualan = "DELETE FROM penjualan WHERE PenjualanID='$PenjualanID'";
$conn->query($sqlPenjualan);
  

header("Location: datapenjualan.php");
exit();

?>

