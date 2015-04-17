<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>User Profile with Content Tabs - Design Shack Demo</title>
  <meta name="author" content="Jake Rocheleau">

  <link rel="shortcut icon" href="http://designshack.net/favicon.ico">
  <link rel="icon" href="http://designshack.net/favicon.ico">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">

</head>

<body>  
  <div id="w">
    
    <form action="" method="get"
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
        <p>Various content snippets courtesy of <a href="http://bluthipsum.com/">Bluth Ipsum</a>.</p>
        
        <p>Can't a guy call his mother pretty without it seeming strange? Amen. I think that's one of Mom's little fibs, you know, like I'll sacrifice anything for my children.</p>
        
        <p>She's always got to wedge herself in the middle of us so that she can control everything. Yeah. Mom's awesome. I run a pretty tight ship around here. With a pool table.</p>
      </section>
            
      <section id="settings" class="hidden">
        <p>Edit your user settings:</p>
        
        <p class="setting"><span>E-mail Address <img src="images/edit.png" alt="*Edit*"></span> lolno@gmail.com</p>
        
        <p class="setting"><span>Language <img src="images/edit.png" alt="*Edit*"></span> English(US)</p>
        
        <p class="setting"><span>Profile Status <img src="images/edit.png" alt="*Edit*"></span> Public</p>
        
        <p class="setting"><span>Update Frequency <img src="images/edit.png" alt="*Edit*"></span> Weekly</p>
        
        <p class="setting"><span>Connected Accounts <img src="images/edit.png" alt="*Edit*"></span> None</p>
      </section>
      <?php
        mysql_close();
      ?>
    </div><!-- @end #content -->
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