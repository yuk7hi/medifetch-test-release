<?php
include 'db_create.php';
session_start();
$table = 'subscribe';

$medicine = $_SESSION['medicine'];
$tel = $_POST['telno'];
$_SESSION['telno']= $tel;

$query_table = " CREATE TABLE IF NOT EXISTS $table(
mName varchar(20),
telno int(10),
approve varchar(3),
PRIMARY KEY(mName,telno)
)";

$connect ->query($query_table);

$query_data_input = " INSERT INTO $table VALUES ('$medicine','$tel','NO') ";

$connect->query($query_data_input);

echo $tel." is Subsribed us sucessfuly  <p>You will be informed if your medicine is available.</p>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1 id="txtHint"></h1>
<button onclick="show();">Confirm</button>
<script>
function show() {
  var xhttp;

  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "pharma_responce.php", true);
  xhttp.send();   
}
</script>
</body>
</html>