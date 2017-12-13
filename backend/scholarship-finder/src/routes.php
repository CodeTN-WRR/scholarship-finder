<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes


    
$app->get('/', function (Request $request, Response $response, array $args) {
   
    $this->logger->info("Slim-Skeleton '/' route");
          
    return $this->renderer->render($response, 'index.phtml', $args);
    
});

$app->post('/', function(Request $request, Response $response, array $args){
    $name = $request->getParam('name'); // by key
    $email = $request->getParam('email'); // by key
    echo "Name: <h1>".$name."</h1>";
    echo "Email: <h1>".$email."</h1>";
});



$app->get('/login', function (Request $request, Response $response, array $args) {
    
    $this->logger->info("Slim-Skeleton '/' route");

    return $this->renderer->render($response, 'login.html', $args);
});

$app->get('/creators', function (Request $request, Response $response, array $args) {
    
    $this->logger->info("Slim-Skeleton '/' route");

    return $this->renderer->render($response, 'creators.html', $args);
});

$app->get('/scholarships', function (Request $request, Response $response, array $args) {
    
    $this->logger->info("Slim-Skeleton '/' route");

    return $this->renderer->render($response, 'scholarships.html', $args);
});

$app->get('/resources', function (Request $request, Response $response, array $args) {
    
    $this->logger->info("Slim-Skeleton '/' route");

    return $this->renderer->render($response, 'resources.html', $args);
});

$app->get('/resources/tips', function (Request $request, Response $response, array $args) {
    
    $this->logger->info("Slim-Skeleton '/' route");

    return $this->renderer->render($response, 'tips.html', $args);
});

$app->get('/profile', function (Request $request, Response $response, array $args) {
    
    $this->logger->info("Slim-Skeleton '/' route");

    return $this->renderer->render($response, 'profile.html', $args);
});

$app->get('/profile/saved', function (Request $request, Response $response, array $args) {
    
    $this->logger->info("Slim-Skeleton '/' route");

    return $this->renderer->render($response, 'saved.html', $args);
});

$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        return $c['response']
            ->withStatus(404)
            ->withHeader('Content-Type', 'text/html')
            ->write('Page not found');
    };
};
