<?php 

class Database
{
    private string $host = "localhost";
    private string $db_name = "kniznica";
    private string $username = "root";
    private string $password = "";

    private string $charset = "utf8";

    public $conn;

    public function nadviazSpojenie(){
        $this->conn = null;

        try {
           $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}; charset={$this->charset}",$this->username,$this->password);
        } catch (\PDOException $e) {
           echo  $e->getMessage();
        }
        return $this->conn;
    }
    
    

}
?>