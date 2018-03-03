<?php
$query_regDrug = "CREATE TABLE IF NOT EXISTS regDrug(
    brandName varchar(30),
    genericName varchar(30),
    price float(8,2),
    PRIMARY KEY(brandName)
)";

if($connect->query($query_regDrug)) echo ("BG TB 1 created <hr>");
else echo ("BG TB 1 created error <hr>");

$query_regDrug = "CREATE TABLE IF NOT EXISTS unregDrug(
    brandName varchar(30),
    genericName varchar(30),
    PRIMARY KEY(brandName)
)";

if($connect->query($query_regDrug)) echo ("BG TB 2 created <hr>");
else echo ("BG TB 2 created error <hr>");

$query_regDrug="CREATE TABLE IF NOT EXISTS rDrug_Dealer(
    brandName varchar(30),
    dealerId varchar(20),
    PRIMARY KEY(brandName,dealerId),
    FOREIGN KEY(brandName) REFERENCES regDrug(brandName) ,
    FOREIGN KEY(dealerId) REFERENCES dealer(dealerId)
)";

if($connect->query($query_regDrug)) echo ("BG TB 3 created <hr>");
else echo ("BG TB 3 created error <hr>");

$query_regDrug="CREATE TABLE IF NOT EXISTS pharmacy_dealer(
    pharmacyId varchar(20),
    dealerId varchar(20),
    PRIMARY KEY(pharmacyId,dealerId),
    FOREIGN KEY (pharmacyId) REFERENCES pharmacy(pharmacyId),
    FOREIGN KEY (dealerId) REFERENCES dealer(dealerId)
)";

if($connect->query($query_regDrug)) echo ("BG TB 4 created <hr>");
else echo ("BG TB 4 created error <hr>");
?>