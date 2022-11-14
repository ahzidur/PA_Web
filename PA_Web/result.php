<?php
    if(!isset($_POST['elektronik'])) {
        ?>
            <script type="text/javascript">
                window.location = "index.php#aboutme";
            </script>   
        <?php  
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
    <header class="result">
        <div class="Heads">
            <span class="header-kiri">
              <h1>Ahzidur</h1>
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
                <p>Nama: </p><p> <?php echo $_POST['name']; ?></p>
            </div>
            <div class="bills-text">
                <p>Telepon: </p><p> <?php echo $_POST['phone']; ?></p>
            </div>
            <div class="bills-text">
                <p>Barang: </p><p> <?php echo $_POST['item']; ?></p>
            </div>
            <div class="bills-text">
                <p>Address: </p><p> <?php echo $_POST['address']; ?></p>
            </div>
            <a href="index.php" class="sumbit" onclick="alert('Pesanan anda diterima!')">Konfirmasi</a>
        </div>
    </div>
  
    <div class="footer-down">
        <h3 id="aboutme" style="margin: 0; padding-top: 10px;">About Me</h3>
        <p>Ahmad Zidan Maulidinnur</p>
        <p style="margin: 0; padding-bottom: 10px;">Copyright &copy 2022 All Rights Reserved</p>
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