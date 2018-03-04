<?php
$table = 'pharmacy';

$query_table = " CREATE TABLE IF NOT EXISTS $table(
    pharmacyId integer(20) NOT NULL AUTO_INCREMENT,
    name varchar(20),
    address varchar(30),
    telNo integer(15),
    email varchar(50),
    pass varchar(15),
    ownername varchar(20),
    openHrs varchar(20),
    partnership varchar(5),
    glink varchar(200),
    l1 decimal(11,6),
    l2 decimal(11,6),
    cardnumber integer(16),
    type varchar(20),
    exp date,
    csc integer(3),
    PRIMARY KEY(pharmacyId)
)";

$connect ->query($query_table);
if($connect->query($query_table)) echo ("Pharmacy Table connected <hr>");
else echo ("Table connection faild <hr>");

?>
