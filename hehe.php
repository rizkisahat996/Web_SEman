<?php
require 'vendor/autoload.php';
require_once __DIR__."/html_tag_helpers.php";




    \EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
    \EasyRdf\RdfNamespace::set('rdfs','http://www.w3.org/2000/01/rdf-schema#');
    \EasyRdf\RdfNamespace::set('dbo', 'http://dbpedia.org/ontology/');
    \EasyRdf\RdfNamespace::set('dbp', 'http://dbpedia.org/property/');
    \EasyRdf\RdfNamespace::setDefault('og');


$sparql_jena = new \EasyRdf\Sparql\Client('http://localhost:3030/sukarno/sparql');

$sparql_query = 'select ?synopsis ?child1  where{
  ?m dbo:child1 ?child1;
     rdfs:synopsis ?synopsis}';

  $result = $sparql_jena->query($sparql_query);

  foreach($result as $row){
    echo '<br>';
    echo '<b>';
    echo $row -> child1;
    echo '</b>';
    echo '<br/>';
    echo '<b>';
    echo $row -> synopsis;
    echo '</b>';
    echo '<br/>';
    }

    $uri_rdf = 'http://localhost/Web_SEman/w.rdf';
    $data = \EasyRdf\Graph::newAndLoad($uri_rdf);
    $pe = $data->primaryTopic();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tubes Web Semantik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style type="text/css">
    body { font-family: sans-serif; }
    dt { font-weight: bold; }
    .image { float: left; margin: 10px; max-width: 200px}
  </style>
</head>
<body>
    <!-- OGP -->
<div class="container">

  <div class="row">

    <div class="col-auto">
      <?php
        $doc = \EasyRdf\Graph::newAndLoad('https://dbpedia.org/page/Sukarno');
        if ($doc->image) {
          echo content_tag('img', null, array('src'=>$doc->image, 'class'=>'image'));
        }
      ?>
    </div>
    
    <div class="col-9">
      <dl>
        <dt>Page:</dt> <dd><?= link_to($doc->url) ?></dd>
        <dt>Type:</dt> <dd><code><?= $doc->type ?></code></dd>
        <dt>Title:</dt> <dd><?= $doc->title ?></dd>
        <dt>Description:</dt> <dd><?= $doc->description ?></dd>
      </dl>
    </div>
    <div>
      <?=
        $pe->get('foaf:name'),
        $pe->get('foaf:almaMater')
      ?>
    </div>
  </div>
</div>
</body>
</html>