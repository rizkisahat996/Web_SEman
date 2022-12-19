<?php
require 'vendor/autoload.php';
\EasyRdf\RdfNamespace::set('geo', 'http://www.w3.org/2003/01/geo/wgs84_pos#');
\EasyRdf\RdfNamespace::set('foaf', 'http://xmlns.com/foaf/0.1/');
\EasyRdf\RdfNamespace::set('dbp', 'http://dbpedia.org/property/');
\EasyRdf\RdfNamespace::set('dbo', 'http://dbpedia.org/ontology/');
\EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
\EasyRdf\RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
\EasyRdf\RdfNamespace::setDefault('og');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <base target="_top" />
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>maps leaftlef js</title>

  <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

  <!-- <style>
    html,
    body {
      height: 100%;
      margin: 0;
    }

    .leaflet-container {
      height: 400px;
      width: 600px;
      max-width: 100%;
      max-height: 100%;
    }
  </style> -->
</head>

<body>
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
</body>

</html>