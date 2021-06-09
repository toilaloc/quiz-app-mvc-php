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
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return true;
            }
            catch(PDOException $e) {
             echo "Error: " . $e->getMessage();
        }

    }

    public function update($id, $name, $description)
    {
        
        try {
            $sql = "UPDATE category SET  name = '$name', description = '$description' WHERE id = $id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return true;
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
        } 
    }

    public function destroy($id)
    {
        try {
            $sql = "DELETE FROM category WHERE id = $id";
            $category = $this->conn->query("$sql")->fetchAll(PDO::FETCH_ASSOC);
            return $category;
            }
            catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        } 

    }

    public function getCategory($id)
    {
        try {
            $sql = "SELECT id, name, description FROM category WHERE id = $id";
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

    public function getCategoryGeneral()
    {
        try {
            $sql = "SELECT * FROM category LIMIT 5";
            $category = $this->conn->query("$sql")->fetchAll(PDO::FETCH_ASSOC);
            return $category;
            }
            catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }  
    }
}