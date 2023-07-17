<?php 

use Core\Database\MySQL;
use Core\Database\Tables\UsersTable;

// die and dump
function dd(mixed $value):void 
{
    echo "<pre style='background-color:#111; color:#f1f1f1'>";
    var_dump($value);
    echo "</pre>";

    die;
}

// view
function view(string $path, array $data = []) 
{
    extract($data);

    require_once VIEW_PATH . "/{$path}.php";
}

// redirect back
function redirectBack()
{
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

// redirect
function redirect(string $path = "") :void
{
    header("Location:{$path}");
}

// abort
function abort(int $status = 404)
{
    http_response_code($status);
    require VIEW_PATH . "{$status}.php";

    exit;
}

// old value
function old(string $key = "") {
    return $_SESSION['_flash']['old'][$key] ?? "";
}

// validation error message
function error(string $key) {
    return $_SESSION['_flash']['errors'][$key] ?? "";
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

function auth_user()
    {
        $email = $_SESSION['user']['email'];

        $user = (new UsersTable(new MySQL))->findByEmail($email);

        return $user ?? null;
    }