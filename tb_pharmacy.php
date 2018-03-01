<?php
$table = 'pharmacy';

$query_table = " CREATE TABLE IF NOT EXISTS $table(
    pharmacyId varchar(20) NOT NULL,
    name varchar(20),
    address varchar(30),
    telNo int,
    pass varchar(15),
    openHrs varchar(20),
    partnership varchar(5),
    glink varchar(200),
    PRIMARY KEY(pharmacyId)
)";

//$connect ->query($query_table);
if($connect->query($query_table)) echo ("Table connected <hr>");
else echo ("Table connection faild <hr>");

?>