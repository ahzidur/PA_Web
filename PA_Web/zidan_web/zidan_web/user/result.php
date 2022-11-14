<?php
    if(!isset($_POST['elektronik'])) {
        ?>
            <script type="text/javascript">
                window.location = "index.php#aboutme";
            </script>   
        <?php  
    }
?>





<?php
        require('..\koneksi.php');
        if(isset($_POST['elektronik'])){
            $nama = $_POST['name'];
            $telepon =  $_POST['phone'];
            $alamat =  $_POST['address'];
            $barang =  $_POST['item'];
            $jumlah =  $_POST['jumlah'];
            date_default_timezone_set("Asia/Makassar");
            $date = date("Y-m-d");

            $sql = "SELECT * FROM barang WHERE nama = '$barang'";
            $query = mysqli_query($conn, $sql);
            $barang2 = mysqli_fetch_array($query);
            $id_barang = $barang2['id'];
            $harga     = $barang2['harga'];

            
            $total  =  $harga * $jumlah;



            $sql = "INSERT INTO pesanan (nama, telepon, alamat, tanggal_beli, barang_id,jumlah) VALUES(
                '".$nama."', 
                '".$telepon."', 
                '".$alamat."', 
                '".$date."',
                '".$id_barang."',
                '".$jumlah."'
            )";
            $query = mysqli_query($conn, $sql);
        }
        // $result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
    ?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Elektronik</title>
    <link rel="stylesheet" href="..\style.css">
    <link rel="stylesheet" href="..\responsiveP.css">
</head>
<body>
    <header class="result">
        <div class="Heads">
            <span class="header-kiri">
              <h1 onclick="document.location.href = 'index.php'">Ahzidur</h1>
            </span>   
    
            <div id="header-kanan">
                <a href="#aboutme" class="headK">Pesan</a>
                <button onclick="darkmode()" class="headK" class = "modes">
                  Mode
                </button>
              </div>
        </div>
    </header>

    <div class="result-container">
        <h3>Berikut adalah detail pesanan anda.</h3>
        <div class="bills">
            <div class="bills-text">
                <p>Nama: </p><p> <?php echo $nama ?></p>
            </div>
            <div class="bills-text">
                <p>Alamat: </p><p> <?php echo $alamat; ?></p>
            </div>
            <div class="bills-text">
                <p>Telepon: </p><p> <?php echo $telepon; ?></p>
            </div>
            <div class="bills-text">
                <p>Barang: </p><p> <?php echo $barang; ?></p>
            </div>
            <div class="bills-text">
                <p>Harga Satuan: </p><p> <?php echo $harga; ?></p>
            </div>
            <div class="bills-text">
                <p>Jumlah: </p><p> <?php echo $jumlah; ?></p>
            </div>
            <div class="bills-text">
                <p>Total: </p><p> <?php echo $total; ?></p>
            </div>

            <div class="bills-text">
                <p>Tanggal Pemesanan: </p>
                <!-- Penggunaan fungsi date -->
                <p><?php echo $date ?></p>
            </div>
            <a href="home.php" class="sumbit" onclick="alert('Pesanan anda diterima!')">Konfirmasi</a>
        </div>
    </div>
  
    <div class="footer-down">
        <h3 id="aboutme" style="margin: 0; padding-top: 10px;">About Me</h3>
        <p>Ahmad Zidan Maulidinnur</p>
        <p style="margin: 0; padding-bottom: 10px;">Copyright &copy 2022 All Rights Reserved</p>
    </div>

    <script>
        function btnClick() {
            document.location.href = "home.php";
        }
    </script>
    <script src="script.js"></script>
    <script src="jquery.js"></script>


</body>
</html>