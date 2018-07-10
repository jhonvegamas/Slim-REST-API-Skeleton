<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app      = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

// Register middleware
require __DIR__ . '/../src/middleware.php';

// Register routes
require __DIR__ . '/../src/routes.php';

require __DIR__ . '/../app/app_loader.php';

// CORS configuration
$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
        ->withHeader('Content-type', 'application/json')
        ->withHeader('Access-Control-Allow-Origin', '*')        
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Allow', 'GET, POST, PUT, DELETE')
        ->withHeader('Access-Control-Request-Method', 'GET, POST, PUT, DELETE')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');
});

// Run app
$app->run();
