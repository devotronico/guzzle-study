<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="public/style.css">
    <title>Forms</title>
</head>
<body>
  <div class="container">
  <div id="xml" class="section">
  <h3>Dati in formato XML</h3>
  <p>url di test da incollare nel campo input:  http://localhost/guzzle/api/xml/data.xml</p>
  <!-- <form action="index.php" method="GET"> -->
  <form>
  <div class="form-group row">
    <label for="dataxml" class="col-sm-2 col-form-label">URL:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="dataxml" name="dataxml" placeholder="dataxml">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
// http://localhost/guzzle/test-1.php
// http://localhost/guzzle/api/xml/data.xml
if ( isset($_REQUEST['dataxml']) ) { // echo "esiste: ".$_REQUEST['dataxml']; } else { echo "non esiste"; }

  require 'vendor/autoload.php';
  $client = new GuzzleHttp\Client();
  $res = $client->request('GET', $_REQUEST['dataxml']); // http://localhost/guzzle/api/xml/data.xml
  if ( $res->getStatusCode() === 200 ) {
    if ( $res->hasHeader('content-length') ) {
      
        $contentLength = $res->getHeader('content-length')[0]; // ritorna peso in bytes 
        echo "<p> downloaded: $contentLength bytes of data.</p>";
    }
      $body = $res->getBody(); // ritorna il contenuto
      $xml = new SimpleXMLElement($body); // lo converte in oggetto (SimpleXMLElement Object)

      // echo '<pre>';print_r( $xml );
      $i = 0;
    foreach($xml->Autori->Nome as $nome){
      $i++;
      echo "Nome $i: $nome <br>";
    }
  }
}
?>
</div>
<hr>
<div id="json" class="section">
  <h3>Dati in formato JSON</h3>
  <p>url di test da incollare nel campo input:  http://localhost/guzzle/api/json/data.json</p>
  <!-- <form action="index.php" method="GET"> -->
  <form>
  <div class="form-group row">
    <label for="datajson" class="col-sm-2 col-form-label">URL:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="datajson" name="datajson" placeholder="datajson">
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
// http://localhost/guzzle/api/json/data.json
if ( isset($_REQUEST['datajson']) ) { // echo "esiste: ".$_REQUEST['datajson']; } else { echo "non esiste"; }

  require 'vendor/autoload.php';
  $client = new GuzzleHttp\Client();
  $res = $client->request('GET', $_REQUEST['datajson']); // http://localhost/test/api/data.xml

  if ( $res->getStatusCode() === 200 ) {

    if ( $res->hasHeader('content-length') ) {
      
        $contentLength = $res->getHeader('content-length')[0]; // ritorna peso in bytes 
        echo "<p> downloaded: $contentLength bytes of data.</p>";
    }
    $strJson = $res->getBody(); // ritorna il contenuto  in stringa dal file json
     
    $obj = json_decode($strJson);  // converte la stringa json in object(stdClass)
    // echo '<pre>';var_dump( $obj );

    $i = 0;
    foreach($obj->Autori->Nome as $nome){
      $i++;
      echo "Nome $i: $nome <br>";
    }
  }
}
?>
</div>
</div>
</body>
</html>

<?php
/*
echo $res->getStatusCode(); // "200"
echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
echo $res->getBody(); // {"type":"User"...'
*/

// Send an asynchronous request.
/* 
$request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
$promise = $client->sendAsync($request)->then(function ($response) {
    echo 'I completed! ' . $response->getBody();
});
$promise->wait();
*/



/*
die( $ );
die( '' );
var_dump( $ );
echo '<pre>';print_r( $ );
if ( isset( $ )) { var_dump( $ ); echo '<pre>';print_r( $ ); die(); }
*/

/*
$test = "";
if ( is_null( $var )) {$test .= "null, ";}
if ( isset( $var )) { $test .= "settata, "; }
if ( !$var ) {$test .= "false, ";} 
if ( empty( $var )) {$test .= "empty, ";}
if ( $var == 0) {$test .= "0(NOTstrict), ";}
if ( $var === 0) {$test .= "0(strict), ";}
echo $test;
*/
/*
if(nomeValuta == "dollaro") { // chiamata AJAX 

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.onreadystatechange = function() {

    if (this.readyState == 4 && this.status == 200) {
      
      if(parseFloat(this.responseText) > 0){
        const cambio = parseFloat(this.responseText);
        document.getElementById("cambio").value = cambio;
      }
      else
        alert('Attenzione: Non e\' stato possibile recuperare il valore di cambio. Inserirlo manualmente.'); 	
    }
  };
    xmlhttp.open("GET","USD.php?dataValuta="+dataValuta ,true);
    xmlhttp.send();
  } else { // chiamata AJAX 

    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {


        if(parseFloat(this.responseText) > 0){
        const cambio = parseFloat(this.responseText);
        document.getElementById("cambio").value = cambio;
        }
        else {
          alert('Attenzione: Non e\' stato possibile recuperare il valore di cambio. Inserirlo manualmente.'); 
        }
      }
    };
    xmlhttp.open("GET","GBP.php?dataValuta="+dataValuta ,true);
    xmlhttp.send();
  }
  */
  // </DM>

?>