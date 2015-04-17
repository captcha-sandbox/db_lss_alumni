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
  <div id="w">
    
    <form action="" method="get" style="margin-bottom:20px">
      <div class="row">
      <div class="col-lg-6">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." name="nama">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Go!</button>
          </span>
        </div><!-- /input-group -->
      </div><!-- /.col-lg-6 -->
      </div><!-- /.row -->
    </form>

    <?php require ('sql_connect.inc');
    sql_connect('db_lss_alumni');

    //be sure to validate and clean your variables
    $nama = "";
    $panggilan = "-";
    $jurusan = "-";
    $angkatan = "-";
    $alamat1 = "-";
    $alamat2 = "-";
    $telp1 = "-";
    $telp2 = "-";
    $email = "-";
    if(isset($_GET['nama'])){

      $val1 = htmlentities($_GET['nama']);
      $query = "SELECT * FROM alumni WHERE nama_lengkap LIKE '".$val1."%'";

      if($val1!=null) {
        $r = mysql_query($query) or die($r."<br/><br/>".mysql_error());
        if (mysql_num_rows($r)==0) {
          $nama = "Data not found";
          $panggilan = "-";
          $jurusan = "-";
          $angkatan = "-";
          $alamat1 = "-";
          $alamat2 = "-";
          $telp1 = "-";
          $telp2 = "-";
          $email = "-";
        }
        else {
          while ($baris = mysql_fetch_assoc($r)) {
            
              $id = $baris['id_alumni'];
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
        }
      }
    }  
    ?>

    <div id="content" class="clearfix">
      <div id="userphoto"><img src="images/avatar.png" alt="default avatar"></div>
      <h1><?php echo $nama; ?></h1>

      <nav id="profiletabs">
        <ul class="clearfix">
          <li><a href="#bio" class="sel">Bio</a></li>
          <li><a href="#settings">Settings</a></li>
        </ul>
      </nav>
      
      <section id="bio">
      <p class="setting">Panggilan: <?php echo $panggilan; ?></p>
      <p class="setting">Jurusan  : <?php echo $jurusan; ?></p>
      <p class="setting">Angkatan : <?php echo $angkatan; ?></p>  
      </section>
            
      <section id="settings" class="hidden">
        <p><a href="edit_alumni.php?id=<?php echo $id; ?>">Edit detail info</a></p>
        
        <p class="setting"><span>Alamat Tetap <img src="images/edit.png" alt="*Edit*"></span><?php echo $alamat1; ?></p>
        
        <p class="setting"><span>Alamat Bandung <img src="images/edit.png" alt="*Edit*"></span><?php echo $alamat2; ?></p>
        
        <p class="setting"><span>No Telepon <img src="images/edit.png" alt="*Edit*"></span><?php echo $telp1; ?></p>
        
        <p class="setting"><span>No Telepon Lain <img src="images/edit.png" alt="*Edit*"></span><?php echo $telp2; ?></p>
        
        <p class="setting"><span>Email <img src="images/edit.png" alt="*Edit*"></span><?php echo $email; ?></p>

      </section>
      <?php
        mysql_close();
      ?>
    </div><!-- @end #content -->

    <h2>Tambahkan data baru</h2> 
    <form role="form" method="post" action="tambah_alumni.php">
      <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" required>
      </div>
      <div class="form-group">
        <label for="nama_panggilan">Panggilan</label>
        <input type="text" class="form-control" name="nama_panggilan" id="nama_panggilan">
      </div>
      <div class="form-group">
        <label for="jurusan">Jurusan</label>
        <input type="text" class="form-control" name="jurusan" id="jurusan" required>
      </div>
      <div class="form-group">
        <label for="angkatan">Angkatan</label>
        <input type="text" class="form-control" name="angkatan" id="angkatan" required>
      </div>
      <div class="form-group">
        <label for="alamat_tetap">Alamat Tetap</label>
        <input type="text" class="form-control" name="alamat_tetap" id="alamat_tetap" required>
      </div>
      <div class="form-group">
        <label for="alamat_bandung">Alamat Bandung</label>
        <input type="text" class="form-control" name="alamat_bandung" id="alamat_bandung">
      </div>
      <div class="form-group">
        <label for="no_tlp">No Telepon</label>
        <input type="text" class="form-control" name="no_telp" id="no_telp" required>
      </div>
      <div class="form-group">
        <label for="no_tlp_lain">No Alternatif</label>
        <input type="text" class="form-control" name="no_telp_lain" id="no_telp_lain">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" id="email">
      </div>
      <div class="form-group">
        <input type="submit" name="submit" value="Tambah Baru" class="submit-button">
      </div>
    </form>
  </div><!-- @end #w -->

<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>  
<script type="text/javascript">
$(function(){
  $('#profiletabs ul li a').on('click', function(e){
    e.preventDefault();
    var newcontent = $(this).attr('href');
    
    $('#profiletabs ul li a').removeClass('sel');
    $(this).addClass('sel');
    
    $('#content section').each(function(){
      if(!$(this).hasClass('hidden')) { $(this).addClass('hidden'); }
    });
    
    $(newcontent).removeClass('hidden');
  });
});
</script>
</body>
</html>