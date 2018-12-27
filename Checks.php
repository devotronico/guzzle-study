<?php

class Checks{
// http://localhost/guzzle/Checks.php
// http://localhost/guzzle/Webservice.php
// http://localhost/guzzle/Service/GetProposition.php
public function request()
{
    $promises = [];
    $promises['requestOne'] = $this->requestOne();
    $promises['requestTwo'] = $this->requestTwo();
    $promises['requestThree'] = $this->requestThree();
    // etc

    // wait for all requests to complete
    $results = \GuzzleHttp\Promise\settle($promises)->wait();

    // Return results
    var_dump($results);
    // return $results;
}

public function requestOne()
{
    require "Service/GetProposition.php";
     $promise = (new Service\GetProposition())
        ->requestAsync();
     var_dump($promise);
    //  return $promise;
}            

// requestTwo, requestThree, etc

}