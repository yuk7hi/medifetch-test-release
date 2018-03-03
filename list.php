<?php
include 'db_create.php';

$query_get_med = "SELECT brandName as w FROM regdrug 
UNION
SELECT  genericName as w FROM regdrug`
";
$ab = $connect->query($query_get_med);

$q = $_REQUEST["q"];
$hint = "";

while($abc  = mysqli_fetch_assoc($ab)){
    $a[]=$abc['w'];
}
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            $hint = $name;
            $qw = "\"".$name."\"";
            echo("<li><a onmouseout='setsearch(".$qw.")'>".$name."</a></li>");
        }
    }
}

?>