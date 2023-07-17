<?php 

namespace Core\Database\Tables;

use Core\Database\MySQL;

class JobsTable 
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function insert(array $data)
    {
        try {
            extract($data); // eg. ['title' => 'job title'] --> $title = 'job title'

            $query = "INSERT INTO `jobs`
                                    (title, location, job_status, salary_from, salary_to, description, company_name, company_email,company_logo, apply_url, user_id) 
                                    VALUES(:title, :location, :job_status, :salary_from, :salary_to, :description, :company_name, :company_email, :company_logo, :apply_url, :user_id)";

            $stmt = $this->db->prepare($query);

            $stmt->execute($data);

            return $this->db->lastInsertId();

        }catch(\PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getAll()
    {
        try {
            $query = "SELECT * FROM `jobs`";

            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;

        }catch(\PDOException $e) {
            return $e->getMessage();
        }
    }

    public function search($title, $location, $status)
    {
        $query = "SELECT * FROM jobs WHERE title LIKE :title ";

        $stmt = $this->db->prepare($query);

        $stmt->execute([
            ':title' => "%{$title}%",
            
        ]);

        $rows = $stmt->fetchAll();

        return $rows;

    }

    public function findById(int|string $id)
    {
        $query = "SELECT * FROM `jobs` WHERE id=:id";

        $stmt = $this->db->prepare($query);

        $stmt->execute([
            ':id' => $id
        ]);

        $row = $stmt->fetch() ?? null;

        return $row;
        
    }
}