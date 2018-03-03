<?php
$table = 'dealer';

$query_table = " CREATE TABLE IF NOT EXISTS $table(
    dealerId varchar(20) NOT NULL,
    name varchar(20),
    email varchar(30),
    telNo int,
    pass varchar(15),
    PRIMARY KEY(dealerId)
)";

//$connect ->query($query_table);
if($connect->query($query_table)) echo ("Table connected <hr>");
else echo ("Table connection faild <hr>");
?>