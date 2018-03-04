<html>
    <head>
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
        <title>MediFetch</title>
        <style>
        body {
            position: relative;
            font-family: 'Ubuntu Condensed', sans-serif;
        }
        #main_image{
            padding-top:10%;
            padding-bottom: 10%;
        }
        .signup{
            text-decoration:none;
        }
        #section1 {padding-top:50px;height:100vh;color: #fff; background-image: url("background.jpeg"); background-size: cover;}
        
    </style>
    </head>
    <body>
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
    <div id="section1" class="container-fluid bg-success" style="padding-top:70px;padding-bottom:70px">
    <?php
        $host = 'localhost';
        $user = 'root';
        $pass = '';

        $db = 'db_medifetch';

        $connect = mysqli_connect($host,$user,$pass,$db);

        $n =$_POST['name'];
        $p=$_POST['pass'];

        $q = "SELECT D.pass FROM dealer D
            WHERE  D.name = '$n'
            UNION 
            SELECT P.pass FROM pharmacy P
            WHERE  P.name = '$n'";

        $re = mysqli_query($connect,$q);

        $r = mysqli_fetch_assoc($re);

        if (($p == $r['pass'] )){
            $data1="SELECT P.pharmacyId,P.name,P.address,P.glink,P.telNo,P.email,P.openHrs,P.pass,P.ownername,P.partnership,P.cardnumber,P.type,P.exp,P.csc 
                    FROM pharmacy P WHERE P.name='$n'";
            $result1 = $connect -> query($data1);
            while($row  = mysqli_fetch_assoc($result1)){
                print("<p style='font-size:large'>
                ID &nbsp&nbsp&nbsp:&nbsp".$row['pharmacyId']."<br>
                Name &nbsp&nbsp&nbsp:&nbsp".$row['name']."<br>                
                Address :&nbsp".$row['address']."<br>
                TelNo &nbsp&nbsp&nbsp:&nbsp ".$row['telNo']."<br>
                Email &nbsp&nbsp&nbsp:&nbsp ".$row['email']."<br>
                Open&nbsp &nbsp&nbsp&nbsp:&nbsp ".$row['openHrs']."<br>
                Password &nbsp&nbsp&nbsp:&nbsp".$row['pass']."<br>
                Owner &nbsp&nbsp&nbsp:&nbsp".$row['ownername']."<br>
                Partnership &nbsp&nbsp&nbsp:&nbsp".$row['partnership']."<br>
                Card No &nbsp&nbsp&nbsp:&nbsp".$row['cardnumber']."<br>
                Type &nbsp&nbsp&nbsp:&nbsp".$row['type']."<br>
                Exp &nbsp&nbsp&nbsp:&nbsp".$row['exp']."<br>
                CSC &nbsp&nbsp&nbsp:&nbsp".$row['csc']."<br>");
                echo "<br/><hr/><br/>";
            }
            $data2="SELECT D.dealerId, D.name,D.address,D.telNo,D.email,D.cardnumber,D.type,D.exp,D.csc 
                    FROM dealer D WHERE D.name='$n'";
            $result2 = $connect -> query($data2);
            while($row  = mysqli_fetch_assoc($result2)){
                
                print("<p style='font-size:large'>
                Name &nbsp&nbsp&nbsp:&nbsp".$row['name']."<br>
                Address  &nbsp&nbsp&nbsp:&nbsp".$row['address']."<br>
                TelNo &nbsp&nbsp&nbsp:&nbsp ".$row['telNo']."<br>
                Email &nbsp&nbsp&nbsp:&nbsp ".$row['email']."<br>
                Password &nbsp&nbsp&nbsp:&nbsp".$row['pass']."<br>
                Card No &nbsp&nbsp&nbsp:&nbsp".$row['cardnumber']."<br>
                Type &nbsp&nbsp&nbsp:&nbsp".$row['type']."<br>
                Exp &nbsp&nbsp&nbsp:&nbsp".$row['exp']."<br>
                CSC &nbsp&nbsp&nbsp:&nbsp".$row['csc']."<br>");
                echo "<br/><hr/><br/>";
            }
            
        }
        else {echo "Login failed";
        echo("\n Username or Password is invalid <a href = './medUI2.html'>Click here</a> to go home ");
        }
    ?>
    </nav>
    </body>
</html>



