<?php
   
include 'db.php'; 
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_addess FROM tb_admin WHERE admin_id = 2");
$a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, inital-scale=1">
	<title>Store | DjProx</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@1,100&display=swap" rel="stylesheet"> 
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
		  <h1><a href="index.php">DjProx</a></h1>
          <ul>
			<li><a href="produk.php">Produk</a></li>
		  </ul>
		</div>
	</header>

    <div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <?php
                     $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                     if(mysqli_num_rows($kategori) > 0){
                        while($k = mysqli_fetch_array($kategori)){
                ?>
                <a href="produk.php?kat=<?php echo $k['category_id'] ?>">
               <div class="col-5">
                    <img src="img/kategori-1.png" width="50px" style="margin-bottom: 5px;">
                    <p><?php echo $k['category_name'] ?></p>
               </div>
               </a>
           <?php }}else{ ?>
            <p>Kategori tidak ada</p>
        <?php } ?>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <h3>New Produk</h3>
            <div class="box">
                <?php
                     $produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE produk_status = 1 ORDER BY produk_id DESC LIMIT 8");
                     if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){
                ?>
                <a href="detail-produk.php?id=<?php echo $p['produk_id'] ?>">
                    <div class="col-4">
                       <img style="width: 40%;" src="produk/<?php echo $p['produk_image'] ?>">
                       <p class="nama"><?php echo substr($p['produk_name'], 0, 30) ?></p>
                    <p class="harga">Rp. <?php echo number_format($p['produk_price']) ?></p>
                    </div>
                </a>
                <?php }}else{ ?>
                      <p>Produk ti dak ada</p>
                <?php } ?>
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