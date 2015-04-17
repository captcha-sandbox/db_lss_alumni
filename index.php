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
  <link href="css/jquery-ui-1.9.2.custom.min.css" rel='stylesheet' type='text/css' />
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">

  <script type="text/javascript" src="js/bootstrap.min.js"></script> 
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <script>
    $(function(){
      $('#selectpicker').selectpicker({
        style: 'btn-info',
        size: 4
      });
    });
  </script>

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
    $val1 = htmlentities($_GET['nama']);
    $query = "SELECT * FROM alumni WHERE nama_lengkap LIKE '".$val1."%'";

    if($val1!=null) {
      $r = mysql_query($query) or die($r."<br/><br/>".mysql_error());
      if (mysql_num_rows($r)==0) {
        $nama = "Data not found";
      }
      else {
        while ($baris = mysql_fetch_assoc($r)) {
          
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
        <p>Edit detail info:</p>
        
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
    <form role="form">
      <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama_lengkap">
      </div>
      <div class="form-group">
        <label for="nama_panggilan">Panggilan</label>
        <input type="text" class="form-control" id="nama_panggilan">
      </div>
      <div class="form-group">
        <label for="jurusan">Jurusan</label>
        <input type="text" class="form-control" id="jurusan">
      </div>
      <div class="form-group">
        <label for="angkatan">Angkatan</label>
        <input type="text" class="form-control" id="nama_panggilan">
      </div>
      <div class="form-group">
        <label for="alamat_tetap">Alamat Tetap</label>
        <input type="text" class="form-control" id="alamat_tetap">
      </div>
      <div class="form-group">
        <label for="alamat_bandung">Alamat Bandung</label>
        <input type="text" class="form-control" id="alamat_bandung">
      </div>
      <div class="form-group">
        <label for="no_tlp">No Telepon</label>
        <input type="text" class="form-control" id="no_tlp">
      </div>
      <div class="form-group">
        <label for="no_tlp_lain">No Alternatif</label>
        <input type="text" class="form-control" id="no_tlp_lain">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email">
      </div>

  </div><!-- @end #w -->
 
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
});
</body>
</html>