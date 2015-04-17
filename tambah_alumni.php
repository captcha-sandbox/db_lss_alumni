<?php
	//connect database
	require ('sql_connect.inc');
    sql_connect('db_lss_alumni');

	$namaLengkap = htmlspecialchars($_POST['nama_lengkap']);
	$namaPanggilan = htmlspecialchars($_POST['nama_panggilan']);
	$jurusan = htmlspecialchars($_POST['jurusan']);
	$angkatan = htmlspecialchars($_POST['angkatan']);
	$alamatTetap = htmlspecialchars($_POST['alamat_tetap']);
	$alamatBandung = htmlspecialchars($_POST['alamat_bandung']);
	$noTelp = htmlspecialchars($_POST['no_telp']);
	$noTelpLain = htmlspecialchars($_POST['no_telp_lain']);
	$email = htmlspecialchars($_POST['email']);

	$query="INSERT INTO alumni (nama_lengkap, nama_panggilan, jurusan, 
		angkatan, alamat_tetap, alamat_bandung, no_telp, no_telp_lain, email)
		VALUES ('$namaLengkap','$namaPanggilan', '$jurusan', '$angkatan', 
		'$alamatTetap', '$alamatBandung','$noTelp','$noTelpLain','$email')";
	//run query
	if (!mysql_query($query)) {
	   die('Error: ' . mysql_error());
	}

	mysql_close();
	header('Location: index.php');
?>