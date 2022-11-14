<?php
session_start();
if (isset($_SESSION['admin'])) {
  header("Location: admin\home.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Elektronik</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsiveP.css">
</head>
<body>
    <header>
      <div class="Heads">
        <span class="header-kiri">
          <h1 onclick="document.location.href = 'index.php'">Ahzidur</h1>
        </span>
  
        <div id="header-kanan">
          <a href="pesanan.php" class="headK">Daftar Pesanan</a>
          <a href="#aboutme" class="headK">Pesan</a>
          <button onclick="darkmode()" class="headK" class = "modes">Mode</button>
          <?php
            $user = 'login';
          ?>
          <a href="login.php" class="headK">
            <?php echo $user ?>
          </a>
        </div>
      </div>
    </header>
    <div class="konten-barang">
      <br><br><br><br><br><br><br>


      <div class="konten-gambar">
      <?php
        require('koneksi.php');

        $read = mysqli_query($conn, "SELECT * FROM barang");
        if(mysqli_num_rows($read) > 0){
            while($row = mysqli_fetch_array($read)){
          ?>
            <div class="responsive" align="center">
              <div class="gallery">
                <div class="desc"><?php echo $row['nama'] ?> - <b>Rp.<?php echo $row['harga'] ?></b></div>
                <img src="assets/barang/<?php echo $row['gambar'] ?>" alt="<?php echo $row['nama'] ?>">
              </div>
            </div>
          <?php
            }
          }
      ?>
      </div>
    </div>
<script>
    function btnClick() {
        document.location.href = "result.php";
    }
</script>
<script src="script.js"></script>
<script src="jquery.js"></script>
</body>
</html>



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="landing.css">
    <title>Landing Page Design Using HTML & CSS</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="images/logo.png" class="logo">
            <nav>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Products</a></li>
                    <li><a href="">Community</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </nav>
            <button class="btn" id="btn1">Log In</button>
            <button class="btn" id="btn2">Sign Up</button>
        </div>
        <div class="content">
            <div class="text">
            <p>... Adalah Suatu Toko Online Dengan Barang yang Lengkap. <br>Selalu ada diskon setiap pekan nya<br>Jika anda adalah pecinta perabot, disini adalah tempat yang cocok!!
            </p>
            <button class="btn3">Buy Now</button>
           </div>
        <div class="pepsi">
        <img src="assets/barang/land.png" alt="" style="width:500px;height:220px;">
        </div>
       </div>
   </div>
   <script src="script.js"></script>
<script src="jquery.js"></script>
</body>
</html> -->