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
	<title>DjProx</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@1,100&display=swap" rel="stylesheet"> 
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
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
    		<h3>Tambah Data Produk</h3>
    		<div class="box">
    			<form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="kategori" required>
                        <option value="">--Pilih--</option>
                        <?php 
                             $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                             while($r = mysqli_fetch_array($kategori)){ 
                        ?>
                        <option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                    <input type="text" name="harga" class="input-control" placeholder="Harga" required><br>
                    <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea>
                    <select class="input-control" name="status">
                        <option value="">--Pilih--</option>
                        <option value="1">Aktif</option>
                        <option value="0">Non-Aktif</option>
                    </select>
                    <input type="file" name="gambar" class="input-control"  required>
                    <input type="submit" name="submit" value="submit" class="btn">
                </form>
                 <?php 
                     if(isset($_POST['submit'])){

                        $kategori   = $_POST['kategori'];
                        $nama       = $_POST['nama'];
                        $harga      = $_POST['harga'];
                        $deskripsi  = $_POST['deskripsi'];
                        $status     = $_POST['status'];
                        
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];

                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];

                        $newname = 'produk'.time().'.'.$type2;

                        $tipe_diizinkan = array('jpeg','jpg',  'png', 'gif', 'tiff', 'psd', 'pdf', 'eps', 'al', 'indd', 'raw');

                        if(!in_array($type2, $tipe_diizinkan)){

                            echo '<script>alert("Format file tidak diizinkan")</script';
                        }else{
                           move_uploaded_file($tmp_name, './Produk/'.$newname);

                           $insert = mysqli_query($conn, "INSERT INTO tb_produk VALUES (
                            null,
                            '".$kategori."',
                            '".$nama."',
                            '".$harga."',
                            '".$deskripsi."',
                            '".$newname."',
                            '".$status."',
                            null
                            ) ");

                         if($insert){
                            echo '<script>alert("Tambah Produk Berhasil")</script>';
                            echo '<script>window.location="data-produk.php"</script>';
                        }else{
                            echo 'gagal' .mysqli_error($conn);
                        }

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
    <script>
            CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>