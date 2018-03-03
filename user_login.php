<?php

$host = 'localhost';
$user = 'root';
$pass = '';

$db = 'db_medifetch';

$connect = mysqli_connect($host,$user,$pass,$db);

$n =$_POST['name'];
$p=$_POST['pass'];

$q = "SELECT pass FROM dealer
    WHERE  dealerId = '$n'
    UNION 
    SELECT pass FROM pharmacy
    WHERE  pharmacyId = '$n'";

$re = mysqli_query($connect,$q);

$r = mysqli_fetch_assoc($re);

if (($p == $r['pass'] )) echo "Logged in";
else {echo "Login failed";
echo("\n Username or Password is invalid <a href = './medUI2.html'>Click here</a> to go home ");
}

?>