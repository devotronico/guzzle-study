<?php


class GetProposition{

public function requestAsync()
{
    require 'Webservice.php';
    $webservice = new Webservice();
    $xmlBody = '<some-xml></some-xml>';
    return $webservice->requestAsync($xmlBody, 'GetProposition');
}

}