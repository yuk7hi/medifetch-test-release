<!DOCTYPE html>
<html>
<head>
    <style>
       
        div.container {
            width: 100%;
            
        }

        header, footer {
            padding: 1em;
            color: white;
            background-color: #C0C0C0;
            clear: left;
            text-align: center;
        }

        nav.details {
            overflow: scroll;
            float: left;
            max-width: 360px;
            margin: 0;
            padding: 1em;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }
        
        nav ul a {
            text-decoration: none;
        }

        article {
            margin-left: 170px;
            border-left: 1px solid gray;
            padding: 1em;
            overflow: hidden;
        }
        #map {
            height: 600px;
            width: 100%;
        }
    </style>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--link rel="stylesheet" type="text/css" media="screen" href="map.css" /-->
    <!--script src="map.js"></script-->
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
                Address :&nbsp <a style='color:red' href = ".$row['glink']."> ".$row['address']." </a><br>
                TelNo &nbsp&nbsp&nbsp:&nbsp ".$row['telNo']."<br>
                Open&nbsp &nbsp&nbsp&nbsp:&nbsp ".$row['openHrs']."<br>
                Brand &nbsp&nbsp&nbsp:&nbsp ".$row['brandName']."<br>
                Genere &nbsp:&nbsp ".$row['genericName']."<br>
                Price &nbsp&nbsp&nbsp&nbsp:&nbsp ".$row['price']."<br>
                Long &nbsp&nbsp&nbsp&nbsp:&nbsp ".$row['l1']."<br>
                Lati &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp ".$row['l2']."<br>");
                echo "<br/><hr/><br/>";
            }   // print data from DB
        }
        getData($dname);
        ?> 
    </nav>
        <article>
        <div id="map"></div>
        <!-- loading the API key for the map, and calling back on the map initialization function -->
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpPgNC2KPMLWt0S2efRYRyyilrHyu6aSo&callback=initMap">
        </script>
        <script>
            function initMap() {
                //example map pin
                var harcourts = {lat: 6.851422, lng: 79.865049};

                //assign the Google maps object on the html doc where ID = map
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 16,
                    center: harcourts
                });

                //set up a marker on the example map pin
                var marker = new google.maps.Marker({
                    position: harcourts,
                    map: map,
                    icon: 'pharmacy.png'
                });
            }
        </script>
        </article>

    <footer>Copyright &copy; Z_Crew</footer>
    </div>

</body>
</html>

