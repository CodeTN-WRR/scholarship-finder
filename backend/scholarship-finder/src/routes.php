<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes


$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/login', function (Request $request, Response $response, array $args) {
    
    $this->logger->info("Slim-Skeleton '/' route");

    return $this->renderer->render($response, 'login.phtml', $args);
});

$app->get('/creators', function (Request $request, Response $response, array $args) {
    
    $this->logger->info("Slim-Skeleton '/' route");

    return $this->renderer->render($response, 'about_us.phtml', $args);
});

$app->get('/scholarships', function (Request $request, Response $response, array $args) {
    
    $this->logger->info("Slim-Skeleton '/' route");

    return $this->renderer->render($response, 'search.phtml', $args);
});

$app->get('/resources', function (Request $request, Response $response, array $args) {
    
    $this->logger->info("Slim-Skeleton '/' route");

    return $this->renderer->render($response, 'resources.phtml', $args);
});

$app->get('/resources/tips', function (Request $request, Response $response, array $args) {
    
    $this->logger->info("Slim-Skeleton '/' route");

    return $this->renderer->render($response, 'tips.phtml', $args);
});

$app->get('/profile', function (Request $request, Response $response, array $args) {
    
    $this->logger->info("Slim-Skeleton '/' route");

    return $this->renderer->render($response, 'profile.phtml', $args);
});

$app->get('/profile/saved', function (Request $request, Response $response, array $args) {
    
    $this->logger->info("Slim-Skeleton '/' route");

    return $this->renderer->render($response, 'saved.phtml', $args);
});

$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        return $c['response']
            ->withStatus(404)
            ->withHeader('Content-Type', 'text/html')
            ->write('Page not found');
    };
};