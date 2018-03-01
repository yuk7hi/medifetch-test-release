<?php
include 'db_create.php';
include 'tb_dealer.php';
include 'tb_pharmacy.php';

$name = $_POST['fName'];
$email = $_POST['email'];
$tel = $_POST['telNo'];
$user_name = $_POST['username'];
$upassword = $_POST['pass'] ;

$query_data_input = " INSERT INTO $table VALUES ('$user_name','$name','$email','$tel','$upassword') ";

//$connect->query($query_data_input);
if($connect->query($query_data_input)) echo ("Sign in succesful <hr>");
else echo ("Username is already exists! <hr>");

include 'tb_other.php';

$connect -> close();
?>