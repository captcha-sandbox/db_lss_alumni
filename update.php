<?php  
    header("Location: index.php?"); 
    require ('sql_connect.inc');
    sql_connect('db_lss_alumni');


    $id = $_GET['id'];
    $nama = $_POST['nama_lengkap'];
    $panggilan = $_POST['nama_panggilan'];
    $jurusan = $_POST['jurusan'];
    $angkatan = $_POST['angkatan'];
    $alamat1 = $_POST['alamat_tetap'];
    $alamat2 = $_POST['alamat_bandung'];
    $telp1 = $_POST['no_telp'];
    $telp2 = $_POST['no_telp_lain'];
    $email = $_POST['email'];
    //echo $judul;
    $query = "UPDATE alumni SET nama_lengkap='" . $nama . "', nama_panggilan='".$panggilan."', jurusan='".$jurusan."', angkatan='".$angkatan."', alamat_tetap='".$alamat1."', alamat_bandung='".$alamat2."', no_telp='".$telp1."', no_telp_lain='".$telp2."', email='".$email."' WHERE id_alumni=" . $id;
    mysql_query($query);
?>