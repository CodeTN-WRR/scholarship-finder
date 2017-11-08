<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes


    
$app->get('/', function (Request $request, Response $response, array $args) {
   
    
    $this->logger->info("Slim-Skeleton '/' route");
          
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

$app->get( '/search', function (Request $request) use ($app) {
    //function (Request $request, Response $response, array $args) { // 
        //$query = $app->request->get('query');
        //$query = $app->request->getQueryParams();
        $query = $request->getQueryParams();
        $hookObject = (object) ['query' => $query, 'results' => []];
        $app->applyHook('search', $hookObject);
        $app->render(
            'search.phtml',
            [
                'query' => $query,
                'results' => $hookObject->results,
            ]
        );
    }
);

/*
$app->hook('search', function ($hookObject) use ($posts) {
    $query = $hookObject->query;
    $result = [];
    foreach ($posts as $post) {
        $content = strip_tags(
            file_get_contents(__DIR__ . '/../templates/' . $post['slug'] . '.html')
        );
        if (stripos($content, $query) !== false || stripos($post['title'], $query) !== false) {
            $result[] = ['title' => $post['title'], 'uri' => '/{[query]}' . $post['slug']];
        }
    }
    if (count($result)) {
        $hookObject->results['Results'] = $result;
    }
});

$posts = [
    [
        'title' => 'Cholesky decomposition in PHP',
        'created' => new DateTime('2015-01-16'),
        'slug' => 'cholesky_decomposition_in_php',
    ],
    [
        'title' => 'Calculate the inverse of a matrix in PHP',
        'created' => new DateTime('2015-01-14'),
        'slug' => 'calculate_the_inverse_of_a_matrix_in_php',
    ],
];

$app->render(
            'search.phtml',
            [
                'query' => $query,
                'results' => $hookObject->results,
            ]
        );
        
$app->post('/', 'uploadFile');

function uploadFile () {
    if (!isset($_FILES['uploads'])) {
        echo "No files uploaded!!";
        return;
    }
    $imgs = array();

    $files = $_FILES['uploads'];
    $cnt = count($files['name']);

    for($i = 0 ; $i < $cnt ; $i++) {
        if ($files['error'][$i] === 0) {
            $name = uniqid('img-'.date('Ymd').'-');
            if (move_uploaded_file($files['tmp_name'][$i], 'uploads/' . $name) === true) {
                $imgs[] = array('url' => '/uploads/' . $name, 'name' => $files['name'][$i]);
            }

        }
    }

    $imageCount = count($imgs);

    if ($imageCount == 0) {
       echo 'No files uploaded!!  <p><a href="/">Try again</a>';
       return;
    }

    $plural = ($imageCount == 1) ? '' : 's';

    foreach($imgs as $img) {
        printf('%s <img src="%s" width="50" height="50" /><br/>', $img['name'], $img['url']);
    }
} */