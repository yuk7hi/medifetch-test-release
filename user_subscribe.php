<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <script src="js/map.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="login-register.js" type="text/javascript"></script>
    <link href="login-register.css" rel="stylesheet" />
    <style>
        body {           
            font-family: 'Ubuntu Condensed', sans-serif;
        }
        #main_image{
            padding-top:10%;
            padding-bottom: 10%;
        }
        #section1 {height:700px;color: #fff; background-image: url("background.jpeg"); background-size: cover;}
        
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="nevbar-brand"><img src="brand_tag.png" height="25" width="25"></a>
        <div class="collapse navbar-collapse" id="collapse_target">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="medUI2.html">
                        Medifetch
                    </a>
                </li>                              
            </ul>
        </div>
    </nav>
    <div id="section1" class="container-fluid bg-success" style="padding-bottom:70px">
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
        <h1 id="txtHint"></h1>
        <button class="btn btn-info" onclick="show();">Confirm</button>
        <button class="btn btn-info"><a style="color:white;" href="testprint.php">Back</a></button>
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


    </div>
</body>
</html>
