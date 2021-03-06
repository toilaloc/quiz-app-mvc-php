<?php 

namespace app\models;
use app\config\Database;
use PDO;
use PDOException;

class Quiz extends Database
{
    public function store($question, $anser_a, $anser_b, $anser_c, $anser_other, $right_anser, $user_id, $category_id)
    {

        try {
            $sql = "INSERT INTO quiz(question, wrong_answer_a, wrong_answer_b, wrong_answer_c,other_wrong_answer, right_answer, user_id, category_id) VALUES ('$question', '$anser_a', '$anser_b', '$anser_c', '$anser_other', '$right_anser', $user_id, $category_id)";
            //$quizData = $this->conn->query("$sql")->fetchAll(PDO::FETCH_ASSOC);
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return true;
            }
            catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    public function update($id, $question, $anser_a, $anser_b, $anser_c, $anser_other, $right_anser, $user_id, $category_id)
    {
        try {
            $sql = "UPDATE quiz SET  question = '$question', wrong_answer_a = '$anser_a', wrong_answer_b = '$anser_b', wrong_answer_c = '$anser_c', other_wrong_answer = '$anser_other', right_answer = '$right_anser', category_id = $category_id, user_id = $user_id WHERE id = $id";
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
            $sql = "DELETE FROM quiz WHERE id = $id";
            $quiz = $this->conn->query("$sql")->fetchAll(PDO::FETCH_ASSOC);
            return $quiz;
            }
            catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        } 

    }

    public function getQuizGeneral()
    {
        try {
            $sql = "SELECT id, question, category_id FROM quiz LIMIT 5";
            $quizData = $this->conn->query("$sql")->fetchAll(PDO::FETCH_ASSOC);
            return $quizData;
            }
            catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    public function getAll()
    {
        try {
            $sql = "SELECT * FROM quiz";
            $category = $this->conn->query("$sql")->fetchAll(PDO::FETCH_ASSOC);
            return $category;
            }
            catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        } 
    }


    public function getQuiz($id)
    {
        try {
            $sql = "SELECT * FROM quiz WHERE id = $id";
            $quizData = $this->conn->query("$sql")->fetchAll(PDO::FETCH_ASSOC);
            return $quizData;
            }
            catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    public function getQuizForCategory($id)
    {
        try {
            $sql = "SELECT * FROM quiz WHERE category_id = $id";
            $quizData = $this->conn->query("$sql")->fetchAll(PDO::FETCH_ASSOC);
            return $quizData;
            }
            catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    public function checkQuiz($id, $answer)
    {
        try {
            $sql = "SELECT * FROM quiz WHERE id = $id AND right_answer = '$answer'";
            $quizCheck = $this->conn->query("$sql")->fetchAll(PDO::FETCH_ASSOC);
            return $quizCheck;
            }
            catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

}