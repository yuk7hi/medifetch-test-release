<?php
$table = 'dealer';

$query_table = " CREATE TABLE IF NOT EXISTS $table(
    dealerId integer(20) NOT NULL AUTO_INCREMENT,
    name varchar(20),
    address varchar(50),
    telNo int(15),
    email varchar(30),
    pass varchar(15),
    cardnumber integer(16),
    type varchar(16),
    exp date,
    csc integer(3),
    PRIMARY KEY(dealerId)
)";

$connect ->query($query_table);
if($connect->query($query_table)) echo ("Dealer Table connected <hr>");
else echo ("Table connection faild <hr>");
?>
