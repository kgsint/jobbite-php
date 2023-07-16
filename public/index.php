<?php

use App\Exceptions\ValidationException;

session_start();

require __DIR__ . "/../constants.php";

require __DIR__ . "/../vendor/autoload.php";

// routes file
require BASE_PATH . "/router/routes.php";

// original path without query string
$uri = parse_url($_SERVER['REQUEST_URI'])['path']; 

// check if there is PUT, PATCH  DELETE, form-request, if not GET or POST
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD']; 

try {
    $router->resolve($uri, $method);

}catch(ValidationException $e) {
    // to flash error message and old value 
    // unset $SESSION['_flash'] in /views/partials/footer.php so the message won't persist
    $_SESSION['_flash']['errors'] = $e->errors;
    $_SESSION['_flash']['old'] = $e->old;
    
    return redirectBack();
}




