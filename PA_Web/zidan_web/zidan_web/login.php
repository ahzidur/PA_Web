<?php
    include('koneksi.php');
    error_reporting(0);

    session_start();

  
    if (isset($_SESSION['admin'])) {
        header("Location: admin\home.php");
    }

    if (isset($_SESSION['user'])) {
        header("Location: user\home.php");
    }
    
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $sqlAdmin = mysqli_query($conn, "SELECT username, password FROM admin WHERE username = '$username'"); //admin
        $sqlUserr = mysqli_query($conn, "SELECT username, password FROM user WHERE username = '$username'");  //user



        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
         
            $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

            $sqlAdmin = "SELECT username, password FROM admin WHERE username = '$username'"; //admin
            $resultAdmin = mysqli_query($conn, $sqlAdmin);

            $sqlUserr = "SELECT username, password FROM user WHERE username = '$username'";  //user
            $resultUserr= mysqli_query($conn, $sqlUserr);

 
            if ($resultAdmin->num_rows > 0) {
                $row = mysqli_fetch_assoc($resultAdmin);
                $pass =  $row['password'];
                if(password_verify($password,  $pass)) {

                    $_SESSION['username'] = $row['username'];
                    $_SESSION['admin'] = "TRUE";
                    header("Location:admin\home.php");
                }   
                else{echo "<script>alert('Password Anda salah. Silahkan coba lagi!')</script>";}

            } 

           else if ($resultUserr->num_rows > 0) {
                $row = mysqli_fetch_assoc($resultUserr);
                $pass =  $row['password'];
                if(password_verify($password,  $pass)) {

                    $_SESSION['username'] = $row['username'];
                    $_SESSION['user'] = "TRUE";
                    header("Location:user\home.php");
                }   
                else{
                    // echo "<script>alert('Password Anda salah. Silahkan coba lagi!')</script>";
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['user'] = "TRUE";
                    header("Location:user\home.php");}

            } 
            
            
            
            
            else {
                echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
            }
        }
         


    }







        // if(isset($_POST['submit'])) {
        //     $username = $_POST['username'];
        //     $password = $_POST['password'];
        //     $sqlAdmin = mysqli_query($conn, "SELECT username, password FROM admin WHERE username = '$username'"); //admin
        //     $sqlUserr = mysqli_query($conn, "SELECT username, password FROM user WHERE username = '$username'");  //user
        // if($hasil2->num_rows > 0) {//cek data user dahulu
        //     $row = mysqli_fetch_assoc($hasil2);
        //     $_SESSION['username'] = $row['username'];
        //     $_SESSION['id_user'] = $row['id_user'];
        //     $pass = $row['password'];
        //     if(password_verify($password,  $pass)) {
        //         echo"<script>
        //             alert('Anda Berhasil Login user !!');
        //         </script>";

        //         header('location:user\home.php');
        //         exit;
        //     } else {
        //             // echo"<script>
        //             //     alert('Password anda salah!');
        //             // </script>";
        //             header('location:user\home.php');
        //     }
        // }

        // else if($hasil->num_rows > 0) {//data admin
        //     $row = mysqli_fetch_assoc($hasil);
        //     $_SESSION['username'] = $row['username'];
        //     $_SESSION['id'] = $row['id'];
        //     if(password_verify($password, $row['password'])) {
        //         echo"<script>
        //             alert('Anda Berhasil Login Admin !!');
        //         </script>";

        //         header('location:admin\home.php');
        //         exit;
        //     } else {
        //         echo"
        //             <script>
        //                 alert('Password anda salah!');
        //             </script>";
        //     }
    //     else {
    //             echo"<script>
    //                 alert('Akun tidak ditemukan!');
    //             </script>";
    //     }
    // } 
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

    <div class="form-container">
      <h3>Login</h3>
      <form method="POST">
        <div class="input">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="inputan" placeholder="Username" required>
        </div>
        <div class="input">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="inputan" placeholder="Password" required>
        </div>

        <button name="submit" type="submit">Login</button>
        <p>Belum punya akun? <a href="regis.php">daftar sekarang!</a></p>
      </form>
    </div>

</body>
</html>