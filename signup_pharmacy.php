<?php
include 'db_create.php';
include 'tb_pharmacy.php';
include 'tb_dealer.php';

$name = $_POST['fName'];
$address = $_POST['address'];
$tel = $_POST['telNo'];
$hours = $_POST['opHours'];
$user_name = $_POST['username'];
$upassword = $_POST['pass'] ;
$partnership = $_POST['membership'];

$query_data_input = " INSERT INTO $table VALUES ('$user_name','$name','$address','$tel','$upassword','$hours','$partnership') ";

//$connect->query($query_data_input);
if($connect->query($query_data_input)) echo ("Sign in succesful <hr>");
else echo ("Username is already exists! <hr>");

include 'tb_other.php';
$connect -> close();
?>