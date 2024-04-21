<?php

namespace MixedMessages2;

class Router {
    private array $routes = [
        '/MixedMessages2/' => 'index.html',
        '/MixedMessages2/getwords' => 'MixedMessages2\Controllers\MainController',
        '/MixedMessages2/setwords' => 'MixedMessages2\Controllers\MainController',
    ];

    public function __construct() {
        $requestPath = $_SERVER['REQUEST_URI'];
        $parsedUrl = parse_url($requestPath);
        $path = $parsedUrl['path'];

        if (array_key_exists($path, $this->routes)) {
            file_exists($this->routes[$path]) ? require $this->routes[$path] : null;
            class_exists($this->routes[$path]) ? new $this->routes[$path]() : null;
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "404 - Page Not Found";
        }
    }
}
