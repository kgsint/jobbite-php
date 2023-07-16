<?php 

namespace Core\Database\Tables;

use PDOException;
use Core\Database\MySQL;

class UsersTable 
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    // save data into table
    public function insert(array $data)
    {
        try {

            // foreach($data as $key => $val) {
            //     ${$key} = $val;
            // }
            // (i.e) $name = "user's name"; $email = "youremail@mail.co.uk"; $password = "hashedpassword";
            extract($data);
           
            $query = "INSERT INTO `users` (name, email, password) VALUES(:name, :email, :password)";

            $stm = $this->db->prepare($query);
            $stm->execute([
                ':name' => $name,
                ':email' => $email,
                ':password' => $password
            ]);

            return $this->db->lastInsertId();

        }catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    // find user by email
    public function findByEmail(string $email)
    {
        try {

            $query = "SELECT * FROM `users` WHERE email=:email";

            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ":email" => $email
            ]);

            $row = $stmt->fetch();

            return $row;

        }catch(PDOException $e) {
            return $e->getMessage();
        }
    }

}