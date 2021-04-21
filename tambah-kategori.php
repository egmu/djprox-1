<?php 
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, inital-scale=1">
    <title>Login | DjProx</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@1,100&display=swap" rel="stylesheet"> 
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
          <h1><a href="dashboard.php">DjProx</a></h1>
          <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="profil.php">Profiles</a></li>
            <li><a href="data-kategori.php">Data Kategori</a></li>
            <li><a href="data-produk.php">Data Produk</a></li>
            <li><a href="k.php">Keluar</a></li>
          </ul>
        </div>
    </header>

    <!--conten-->
    <div class="section">
        <div class="container">
            <h3>Tambah Data Kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required>
                    <input type="submit" name="submit" value="submit" class="btn">
                </form>
                 <?php 
                     if(isset($_POST['nama'])){
 
                            $nama = ucwords($_POST['nama']);

                            $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES(
                                                 0,
                                                 '".$nama."')");
                        if($insert){
                            echo '<script>alert("Tambah Kategori Berhasil")</script>';
                            echo '<script>window.location="data-kategori.php"</script>';
                        }else{
                            echo 'gagal' .mysqli_error($conn);
                        }
                    }
                 ?>

            </div>
        </div>
    </div>


    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2020 - DjProx | Online Store</small>
        </div>
    </footer>
</body>
</html>