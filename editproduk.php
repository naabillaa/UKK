<?php 
include 'config.php';
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit(); // Terminate script execution after the redirect
}
  
  $ProdukID = $_GET['ProdukID'];
  
  $query = "SELECT * FROM produk WHERE ProdukID = $ProdukID ";

  $result = mysqli_query($conn, $query);

  $row = mysqli_fetch_array($result);

  ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Siswa</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT Produk
            </div>
            <div class="card-body">
              <form action="upproduk.php" method="POST">
                
                <div class="form-group">
                  <label>Nama Produk</label>
                  <input type="text" name="NamaProduk" value="<?php echo $row['NamaProduk'] ?>" placeholder=" Nama Produk " class="form-control”>
                  <input type="hidden" name="ProdukID" value="<?php echo $row['ProdukID'] ?>">
                </div>

                <div class="form-group">
                  <label>Harga</label>
                  <input type="number" name="Harga" value="<?php echo $row['Harga'] ?>" placeholder="harga" class="form-control">
                </div>

                <div class="form-group">
                  <label>Stok</label>
                  <input type="number" name="Stok" value="<?php echo $row['Stok'] ?>" placeholder="Stok" class="form-control">
                </div>
                
                <button type="submit" class="btn btn-success">UPDATE</button>
                <button type="reset" class="btn btn-warning">RESET</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>