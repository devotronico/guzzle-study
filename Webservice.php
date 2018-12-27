<?php

class Webservice{

public function requestAsync($xmlBody, $soapAction)
{
    $client = new Client([
        'base_uri' => 'some_url',
        'timeout'  => 5.0
    ]);

    $xml = '<soapenv:Envelope>
       <soapenv:Body>
          '.$xmlBody.'
       </soapenv:Body>
    </soapenv:Envelope>';

    $promise = $client->requestAsync('POST', 'NameOfService', [
        'body'    => $xml,
        'headers' => [
            'Content-Type' => 'text/xml',
            'SOAPAction'   => $soapAction, // SOAP Method to post to
        ],
    ]);

    return $promise;
}

}