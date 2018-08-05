<?php
  class Post {
    //DB STuff
    private $conn;
    private $table = 'posts';

    //post properties
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;

    //constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    //Get Posts
    public function read(){
        //create query
        $query = 'SELECT
                    c.name as category_name,
                    p.id,
                    p.category_id,
                    p.title,
                    p.body,
                    p.author,
                    p.created_at
                  FROM 
                    '. $this->table .' p 
                  LEFT JOIN
                    categories c ON p.category_id = c.id 
                  ORDER BY
                    p.created_at DESC';
        //Prepare Statement
        $stmt = $this->conn->prepare($query);

        //Execute query
        $stmt->execute();

        return $stmt;
    }

    // Get Single Posts
    public function read_single(){
        //create query
        $query = 'SELECT
                    c.name as category_name,
                    p.id,
                    p.category_id,
                    p.title,
                    p.body,
                    p.author,
                    p.created_at
                  FROM 
                    '. $this->table .' p 
                  LEFT JOIN
                    categories c ON p.category_id = c.id 
                  ORDER BY
                    p.created_at DESC
                  WHERE
                  p.id = ?
                  LIMIT 0,1';

        //Prepare Statement
        $stmt = $this->conn->prepare($query);

        //Bind ID
        $stmt->bindParam(1, $this->id);

        //Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        //set property
        $this->title = $row['title'];
        $this->body = $row['body'];
        $this->author = $row['title'];
        $this->category_id = $row['category_id'];
        $this->category_name = $row['category_name'];

    }
  }
?>