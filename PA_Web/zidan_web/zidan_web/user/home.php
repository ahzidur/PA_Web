<?php

session_start();
if (!isset($_SESSION['user'])) {
  header("Location: ..\login.php");
}




  $NAMA = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMMIN - Toko Elektronik</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../responsiveP.css">
</head>
<body>
    <header>
      <div class="Heads">
        <span class="header-kiri">
          <h1 onclick="document.location.href = 'home.php'"> Ahzidur</h1>
        </span>
  
        <div id="header-kanan">
          <a href="..\pesanan.php" class="headK">Daftar Pesanan</a>
          <a href="#aboutme" class="headK">Pesan</a>
          <button onclick="darkmode()" class="headK" class = "modes">Mode</button>
          <a href="logout.php" class="headK">logout </a>
        </div>
      </div>
    </header>

    <div class="konten-barang">
      <div class="content1" align="center">
        <h1 id="judul">Toko Elektronik AZM</h1>
        <h1 id="judul">Selamat Datang  <?=$NAMA ?> </h1>
      </div>


      <div class="konten-gambar">
      <?php
        require('../koneksi.php');

        $read = mysqli_query($conn, "SELECT * FROM barang");
        if(mysqli_num_rows($read) > 0){
            while($row = mysqli_fetch_array($read)){
          ?>
            <div class="responsive" align="center">
              <div class="gallery">
                <div class="desc"><?php echo $row['nama'] ?> - <b>Rp.<?php echo $row['harga'] ?></b></div>
                <img src="../assets/barang/<?php echo $row['gambar'] ?>" alt="<?php echo $row['nama'] ?>">
              </div>
            </div>
          <?php
            }
          }
      ?>
      </div>
    </div>

    <div align="center">
      <button class="button" id="btn">Tampilkan Deskripsi</button>
    </div>
    <p id="det" style="display: none">
      Toko elektronik merupakan toko yang menyediakan berbagai macam alat elektronik.
      Baik itu yang memiliki fungsi sebagai perabotan dapur, perabotan rumah tangga atau pun lainnya.
      Seperti yang Anda ketahui bahwa harga barang elektronik pasti cenderung mahal.
    </p>
  
    <div class="form-container">
      <h3>Pesan Sekarang!</h3>
      <p>isi formulir dibawah ini</p>
      <form method="POST" name="elektronik" action="result.php">
        <div class="input">
          <label for="">Nama</label>
          <input type="text" name="name" id="" required>
        </div>
        <div class="input">
          <label for="">Telepon</label>
          <input type="number" name="phone" id="" required>
        </div>

        <div class="input">
          <label for="">Barang</label>
          <select name="item">
            <?php
              $query = mysqli_query($conn, "SELECT * FROM barang");
              if(mysqli_num_rows($query) > 0) {
                while($barang = mysqli_fetch_array($query)) {
                ?>
                  <option value="<?php echo $barang['nama'] ?>"><?php echo $barang['nama'] ?></option>
                <?php
                }
              }
            ?>
          </select>
        </div>

        <div class="input">
          <label for="">Jumlah</label>
          <input type="number" name="jumlah" id="" required>
        </div>





        <div class="input">
          <label for="">Alamat</label>
          <textarea name="address" required></textarea>
        </div>
        <button class="sumbit" name="elektronik" onclick="btnClick()">Submit!</button>
      </form>
    </div>
  
    <div class="footer-down">
      <h3 id="aboutme" style="margin: 0; padding-top: 10px;">About Me</h3>
      <p>Ahmad Zidan Maulidinnur</p>
      <p style="margin: 0; padding-bottom: 10px;">Copyright &copy 2022 All Rights Reserved</p>
    </div>

<script>
    function btnClick() {
        document.location.href = "../result.php";
    }
</script>
<script src="script.js"></script>
<script src="jquery.js"></script>
</body>
</html>