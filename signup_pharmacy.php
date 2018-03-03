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
        include 'db_create.php';
        include 'tb_dealer.php';
        include 'tb_pharmacy.php';
        
        $pharmacyname = $_POST['pharmacyname'];
        $address = $_POST['address'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $ohrs = $_POST['ohrs'];
        $ownername = $_POST['ownername'] ;
        $pship = $_POST['pship'];
        $gmaplink = $_POST['gmaplink'];
        $longitude = $_POST['longitude'];
        $latitude = $_POST['latitude'];
        $cardnumber = $_POST['cardnumber'];
        $pwd = $_POST['pwd'];
        $type = $_POST['type'];
        $exp = $_POST['exp'];
        $csc = $_POST['csc'];
        echo("You will recive Email confirmation from Medifetch Team. . .");
        $query_data_input = " INSERT INTO $table (name,address,telNo,email,pass,ownername,openHrs,partnership,glink,l1,l2,cardnumber,type,exp,csc) 
                                VALUES ('$pharmacyname','$address','$telephone','$email','$ohrs','$ownername','$pship',
                                '$gmaplink','$longitude','$latitude',
                                '$cardnumber','$pwd','$type','$exp','$csc') ";

        //$connect->query($query_data_input);
        if($connect->query($query_data_input)) echo ("Sign in succesful <hr>");
        else echo ("Username is already exists! <hr>");

        include 'tb_other.php';
        $connect -> close();
    ?>
    </nav>
    </body>
</html>

