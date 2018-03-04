<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="css/map.css">
    <script src="js/map.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <h1>Pharmacies</h1>
        </header>    
        <nav class="details">  
        <?php

            $dname=$_POST["drug"];
            function getData($dname){
                include 'db_create.php';
                $showf = "
                (SELECT DISTINCT P.name ,P.address,P.glink, P.telNo, P.openHrs,P.l1,P.l2,R.brandName,R.genericName, R.price
                FROM pharmacy P, regdrug R, pharmacy_dealer PD, rdrug_dealer RD
                WHERE P.pharmacyId=PD.pharmacyId AND PD.dealerId=RD.dealerId
                AND RD.brandName=R.brandName AND R.brandName='$dname')
                UNION(
                SELECT DISTINCT P.name ,P.address,P.glink, P.telNo, P.openHrs,P.l1,P.l2,R.brandName,R.genericName, R.price
                FROM pharmacy P, regdrug R, pharmacy_dealer PD, rdrug_dealer RD
                WHERE P.pharmacyId=PD.pharmacyId AND PD.dealerId=RD.dealerId
                AND RD.brandName=R.brandName AND R.genericName='$dname')";

                $result = $connect -> query($showf); // set sql commands

                while($row  = mysqli_fetch_assoc($result)){
                    print("<p style='font-size:large'>
                    Name &nbsp&nbsp&nbsp&nbsp:&nbsp".$row['name']."<br>
                    Address :&nbsp <a style='color:red' href = '#' onclick = 'initMap2(".$row['l1'].",".$row['l2'].")'> ".$row['address']." </a><br>
                    TelNo &nbsp&nbsp&nbsp:&nbsp ".$row['telNo']."<br>
                    Open&nbsp &nbsp&nbsp&nbsp:&nbsp ".$row['openHrs']."<br>
                    Brand &nbsp&nbsp&nbsp:&nbsp ".$row['brandName']."<br>
                    Generet &nbsp:&nbsp ".$row['genericName']."<br>
                    Price &nbsp&nbsp&nbsp&nbsp:&nbsp ".$row['price']."<br>
                    Long &nbsp&nbsp&nbsp&nbsp:&nbsp ".$row['l1']."<br>
                    Lati &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp ".$row['l2']."<br>");
                    echo "<br/><hr/><br/>";
                }   // print data from DB
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

    <footer>Copyright &copy; Z_Crew</footer>

</body>
</html>

