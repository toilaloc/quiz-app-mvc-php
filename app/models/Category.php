<?php 

namespace app\models;
use app\config\Database;
use PDO;
use PDOException;

class Category extends Database 
{
    public function store($name, $desc)
    {
        try {
            $sql = "INSERT INTO category(name,description) VALUES ('$name', '$desc')";
            $category = $this->conn->query("$sql")->fetchAll(PDO::FETCH_ASSOC);
            return $category;
            }
            catch(PDOException $e) {
            //return false;   // echo "Error: " . $e->getMessage();
        }

    }

    public function getCategory($id)
    {
        try {
            $sql = "SELECT id, name FROM category WHERE id = $id";
            $category = $this->conn->query("$sql")->fetchAll(PDO::FETCH_ASSOC);
            return $category;
            }
            catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        } 

    }

    public function getAll()
    {
        try {
            $sql = "SELECT * FROM category";
            $category = $this->conn->query("$sql")->fetchAll(PDO::FETCH_ASSOC);
            return $category;
            }
            catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        } 
    }
}