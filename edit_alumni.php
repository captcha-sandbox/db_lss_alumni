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

  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script> 
  <script type="text/javascript" src="js/bootstrap.min.js"></script> 
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
          <label for="jurusan">Jurusan</label><br/>
          <div class="btn-group btn-input clearfix">
            <button type="button" class="btn btn-default dropdown-toggle form-control" data-toggle="dropdown">
              <span data-bind="label"><?php echo $jurusan; ?></span>&nbsp;<span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" id="prodi">
       <?php
        $q_jurusan = "SELECT nama_jurusan FROM jurusan";
        $r = mysql_query($q_jurusan) or die($r."<br/><br/>".mysql_error());
        while ($baris = mysql_fetch_assoc($r)) {
          $prodi = $baris['nama_jurusan'];
      ?>        
              <li><a href="#"><?php echo $prodi; ?></a></li>
      <?php }?>        
            </ul>
          </div>  
      </div>
      <input type="hidden" id="jurusan" name="jurusan" value="<?php echo $jurusan; ?>">

      <div class="form-group">
          <label for="angkatan">Angkatan</label><br/>
          <div class="btn-group btn-input clearfix">
            <button type="button" class="btn btn-default dropdown-toggle form-control" data-toggle="dropdown">
              <span data-bind="label"><?php echo $angkatan; ?></span>&nbsp;<span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" id="tahun">
       <?php
        $q_angkatan = "SELECT angkatan FROM tahun";
        $r = mysql_query($q_angkatan) or die($r."<br/><br/>".mysql_error());
        while ($baris = mysql_fetch_assoc($r)) {
          $tahun = $baris['angkatan'];
      ?>        
              <li><a href="#"><?php echo $tahun; ?></a></li>
      <?php }?>        
            </ul>
          </div>  
      </div>
      <input type="hidden" id="angkatan" name="angkatan" value="<?php echo $angkatan; ?>">

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
        <input type="submit" name="submit" value="Perbarui data" class="btn btn-primary">
      </div>
    </form>
  </div><!-- @end #w -->
  <?php
    mysql_close();
  ?>
<script type="text/javascript">
  $(document.body).on('click', '#tahun li', function(event) {
      var $target = $(event.currentTarget);

      $target.closest('.btn-group').find('[data-bind="label"]').text($target.text()).end().children('.dropdown-toggle').dropdown('toggle');
      $('#angkatan').val($target.text());
      return false;
    });

  $(document.body).on('click', '#prodi li', function(event) {
      var $target = $(event.currentTarget);

      $target.closest('.btn-group').find('[data-bind="label"]').text($target.text()).end().children('.dropdown-toggle').dropdown('toggle');
      $('#jurusan').val($target.text());
      return false;
    });
</script>
</body>
</html>