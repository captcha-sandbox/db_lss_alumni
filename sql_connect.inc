<?php
function sql_connect($database) {
	$connection = mysql_connect('localhost','root','');
		if(!$connection) {
			die("Database Connection Failed: ".mysql_error());
		}
	mysql_select_db($database);
}
?>