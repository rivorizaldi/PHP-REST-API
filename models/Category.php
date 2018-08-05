<?php
class Category {
    //DB STuff
    private $conn;
    private $table = 'categories';

    public $id;
    public $name;
    public $created_at;

    //constructor with DB
    public function __construct($db) {
        $this->conn = $db;
    }

    public function read(){
        //create query
        $query = 'SELECT 
                  *
                  FROM 
                  ' . $this->table . '
                  ORDER BY created_at DESC';

        //Prepare Statement
        $stmt = $this->conn->prepare($query);

        //Execute query
        $stmt->execute();

        return $stmt;
    }

     
}
?>