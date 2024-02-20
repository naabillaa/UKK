<html>
    <head>
        <title>Cara Menampilkan Data Berdasarkan Dropdown Select PHP MySQLi</title>
    </head>
    <body>
        <h3>Menampilkan Data Berdasarkan Dropdown Select Ke Daftar Tabel</h3>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET">
            <p>Select list:</p>
            <select name="unit_kerja" style="width:160px;">
                <?php
                include "koneksi.php";
                //query menampilkan nama unit kerja ke dalam combobox
                $query    =mysqli_query($conn, "SELECT * FROM tb_pegawai GROUP BY unit_kerja ORDER BY unit_kerja");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <option value="<?=$data['unit_kerja'];?>"><?php echo $data['unit_kerja'];?></option>
                <?php
                }
                ?>
            </select>
            <input type="submit" value="Pilih">
            <a href="./">Refresh</a>
        </form>
        
        <table border="1" cellpadding="2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Unit Kerja</th>
                    <th>Gol</th>
                    <th>Pangkat</th>
                    <th>Jabatan</th>
                </tr>
            </thead>
            <?php
            if (isset($_GET['unit_kerja'])) {
                $unit_kerja=trim($_GET['unit_kerja']);
                
                //menampilkan pegawai berdasarkan unit kerja yang dipilih pada combobox
                $tamPeg=mysqli_query($conn, "SELECT * FROM tb_pegawai WHERE unit_kerja='$unit_kerja' ORDER BY gol DESC");
            
                $no=0;
                while ($tpeg = mysqli_fetch_array($tamPeg)) {
                $no++;
                ?>
            <tbody>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $tpeg['nip'];?></td>
                    <td><?php echo $tpeg['nama'];?></td>
                    <td><?php echo $tpeg['unit_kerja'];?></td>
                    <td><?php echo $tpeg['gol'];?></td>
                    <td><?php echo $tpeg['pangkat'];?></td>
                    <td><?php echo $tpeg['jabatan'];?></td>
                </tr>
            </tbody>
            <?php
                }
            }
            ?>
        </table>
    </body>
</html>