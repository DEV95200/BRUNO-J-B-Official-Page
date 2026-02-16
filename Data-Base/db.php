<?php
$host = 'mysql-bruno-jean-baptiste.alwaysdata.net';
$db   = 'bruno-jean-baptiste_p2p-admin';
$user = '383868';
$pass = 'MRJSM@95200';

$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
?>

