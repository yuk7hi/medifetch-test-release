<?php
include 'SQL connect.php';

$name = $_POST['fName'];
$email = $_POST['email'];
$tel = $_POST['telNo'];
$upassword = $_POST['pass'] ;

$query_db = "CREATE DATABASE IF NOT EXISTS $dbname";

//$connect->query($query_db);

if($connect->query($query_db)) echo ("Database connected <hr>");
else echo ("Database connection faild <hr>");

mysqli_select_db($connect,$dbname);

$query_table = " CREATE TABLE IF NOT EXISTS $table(
    name varchar(20),
    email varchar(30),
    telNo int,
    pass varchar(15),
    PRIMARY KEY(telNo)
)";

//$connect ->query($query_table);
if($connect->query($query_table)) echo ("Table connected <hr>");
else echo ("Table connection faild <hr>");

$query_data_input = " INSERT INTO $table VALUES ('$name','$email','$tel','$upassword') ";

//$connect->query($query_data_input);
if($connect->query($query_data_input)) echo ("Sign in succesful <hr>");
else echo ("Tel no is already registered <hr>");

$connect -> close();
?>