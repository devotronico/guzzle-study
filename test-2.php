<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="public/style.css">
    <title>Document</title>
</head>
<body>
  <div class="container">
    <div id="test" class="section">
    <h3>GuzzleHttp</h3>
<?php
// http://localhost/guzzle/test-2.php
// tool for simulate request:  http://httpbin.org
require 'vendor/autoload.php';
$client = new GuzzleHttp\Client([

  'base_uri' => 'http://httpbin.org',
  'timeout' => 2.0
]);

/**
 * metodo: GET
 * URI: ip {http://httpbin.org/ip}
 * $response contiene i valori dei metodi:
 *   getReasonPhrase(), getStatusCode(), getHeaders(), 
 */
$response = $client->request('GET', 'ip'); 
echo $response->getReasonPhrase(); // return ok
echo "<hr>";
echo $response->getStatusCode(); // return 200
$body = $response->getBody();
$header = $response->getHeaders();

// var_dump($header);
echo "<hr>";
echo "<h5>Dati</h5>";
echo "<p>valori di <b>response</b></p>";
echo '<pre>';print_r($response);"</pre>";
echo "<hr>";
echo "<p>valori di <b>header</b></p>";
echo '<pre>';print_r($header);"</pre>";
echo "<hr>";
echo "<p>valori di <b>body</b></p>";
echo $body->getContents(),"<br>";
echo "<hr>";

echo "<h5>Metodi</h5>";
echo "<p>metodi classe GuzzleHttp</p>";
echo '<pre>';print_r( get_class_methods($client) );"</pre>";
echo "<hr>";
echo "<p>metodi di <b>request</b></p>";
echo '<pre>';print_r( get_class_methods($response) );"</pre>";
echo "<hr>";
echo "<p>metodi di <b>body</b></p>";
echo '<pre>';print_r( get_class_methods($body) );"</pre>";
echo "<hr>";
?>
</div>
</div>
</body>
</html>

<?php
// http://localhost/test/

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