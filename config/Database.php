<?php 
  class Database {
      //DB params
      private $host     = 'localhost';
      private $db       = 'myblog';
      private $username = 'root';
      private $password = '';
      private $conn;

      //DB Connect
      public function connect(){
          $this->conn = null;

          try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch(PDOException $e) {
            echo 'connection error' . $e->getMessage(); 
          }
          return $this->conn;
      }
  }
?>