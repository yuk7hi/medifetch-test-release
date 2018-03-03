<?php
session_start();
$telno = $_SESSION['telno'];
$medi = $_SESSION['medicine'];
$table = 'subscribe';
include 'db_create.php';

echo ("Telno : ".$telno." and Medicine : ".$medi." is approved");


$query_data_input = " UPDATE $table
                        SET approve = 'YES'
                        WHERE mName = '$medi' AND telno = '$telno' ";

$connect->query($query_data_input);
?>