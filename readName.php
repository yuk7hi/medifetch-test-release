<!DOCTYPE html>
<html>
<head>
<title>Medifetch</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="login-register.js" type="text/javascript"></script>
    <link href="login-register.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    
</head>
<body>
    
</body>
</html>
<?php
require_once("suggestlist_DB_Connect.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT brandName FROM regdrug WHERE brandName like '" . $_POST["keyword"] . "%'";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul class="list-group" id="country-list">
<?php
foreach($result as $country) {
?>
<li class="list-group-item" onClick="selectName('<?php echo $country["brandName"]; ?>');"><?php echo $country["brandName"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>