<?php 

namespace Core;

use Core\Database\MySQL;

class Validator
{
    public static function required(mixed $input,int $min = 1, $max = INF ) :bool
    {
        $input = trim($input); // remove white space

        if(empty($input) || strlen($input) < $min || strlen($input) > $max) {
            return true;
        }

        return false;
    }

    public static function email(string $input) :mixed
    {
        return filter_var($input, FILTER_VALIDATE_EMAIL);
    }

    public static function unique(string $table, string $column, string $inputValue) :bool
    {
        $db = new MySQL();
        $db = $db->connect();

        $query = "SELECT * FROM  `{$table}` WHERE $column=:column";

        $stm = $db->prepare($query);
        $stm->execute([
            ':column' => $inputValue
        ]);

        $row = $stm->fetch();

        return (bool) $row ?? false;
    }

    // check whether user input data of passwords are the same or not 
    public static function confirm(string $password, string $confirm_password) :bool
    {
        if($password === $confirm_password) {
            return true;
        }

        return false;
    }

    public static function url(string $input) :bool
    {
        return filter_var($input, FILTER_VALIDATE_URL);
    }
}