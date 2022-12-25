<?php
require 'vendor/autoload.php';
require_once __DIR__."/html_tag_helpers.php";

    // inisialisasi namespace untuk query rdf
    \EasyRdf\RdfNamespace::set('owl', 'http://www.w3.org/2002/07/owl#');
    \EasyRdf\RdfNamespace::set('foaf', 'http://xmlns.com/foaf/0.1/');
    \EasyRdf\RdfNamespace::set('dbp', 'http://dbpedia.org/property/');
    \EasyRdf\RdfNamespace::set('dbo', 'http://dbpedia.org/ontology/');
    \EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
    \EasyRdf\RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
    \EasyRdf\RdfNamespace::set('hiperinflasi', 'http://example.org/schema/hiperinflasi');
    \EasyRdf\RdfNamespace::set('prov', 'http://www.w3.org/ns/prov#');
    \EasyRdf\RdfNamespace::set('gold', 'http://purl.org/linguistics/gold/');
    \EasyRdf\RdfNamespace::set('dct', 'http://purl.org/dc/terms/');
    \EasyRdf\RdfNamespace::setDefault('og');


$sparql_jena = new \EasyRdf\Sparql\Client('http://localhost:3030/sukarno/sparql');


// query 
$synopsis = 'select ?synopsis ?battles ?birthDate ?birthPlace ?office where{
   ?m rdfs:synopsis ?synopsis;
   dbp:battles ?battles;
   dbo:birthDate ?birthDate;
   dbo:birthPlace ?birthPlace;
   dbp:office ?office.} 
   LIMIT 1';

// $battles = 'SELECT ?battles WHERE{
//    ?m dbp:battles ?battles}
//    LIMIT 1';


// $sparql_query1 = 'select ?synopsis where{
//    ?m rdfs:synopsis ?synopsis}';

$sparql_query2 = 'select ?birthPlace  where{
   ?m dbo:birthPlace ?birthPlace}';
   

$sparql_query = 'select ?synopsis ?child1  where{
  ?m dbo:child1 ?child1;
     rdfs:synopsis ?synopsis}';

     $sparql_query = '
     SELECT DISTINCT *
     WHERE {?m foaf:name ?name;
               hiperinflasi:year1957 ?year1957;
               hiperinflasi:year1958 ?year1958;
               hiperinflasi:year1959 ?year1959;
               hiperinflasi:year1960 ?year1960;
               hiperinflasi:year1961 ?year1961;
               hiperinflasi:year1962 ?year1962;
               hiperinflasi:year1963 ?year1963;
               hiperinflasi:year1964 ?year1964;
               hiperinflasi:year1965 ?year1965;
               hiperinflasi:year1966 ?year1966. }';

  $result = $sparql_jena->query($sparql_query);
  $result1 = $sparql_jena->query($synopsis);
  $result2 = $sparql_jena->query($sparql_query2);
//   $result3 = $sparql_jena->query($battles);

//   foreach($result1 as $row){
                                       
//    echo $row -> synopsis;
//    echo '</b>';
//    echo '<br/>';
//    }

   // foreach($result2 as $row){
   //    echo $row -> birthPlace;
   //    // echo $row -> birthDate;
   // }

  
      // set sparql endpoint
      $sparql_endpoint = 'https://dbpedia.org/sparql';
      $sparql = new \EasyRdf\Sparql\Client($sparql_endpoint);
  

//   foreach($result as $row){
//     echo '<br>';
//     echo '<b>';
//    //  echo $row -> child1;
//     echo '</b>';
//     echo '<br/>';
//     echo '<b>';
//    //  echo $row -> synopsis;
//     echo '</b>';
//     echo '<br/>';
//     }

    $uri_rdf = 'http://localhost/Web_SEman/w.rdf';
    $data = \EasyRdf\Graph::newAndLoad($uri_rdf);
    $pe = $data->primaryTopic();

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>WS kel 2 - Sukarno</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesoeet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!-- maps -->
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
      <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
   </head>
   <body>
      
      <!-- banner section start -->
      <div class="banner_section layout_padding">
         <div class="container">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="banner_taital">
                              <h1 class="banner_taital"><?= $pe->get('foaf:name') ?></h1>
                              <p class="banner_text">
                                 <?php 
                                    foreach($result1 as $row){
                                       
                                        echo $row -> synopsis;
                                        echo '</br>';
                                        echo '</br> - ';
                                        echo $row -> battles;
                                        echo '</br> - ' ;
                                        echo $row -> office;
                                        echo '</br></br>';
                                        echo 'Birth date :    ';
                                        echo $row -> birthDate;
                                        echo '</br>';
                                        echo 'Birtrh Place :   ';
                                        echo $row -> birthPlace;
                                        }  
                                 ?>   
                              </p>
                           </div>
                           <!-- <div class="btn_main">
                              <div class="quote_bt active"><a href="#">Get A Quote</a></div>
                              <div class="contact_bt"><a href="#">Contact Us</a></div>
                           </div> -->
                        </div>
                        <div class="col-md-6">
                           <div>
                              <?php
                                 $doc = \EasyRdf\Graph::newAndLoad('https://dbpedia.org/page/Sukarno');
                                 if ($doc->image) {
                                 echo content_tag('img', null, array('src'=>$doc->image, 'class'=>'image'));
                                 }
                              ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
               <i class="fa fa-arrow-left" aria-hidden="true"></i>
               </a>
               <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
               <i class="fa fa-arrow-right" aria-hidden="true"></i>
               </a> -->
            </div>
         </div>
      </div>
      <!-- banner section end -->
      


            <!-- testimonial section start -->
            <div class="testimonial_section layout_padding">
         <div class="container">
            <h1 class="testimonial_taital">Sukarno Birthplace</h1>
            <div class="testimonial_section_2 " >
            <?php

$uri_rdf = 'http://localhost/Web_SEman/maps.rdf';
$data = \EasyRdf\Graph::newAndLoad($uri_rdf);//yg menghubungka ke rdf yg telah dibuat
$doc = $data->primaryTopic();//dipakai untuk jika ada titlle didbpedia untuk predikat sepertinya


?>
<!-- ukuran dari mapsnya ditampilan web -->
<div id="map" style="width: 700px; height: 300px"></div>
<script>
  //lokasi Museum Louvre. longitude dan longitude
  const map = L.map("map").setView(['<?= $doc->get('foaf:latitude') ?>', '<?= $doc->get('foaf:longitude') ?>'], 15);
                                                  //panggil longitude                   //panggil longitude
  const tiles = L.tileLayer(
    "https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    }
  ).addTo(map);

  const marker = L.marker(['<?= $doc->get('foaf:latitude') ?>', '<?= $doc->get('foaf:longitude') ?>'])
    .addTo(map)
    .bindPopup("<b>Ir. Soekarno</b><br />birthplace")
    .openPopup();

  const popup = L.popup()
    .setLatLng(['<?= $doc->get('foaf:latitude') ?>', '<?= $doc->get('foaf:longitude') ?>'])
    .setContent("Ir. Soekarno birthplace")
    .openOn(map);

  function onMapClick(e) {
    popup
      .setLatLng(e.latlng)
      .setContent(`You clicked the map at ${e.latlng.toString()}`)
      .openOn(map);
  }

  map.on("click", onMapClick);
</script>
<!-- <h4 style="color: black">sekilas tentang Ir. Soekarno</h4>
<table class="margina">
  <tbody>
    <tr>
      <th>name</th>
      <td><?= $doc->get('foaf:name') ?></td>
    </tr>
    <tr>
      <th>birthName</th>
      <td><?= $doc->get('foaf:birthName') ?></td>
    </tr>
    <tr>
      <th>birthDate</th>
      <td><?= $doc->get('foaf:birthDate') ?></td>
    </tr>
    <tr>
      <th>deathDate</th>
      <td><?= $doc->get('foaf:deathDate') ?></td>
    </tr>
    <tr>
      <th>birthPlace</th>
      <td><?= $doc->get('foaf:birthPlace') ?></td>
    </tr>
    <tr>
      <th>latitude</th>
      <td><?= $doc->get('foaf:latitude') ?></td>
    </tr>
    <tr>
      <th>longitude </th>
      <td><?= $doc->get('foaf:longitude') ?></td>
    </tr>

  </tbody>
</table> -->
            </div>
         </div>
      </div>


          <!-- choose section start -->

      
      <!-- Chart -->
      <div class="choose_section layout_padding">
         <div class="container">
            <h1 class="services_taital"><span style="color: #0c426e">Hyperinflation During Soekarno's Leadership(1945-1965)</span></h1>
            <div class="choose_section_2 layout_padding">
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      
      <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        <?php
        foreach ($result as $row) {
        ?>
        var data = google.visualization.arrayToDataTable([
          ['Year', 'price increases(%)(inflation)'],
          ["1957", <?= $row->year1957; ?>],
          ["1958", <?= $row->year1958; ?>],
          ["1959", <?= $row->year1959; ?>],
          ["1960", <?= $row->year1960; ?>],
          ["1961", <?= $row->year1961; ?>],
          ["1962", <?= $row->year1962; ?>],
          ["1963", <?= $row->year1963; ?>],
          ["1964", <?= $row->year1964; ?>],
          ["1965", <?= $row->year1965; ?>],
          ["1966", <?= $row->year1966; ?>],
        ]);
        <?php } ?>

        var options = {
          chart: {
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
</head>


    <div id="columnchart_material" style="width: 900px; height: 400px;"></div>
                     </div>
                     </div>
                  </div>
               </div>
            </div>

      <!-- choose section end -->

      <!-- team section start -->
      <div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">Our <span style="color: #0c426e">Team</span></h1>
            
               <div class="row">
                  <div class="col-md-4 padding_right_0">
                     <div class="services_box " style="color: aqua;">
                        <h4 class="express_text">Rizki Sahat Arapenta</h4>
                        <p class="lorem_text">211402030</p>
                        <div class="seemore_bt"><a href="#"></a></div>
                        <div><img src="" class="image_1"></div>
                     </div>
                  </div>
                  <div class="col-md-4 padding_right_0">
                     <div class="services_box " style="color: aqua;">
                        <h4 class="express_text">M. Hafizh Rayhan</h4>
                        <p class="lorem_text">211402033</p>
                        <div class="seemore_bt"><a href="#"></a></div>
                        <div><img src="" class="image_1"></div>
                     </div>
                  </div>
                  <div class="col-md-4 padding_0">
                     <div class="services_box">
                        <div><img src="" class="image_1"></div>
                        <h4 class="express_text">Rizqi Amelia</h4>
                        <p class="lorem_text">211402096</p>
                        <div class="seemore_bt"><a href="#"></a></div>
                     </div>
                  </div>
                  <div class="col-md-4 padding_left_0">
                     <div class="services_box">
                        <h4 class="express_text">Erli Gurning</h4>
                        <p class="lorem_text">211402123</p>
                        <div class="seemore_bt"><a href="#"></a></div>
                        <div><img src="" class="image_1"></div>
                     </div>
                  </div>
                  <div class="col-md-4 padding_right_0">
                     <div class="services_box " style="color: aqua;">
                        <h4 class="express_text">David Stephan Bangun</h4>
                        <p class="lorem_text">211402141</p>
                        <div class="seemore_bt"><a href="#"></a></div>
                        <div><img src="" class="image_1"></div>
                     </div>
                  </div>
                  <div class="col-md-4 padding_right_0">
                     <div class="services_box " style="color: aqua;">
                        <h4 class="express_text">Arnis Chairiah</h4>
                        <p class="lorem_text">211402144</p>
                        <div class="seemore_bt"><a href="#"></a></div>
                        <div><img src="" class="image_1"></div>
                     </div>
                  </div>
               </div>
            
            <div class=" layout_padding"></div>
            <div class=" layout_padding"></div>
         </div>
      </div>
      <!-- team section end -->

      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">Web Semantik - Kelompok 2</p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
            });
            
            $(".zoom").hover(function(){
            
            $(this).addClass('transition');
            }, function(){
            
            $(this).removeClass('transition');
            });
            });
            
      </script> 
      <script>
         function openNav() {
         document.getElementById("myNav").style.width = "100%";
         }
         
         function closeNav() {
         document.getElementById("myNav").style.width = "0%";
         }
      </script>   
   </body>
</html>