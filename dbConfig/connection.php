<?php
class User
{
    //header("Access-Control-Allow-Origin: *");
    /* [DATABASE HELPER FUNCTIONS] */
    private $pdo = null;
    private $stmt = null;
    public $error = "";

    function __construct()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_DB . ";charset=" . DB_CHAR,
                DB_USER, DB_PASS, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    function __destruct()
    {
        if ($this->stmt !== null) {
            $this->stmt = null;
        }
        if ($this->pdo !== null) {
            $this->pdo = null;
        }
    }

    function query($sql, $cond = [])
    {
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($cond);
        } catch (Exception $ex) {
            $this->error = $ex->getMessage();
            return false;
            //return $this->error;
        }
        $this->stmt = null;
        return true;
    }

    function getUsers(){
        $this->stmt = $this->pdo->prepare("SELECT * FROM users");
        $this->stmt->execute();
        return $this->stmt->fetchAll();
    }

    function createUser($username, $email, $password, $birthdate, $phone, $url)
    {
        return $this->query(
            "INSERT INTO `users` (`username`, `email`, `password`, `birthdate`, `phone_number`, `url`) VALUES (?,?,?,?,?,?)",
            [$username, $email, $password, $birthdate, $phone, $url]
        );
    }

    function getUserId($id)
    {
        $this->stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $this->stmt->execute([$id]);
        return $this->stmt->fetchAll();
    }

    function deleteUser($id){
        return $this->query(
            "DELETE FROM `users` WHERE `id`=?",
            [$id]
        );
    }

}
