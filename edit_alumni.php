<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Database Alumni - LSS ITB</title>
  <meta name="author" content="Jake Rocheleau">

  <link rel="shortcut icon" href="http://designshack.net/favicon.ico">
  <link rel="icon" href="http://designshack.net/favicon.ico">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">

</head>

<body>
  <?php
    require ('sql_connect.inc');
    sql_connect('db_lss_alumni');

    $id = $_GET['id'];
    $query = "SELECT * FROM alumni WHERE id_alumni=$id";

    $r = mysql_query($query) or die($r."<br/><br/>".mysql_error());
    while ($baris = mysql_fetch_array($r, MYSQL_ASSOC)) {
        $nama = $baris['nama_lengkap'];
        $panggilan = $baris['nama_panggilan'];
        $jurusan = $baris['jurusan'];
        $angkatan = $baris['angkatan'];
        $alamat1 = $baris['alamat_tetap'];
        $alamat2 = $baris['alamat_bandung'];
        $telp1 = $baris['no_telp'];
        $telp2 = $baris['no_telp_lain'];
        $email = $baris['email'];
    }
  ?>    
  <div id="w">

    <h2>Edit Data Alumni</h2> 
    <form role="form" method="post" action="update.php?id=<?php echo $id; ?>">
      <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?php echo $nama; ?>" required>
      </div>
      <div class="form-group">
        <label for="nama_panggilan">Panggilan</label>
        <input type="text" class="form-control" name="nama_panggilan" value="<?php echo $panggilan; ?>" id="nama_panggilan">
      </div>
      <div class="form-group">
        <label for="jurusan">Jurusan</label>
        <input type="text" class="form-control" name="jurusan" id="jurusan" value="<?php echo $jurusan; ?>" required>
      </div>
      <div class="form-group">
        <label for="angkatan">Angkatan</label>
        <input type="text" class="form-control" name="angkatan" id="angkatan" value="<?php echo $angkatan; ?>" required>
      </div>
      <div class="form-group">
        <label for="alamat_tetap">Alamat Tetap</label>
        <input type="text" class="form-control" name="alamat_tetap" id="alamat_tetap" value="<?php echo $alamat1; ?>" required>
      </div>
      <div class="form-group">
        <label for="alamat_bandung">Alamat Bandung</label>
        <input type="text" class="form-control" name="alamat_bandung" id="alamat_bandung" value="<?php echo $alamat2 ?>">
      </div>
      <div class="form-group">
        <label for="no_tlp">No Telepon</label>
        <input type="text" class="form-control" name="no_telp" id="no_telp"  value="<?php echo $telp1; ?>"required>
      </div>
      <div class="form-group">
        <label for="no_tlp_lain">No Alternatif</label>
        <input type="text" class="form-control" name="no_telp_lain" id="no_telp_lain" value="<?php echo $telp2; ?>">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
      </div>
      <div class="form-group">
        <input type="submit" name="submit" value="Perbarui data" class="submit-button">
      </div>
    </form>
  </div><!-- @end #w -->

<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>  

</body>
</html>