<?php
session_start();
class DBclasses
{
    public $conn;

    public function connect()
    {
        if (!$this->conn) {
            $this->conn = mysqli_connect("localhost", "root", "", "robotics");

            if (!$this->conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            mysqli_query($this->conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
            mysqli_query($this->conn, "set names 'utf8'");
            mysqli_set_charset($this->conn, "utf8");
        }
    }

    public function disconnect()
    {
        if ($this->conn) {
            mysqli_close($this->conn);
            $this->conn = null;
        }
    }

    public function query($sql)
    {
        $this->connect();
        $result = mysqli_query($this->conn, $sql);
        $this->disconnect();

        return $result;
    }

    public  function prepare($sql)
    {
        $this->connect();
        $stmt = mysqli_prepare($this->conn, $sql);
        return $stmt;
    }
    public function isUserLogin()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        }else {
            return false;
        }
    }
    public function logout() {
        session_destroy();
        header('Location: login.php');
        exit;
    }
}