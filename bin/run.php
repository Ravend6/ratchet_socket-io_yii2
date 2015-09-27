<?php

require '/vendor/autoload.php';

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use bin\Socket;

$port = 8080;
$server = IoServer::factory(new HttpServer(new WsServer(new Socket())), $port);

echo "Server listening on port: {$port}..." . PHP_EOL;
$server->run();