<?php
$host = 'localhost';
$sqluser = 'root';
$sqlpass = '';
$dbname= 'db_medifetch';

$connect = mysqli_connect($host,$sqluser,$sqlpass);

if ($connect) //echo("SQL connceted <hr>");
//else echo("SQL connection faild <hr>");

$query_db = "CREATE DATABASE IF NOT EXISTS $dbname";
//$connect->query($query_db);

if($connect->query($query_db)) //echo ("Database connected <hr>");
//else echo ("Database connection faild <hr>");

mysqli_select_db($connect,$dbname);
?>