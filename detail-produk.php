<?php
error_reporting(0);
include 'db.php'; 
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_addess FROM tb_admin WHERE admin_id = 2");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE produk_id = '".$_GET['id']."' ");
$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, inital-scale=1">
	<title>Produk | DjProx</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@1,100&display=swap" rel="stylesheet"> 
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
		  <h1><a href="index.php">DjProx</a></h1>
          <ul>
			<li><a href="dashboard.php">Produk</a></li>
		  </ul>
		</div>
	</header>

    <div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                <input class="btn" type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

    <div class="section">
      <div class="container">
        Detail Produk
        <div class="box">
          <div class="col-2">
            <img style="
  border: 2px solid #e74c3c;
  border-radius: 0.6em;
  ;" src="produk/<?php echo $p->produk_image ?>"width="30%">
          </div>
  0        <div class="col-2">
            <h3><?php echo $p->produk_name ?></h3>
            <h4>Rp. <?php echo number_format($p->produk_price) ?></h4>
            <p>Deskripsi :<br>
              <?php echo $p->produk_deskription ?>
            </p>
            <input class="btn" type="submit" name="Order" value="Order Sekarang">
            </p>
          </div>
        </div>
      </div>
    </div>


    <div class="footer">
        <div class="container">
            <h4>Alamat</h4>
            <p><?php echo $a->admin_addess ?></p>

             <h4>Hp</h4>
            <p><?php echo $a->admin_email ?></p>

             <h4>Email</h4>
            <p><?php echo $a->admin_telp ?></p>
            <small>Copyright &copy; 2020 - Djprox.</small>
        </div>
    </div>
</body>
</html>