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
// http://localhost/guzzle/test-3.php

require 'vendor/autoload.php';
$client = new GuzzleHttp\Client(['timeout' => 20]);

$iterator = function () use ($client) {
    $index = 0;
    while (true) {
        if ($index === 10) {
            break;
        }

        $url = 'http://localhost/wait/5/' . $index++;
        $request = new \GuzzleHttp\Psr7\Request('GET', $url, []);

        echo "Queuing $url @ " . (new Carbon())->format('Y-m-d H:i:s') . PHP_EOL;

        yield $client
            ->sendAsync($request)
            ->then(function (Response $response) use ($request) {
                return [$request, $response];
            });

    }
};

$promise = \GuzzleHttp\Promise\each_limit(
    $iterator(),
    10,  /// concurrency,
    function ($result, $index) {
        /** @var GuzzleHttp\Psr7\Request $request */
        list($request, $response) = $result;
        echo (string)$request->getUri() . ' completed ' . PHP_EOL;
    }
);
$promise->wait();
?>
</div>
</div>
</body>
</html>

