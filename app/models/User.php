<?php 

namespace app\models;
use app\config\Database;
use PDO;
use PDOException;

class User extends Database
{
    public $sql;

    public function checkLogin(string $username, string $password) {
        $sql = "SELECT id, username, email, avatar, address FROM users where username = '$username' AND password = '$password'";
        try {
            $user = $this->conn->query("$sql")->fetchAll(PDO::FETCH_ASSOC);
            return $user;
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
        }
    }

    public function handleSignup($username, $password, $email, $address, $avatar) 
    {

        try {
            // handle upload avatar  
            $uploads_dir = 'public/uploads';
            $name = basename($avatar["name"]);
            $name = str_replace(" ", "-", $name);
            $avatarPath = $uploads_dir."/".$name;
            $tmp_name = $avatar["tmp_name"];
            move_uploaded_file($tmp_name, "$uploads_dir/$name");

            $sql = "INSERT INTO users (username, password, email, address, avatar) VALUES('$username', '$password', '$email', '$address', '$avatarPath')";
            
            $user = $this->conn->query("$sql")->fetchAll(PDO::FETCH_ASSOC);
            return $user;
        }
        
        catch(PDOException $e) {
             echo "Error: " . $e->getMessage();
        }



    }

    public function checkUserExist(string $username, string $email): bool {

        $this->sql = "SELECT EXISTS(SELECT * FROM users WHERE email = '$email' OR username = '$username')";
        $result = $this->conn->query($this->sql)->fetchAll(PDO::FETCH_ASSOC);
        $response = $this->getResultCheckExist($result[0]);
        return $response;

    }

    private function getResultCheckExist($resultData)
    {
        foreach($resultData as $key => $value)
        {
            $response = $value;
        }
        return $response;
    }

    public function getUser()
    {


    }
}
