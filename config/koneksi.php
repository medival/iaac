<?php

$host="localhost";
$user="root";
$password="";
$db="db_xampp";
// $dbport="3306";

$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon){
	  die("Koneksi gagal:".mysqli_connect_error());
}
?>