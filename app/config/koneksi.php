<?php

$host=$_ENV["MYSQL_HOST"];
$user=$_ENV["MYSQL_USER"];
$password=$_ENV["MYSQL_PASSWORD"];
$db=$_ENV["MYSQL_DATABASE"];

$kon = new mysqli($host, $user, $password, $db);
if (!$kon) {
    die("Koneksi gagal:".mysqli_connect_error());
}
