<?php

$fname = $_POST['fname'];
$lname = $_POST['lname'];

// Get first name and Last name from form

$host = 'localhost';
$user = 'root';
$pass = '';

$db = 'demodb1';

$table = 'user';

// Set DB connection data

$connect = mysqli_connect($host,$user,$pass,$db); // make connction

if ($connect) echo "DB connection success<br><hr>";
else "Connection error";

$insertq = "insert into $table values('$fname','$lname')";

$connect-> query($insertq); // pass the $insert query through $connection

$showf = "select * from $table";

$result = $connect -> query($showf); // set sql commands


// while($row  = mysqli_fetch_assoc($result)){
// print(" Full name : ".$row['fname']." ".$row['lname']."<br>");

// } // print data from DB

///////// Make a file put all the data to the txt file//////////

if (($file1 = fopen("./text1.txt","w"))) echo "File opened and created succesfully \n<hr>";
else echo "File handling error! ";

while($row  = mysqli_fetch_assoc($result)){
    $txt = "Full name : ".$row['fname']." ".$row['lname']."\n";
    fwrite($file1,$txt);
    print(" Full name : ".$row['fname']." ".$row['lname']."<br>");
    
    }


fclose($file1);
 
$file2 = fopen("./text1.txt","r+");




while (!feof($file2)){
        $r = fgets($file2);
        echo ("<h2 style = 'color: red; background-color: black;'>$r</h2><br>");
    }





?>