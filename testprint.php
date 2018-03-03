<!DOCTYPE html>
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
            div.container {
            width: 100%;
            margin-left:0px;
        }

        nav.details {
            border: 3px solid gray;
            overflow: scroll;
            float: left;
            max-width: 360px;
            margin-top: 20px;
            padding: 1em;
            height:650px;
            padding-bottom:30px;
        }

        article {
            padding: 1em;
            overflow: hidden;
            
        }
        #map {
            height:650px;
            width: 100%;
            color:black;
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
                <li class="nav-item">
                    <a class="nav-link" href="#">Your Search Results</a>
                </li>                   
                </li>
                
            </ul>
        </div>
    </nav>
    <div id="section1" class="container-fluid bg-success" style="padding-bottom:70px">
    <div class="container">           
        <nav class="details">  
        <?php
            $dname=$_POST["drug"];
            $distance=$_POST["distance"];
            function getData($dname){
                include 'db_create.php';
                $showf = "
                (SELECT DISTINCT P.name ,P.address,P.glink, P.telNo, P.openHrs,P.l1,P.l2,R.brandName,R.genericName, R.price
                FROM pharmacy P, regdrug R, pharmacy_dealer PD, rdrug_dealer RD
                WHERE P.pharmacyId=PD.pharmacyId AND PD.dealerId=RD.dealerId
                AND RD.brandName=R.brandName AND R.brandName LIKE '$dname%')
                UNION(
                SELECT DISTINCT P.name ,P.address,P.glink, P.telNo, P.openHrs,P.l1,P.l2,R.brandName,R.genericName, R.price
                FROM pharmacy P, regdrug R, pharmacy_dealer PD, rdrug_dealer RD
                WHERE P.pharmacyId=PD.pharmacyId AND PD.dealerId=RD.dealerId
                AND RD.brandName=R.brandName AND R.genericName LIKE'$dname%')";

                $result = $connect -> query($showf); // set sql commands
                //echo($result);
                
                if($result!==NULL){
                    while($row  = mysqli_fetch_assoc($result)){
                        print("<p style='font-size:large'>
                        Name &nbsp&nbsp&nbsp&nbsp:&nbsp".$row['name']."<br>
                        Address :&nbsp <a style='color:red' href = '#' onclick = 'initMap2(".$row['l1'].",".$row['l2'].")'> ".$row['address']." </a><br>
                        TelNo &nbsp&nbsp&nbsp:&nbsp ".$row['telNo']."<br>
                        Open&nbsp &nbsp&nbsp&nbsp:&nbsp ".$row['openHrs']."<br>
                        Brand &nbsp&nbsp&nbsp:&nbsp ".$row['brandName']."<br>
                        Genere &nbsp:&nbsp ".$row['genericName']."<br>
                        Price &nbsp&nbsp&nbsp&nbsp:&nbsp ".$row['price']."<br>");
                        echo "<br/><hr/><br/>";
                    }   // print data from DB
                }else{
                    $fulllist= "SELECT brandName,genericName
                                FROM regdrug";
                    $result1 = $connect -> query($fulllist);
                    while($row  = mysqli_fetch_assoc($result1)){
                        print("Brand &nbsp&nbsp&nbsp:&nbsp ".$row['brandName']."<br>
                        Genere &nbsp:&nbsp ".$row['genericName']."<br>");
                    }
                }              
            }
            getData($dname);
        ?> 
        </nav>
    </div>
    <article>
        <div id="map"></div>

        <script src="js/map.js"></script>
        <!-- loading the API key for the map, and calling back on the map initialization function -->
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpPgNC2KPMLWt0S2efRYRyyilrHyu6aSo&callback=initMap">
        </script>
    </article>
    </div>
</body>
</html>

