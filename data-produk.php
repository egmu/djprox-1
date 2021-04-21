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

    <!-- conten -->
    <div class="section">
    	<div class="container">
    		<h3>Produk</h3>
    		<div class="box">
          <p><a href="tambah-prodak.php">Tambah Data</a></p>
    		     	<table border="1" cellspacing="0" class="table">
                   <thead>
                       <tr>
                           <th width="50px">No</th>
                           <th>Kategori</th>
                           <th>Nama Produk</th>
                           <th>Harga</th>
                           <th>Deskripsi</th>
                           <th>Gambar</th>
                           <th>Status</th>
                           <th width="150px">Aksi</th>
                       </tr>
                   </thead>
                   <?php  
                        $no = 1;
                        $produk = mysqli_query($conn, "SELECT * FROM tb_produk LEFT JOIN tb_category USING (category_id) ORDER BY produk_id DESC");
                        if(mysqli_num_rows($produk) > 0){
                        while($row = mysqli_fetch_array($produk)){
                   ?>
                   <tbody>
                       <tr>
                           <td><?php echo $no++ ?></td>
                           <td><?php echo $row['category_name'] ?></td>
                           <td><?php echo $row['produk_name'] ?></td>
                           <td>Rp. <?php echo number_format($row['produk_price']) ?></td>
                           <td><?php echo $row['produk_deskription'] ?></td>
                           <td><img src="produk/<?php echo $row['produk_image'] ?>" width="50px"></td>
                           <td><?php echo ($row['produk_status'] == 0)? 'Tidak Aktif':'Aktif'?></td>
                           <td>
                               <a href="proses-hapus.php?idp=<?php echo $row['produk_id'] ?>" onclick="return confirm('Yakin hapus ?')">Hapus</a>
                           </td>
                           <?php }}else{ ?>
                                <tr>
                                  <td colspan="8">Tidak ada data</td>
                                </tr>
                           <?php } ?>
                       </tr>
                   </tbody>         
                </table>
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