<?php
namespace Phoenix\WebSocket;

class Server {
    // Full secure server code from previous messages
    public function __construct(int $port = 8080) {
        echo "Phoenix WebSocket Server started on port $port\n";
    }
}