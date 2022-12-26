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
  
      // set sparql endpoint
      $sparql_endpoint = 'https://dbpedia.org/sparql';
      $sparql = new \EasyRdf\Sparql\Client($sparql_endpoint);


    $uri_rdf = 'http://localhost/Web_SEman/w.rdf';
    $data = \EasyRdf\Graph::newAndLoad($uri_rdf);
    $pe = $data->primaryTopic();

?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Soekarno, 01, 02, ​Hyperinflation During Soekarno&amp;apos;s Leadership(1945-1965), Gallery, Our Teams, Responsive Pricing Table, $ 30, $ 60, INTUITIVE">
    <meta name="description" content="">
    <title>Kelompok 2 - WS</title>
    <link rel="stylesheet" href="Site1/nicepage.css" media="screen">
<link rel="stylesheet" href="Site1/Home.css" media="screen">
    <script class="u-script" type="text/javascript" src="Site1/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="Site1/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 5.2.0, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/default-logo.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">
  </head>
  <body data-home-page="Home.html" data-home-page-title="Home" class="u-body u-xl-mode" data-lang="en">
    <!-- <header class="u-clearfix u-header u-header" id="sec-f5af"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <a href="https://nicepage.com" class="u-image u-logo u-image-1">
          <img src="images/default-logo.png" class="u-logo-image u-logo-image-1">
        </a>
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Home.html" style="padding: 10px 20px;">Home</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="About.html" style="padding: 10px 20px;">About</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Contact.html" style="padding: 10px 20px;">Contact</a>
</li></ul>
          </div>
          <div class="u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.html">Home</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="About.html">About</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Contact.html">Contact</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header> -->
    <section class="u-clearfix u-palette-1-base u-section-1" id="carousel_6dc2">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-35 u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1">
                  <h2 class="u-custom-font u-font-merriweather u-text u-text-default u-text-1"><?= $pe->get('foaf:name') ?></h2>
                  <p class="u-align-justify u-custom-font u-font-montserrat u-text u-text-palette-1-light-2 u-text-2"> 
                  <?php 
                                    foreach($result1 as $row){
                                       
                                        echo $row -> synopsis;
                                        echo '</br>';
                                     
                                        }  
                                 ?> 
                  </p>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-25 u-layout-cell-2">
                <div class="u-container-layout u-valign-middle-lg u-valign-middle-md u-valign-top-sm u-valign-top-xs u-container-layout-2">
                  <!-- <img class="u-expanded-width u-image u-image-default u-image-1" src="images/pexels-photo-6995703.jpeg" alt="" data-image-width="1000" data-image-height="1500"> -->
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
      </div>
    </section>
    <section class="u-clearfix u-section-2" id="carousel_c049">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-align-center u-container-style u-layout-cell u-shape-rectangle u-size-30 u-layout-cell-1">
                <div class="u-container-layout u-valign-middle-md u-valign-top-sm u-valign-top-xs u-container-layout-1">
                  <p class="u-custom-font u-font-merriweather u-text u-text-default u-text-1"> Sukarno Birthplace</p>
                  <div class="u-container-style u-grey-5 u-group u-group-1">
                    <div class="u-container-layout u-container-layout-2">
                    
  <?php
  $uri_rdf = 'http://localhost/Web_SEman/maps.rdf';
  $data = \EasyRdf\Graph::newAndLoad($uri_rdf);//yg menghubungka ke rdf yg telah dibuat
  $doc = $data->primaryTopic();//dipakai untuk jika ada titlle didbpedia untuk predikat sepertinya
  ?>


  <!-- ukuran dari mapsnya ditampilan web -->
  <div id="map" style="width: 500px; height: 300px"></div>
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
      .bindPopup("<b>lokasi</b><br />kelahiran Ir. Soekarno")
      .openPopup();

    const popup = L.popup()
      .setLatLng(['<?= $doc->get('foaf:latitude') ?>', '<?= $doc->get('foaf:longitude') ?>'])
      .setContent("rumah lokasi kelahiran Ir. Soekarno")
      .openOn(map);

    function onMapClick(e) {
      popup
        .setLatLng(e.latlng)
        .setContent(`You clicked the map at ${e.latlng.toString()}`)
        .openOn(map);
    }

    map.on("click", onMapClick);
  </script>



                    </div>
                  </div>
                </div>
              </div>
              <div class="u-align-left-sm u-align-left-xs u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                <div class="u-container-layout u-valign-top-md u-valign-top-sm u-valign-top-xs u-container-layout-3">
                  <!-- <div class="u-align-center u-container-style u-group u-palette-1-light-1 u-group-2">
                    <div class="u-container-layout u-valign-top">
                      <h2 class="u-custom-font u-font-montserrat u-text u-text-body-alt-color u-text-default u-text-4">01</h2>
                    </div>
                  </div> -->
                  <!-- <p class="u-align-left u-text u-text-5">Sample text. Click to select the text box. Click again or double click to start editing the text.</p> -->
                  <p class="u-align-justify u-text u-text-6"> 
                 
                  <h4 style="color: black">sekilas tentang Ir. Soekarno</h4>
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
                    </table>
                                 
                  </p>
                  <!-- <p class="u-align-justify u-text u-text-6"> The principal reason we continue to adapt and evolve our business model is to ensure that we are meeting our customers’ expectations. One example of this has been to use modern technology and the introduction of the real time tracking our teams using GPS.&nbsp;</p>
                  <p class="u-text u-text-7">Sample text. Click to select the text box. Click again or double click to start editing the text.</p> -->
                  <!-- <div class="u-container-style u-group u-palette-1-light-1 u-group-3">
                    <div class="u-container-layout u-valign-top">
                      <h2 class="u-custom-font u-font-montserrat u-text u-text-body-alt-color u-text-default u-text-8">02</h2>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-palette-1-light-2 u-section-3" id="carousel_6ffd">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <h2 class="u-custom-font u-font-merriweather u-text u-text-1"> Hyperinflation During Soekarno's Leadership(1945-1965)</h2>
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-60 u-layout-cell-1">
                <div class="u-container-layout u-valign-top u-container-layout-1">
                  <!-- <img class="u-image u-image-default u-image-1" src="images/pexels-photo-2876090.jpeg" alt="" data-image-width="1083" data-image-height="1500"> -->
                   <!-- Chart -->
      <div class="choose_section layout_padding">
         <div class="container">
            <!-- <h1 class="u-custom-font u-font-merriweather u-text u-text-1">Hyperinflation During Soekarno's Leadership(1945-1965)</h1> -->
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- <section class="u-clearfix u-section-4" id="carousel_690e">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-20 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-size-36 u-size-60-md">
                <div class="u-layout-col">
                  <div class="u-size-20">
                    <div class="u-layout-row">
                      <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                        <div class="u-container-layout u-valign-middle u-container-layout-1">
                          <h2 class="u-custom-font u-font-merriweather u-text u-text-1">Gallery</h2>
                          <p class="u-text u-text-default u-text-2">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
                        </div>
                      </div>
                      <div class="u-container-style u-image u-layout-cell u-size-30 u-image-1" data-image-width="1001" data-image-height="1500">
                        <div class="u-container-layout u-container-layout-2"></div>
                      </div>
                    </div>
                  </div>
                  <div class="u-size-40">
                    <div class="u-layout-row">
                      <div class="u-container-style u-image u-layout-cell u-size-60 u-image-2" data-image-width="562" data-image-height="750">
                        <div class="u-container-layout u-container-layout-3"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="u-size-24 u-size-60-md">
                <div class="u-layout-col">
                  <div class="u-container-style u-image u-layout-cell u-size-60 u-image-3" data-image-width="1000" data-image-height="1500">
                    <div class="u-container-layout u-container-layout-4"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-palette-1-base u-section-5" id="carousel_7c12">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-container-style u-expanded-width-xs u-group u-white u-group-1">
          <div class="u-container-layout u-container-layout-1"><span class="u-icon u-icon-circle u-text-palette-1-base u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 409.294 409.294" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-5c4d"></use></svg><svg class="u-svg-content" viewBox="0 0 409.294 409.294" id="svg-5c4d"><path d="m233.882 29.235v175.412h116.941c0 64.48-52.461 116.941-116.941 116.941v58.471c96.728 0 175.412-78.684 175.412-175.412v-175.412z"></path><path d="m0 204.647h116.941c0 64.48-52.461 116.941-116.941 116.941v58.471c96.728 0 175.412-78.684 175.412-175.412v-175.412h-175.412z"></path></svg></span>
            <h4 class="u-custom-font u-font-merriweather u-text u-text-1">We’ve seen a lot of efficiency in our workflow processes the way subs work and the way designers work with templates.</h4><span class="u-icon u-icon-circle u-text-palette-1-base u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 409.294 409.294" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-0171"></use></svg><svg class="u-svg-content" viewBox="0 0 409.294 409.294" id="svg-0171"><path d="m233.882 29.235v175.412h116.941c0 64.48-52.461 116.941-116.941 116.941v58.471c96.728 0 175.412-78.684 175.412-175.412v-175.412z"></path><path d="m0 204.647h116.941c0 64.48-52.461 116.941-116.941 116.941v58.471c96.728 0 175.412-78.684 175.412-175.412v-175.412h-175.412z"></path></svg></span>
          </div>
        </div>
        <h5 class="u-text u-text-2">- James Hawkes, General Manager Operations  -</h5>
      </div>
    </section> -->
    <section class="u-align-center u-clearfix u-section-6" id="carousel_2f92">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-custom-font u-font-merriweather u-text u-text-1">Our Teams</h1>
        <div class="u-expanded-width u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <div class="u-align-center u-container-style u-custom-item u-list-item u-palette-1-light-2 u-repeater-item u-list-item-1">
              <div class="u-container-layout u-similar-container u-valign-middle u-container-layout-1">
                <!-- <div alt="" class="u-image u-image-circle u-image-1" data-image-width="1000" data-image-height="1500"></div> -->
                <h5 class="u-custom-font u-font-merriweather u-text u-text-default u-text-2">Rizki Sahat Arapenta</h5>
                <h6 class="u-text u-text-default u-text-3">211402030</h6>
              </div>
            </div>
            <div class="u-align-center u-container-style u-custom-item u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-valign-middle u-container-layout-2">
                <!-- <div alt="" class="u-image u-image-circle u-image-2"></div> -->
                <h5 class="u-custom-font u-font-merriweather u-text u-text-default u-text-4">M. Hafizh Rayhan</h5>
                <h6 class="u-text u-text-default u-text-5">211402033</h6>
              </div>
            </div>
            <div class="u-align-center u-container-style u-custom-item u-list-item u-palette-1-light-2 u-repeater-item">
              <div class="u-container-layout u-similar-container u-valign-middle u-container-layout-3">
                <!-- <div alt="" class="u-image u-image-circle u-image-3" data-image-width="720" data-image-height="1080"></div> -->
                <h5 class="u-custom-font u-font-merriweather u-text u-text-default u-text-6">Rizqi Amelia</h5>
                <h6 class="u-text u-text-default u-text-7">211402096</h6>
              </div>
            </div>
            <div class="u-align-center u-container-style u-custom-item u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-valign-middle u-container-layout-4">
                <!-- <div alt="" class="u-image u-image-circle u-image-4" data-image-width="720" data-image-height="1080"></div> -->
                <h5 class="u-custom-font u-font-merriweather u-text u-text-default u-text-8">Erli Gurning</h5>
                <h6 class="u-text u-text-default u-text-9">211402123</h6>
              </div>
            </div>
            <div class="u-align-center u-container-style u-custom-item u-list-item u-palette-1-light-2 u-repeater-item">
              <div class="u-container-layout u-similar-container u-valign-middle u-container-layout-5">
                <!-- <div alt="" class="u-image u-image-circle u-image-5" data-image-width="997" data-image-height="1500"></div> -->
                <h5 class="u-custom-font u-font-merriweather u-text u-text-default u-text-10">David Stephan Bangun</h5>
                <h6 class="u-text u-text-default u-text-11">211402141</h6>
              </div>
            </div>
            <div class="u-align-center u-container-style u-custom-item u-list-item u-repeater-item u-white u-list-item-6">
              <div class="u-container-layout u-similar-container u-valign-middle u-container-layout-6">
                <!-- <div alt="" class="u-image u-image-circle u-image-6" data-image-width="716" data-image-height="1080"></div> -->
                <h5 class="u-custom-font u-font-merriweather u-text u-text-default u-text-12">Arnis Chairiah</h5>
                <h6 class="u-text u-text-default u-text-13">211402144</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-c673"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">Kelompok 2 - Web Semantik</p>
      </div></footer>
    <section class="u-backlink u-clearfix u-grey-80">
      
    </section>
  
</body></html>