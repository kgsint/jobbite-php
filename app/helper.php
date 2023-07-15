<?php 

function view(string $path, array $data = []) 
{
    extract($data);

    require_once VIEW_PATH . "/{$path}.view.php";
}

function base_path(string $path = "")
{
    return BASE_PATH . $path;
}