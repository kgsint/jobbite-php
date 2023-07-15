<?php 

// view
function view(string $path, array $data = []) 
{
    extract($data);

    require_once VIEW_PATH . "/{$path}.view.php";
}

// project's base path
function base_path(string $path = "")
{
    return BASE_PATH . $path;
}

// to link css or js in public directory
function url_asset(string $path = "")
{
    // check https or http i.e http://localhost:8000 or https://example.com
    $host = isset($_SERVER['HTTPS']) ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'];

    if($path) {
        $host .= "/{$path}"; 
    }

    return $host;
}