<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-with');


    include_once '../../config/Database.php';
    include_once '../../models/Post.php';

    // instantiate DB & Connect
    $database = new Database();
    $db = $database->connect();

    // instantiate Blog Post Object
    $post = new Post($db);

    // Get the Raw Posted Data
    $data = json_decode(file_get_contents("php://input"));

    // Set ID to update
    $post->id = $data->id;

    //Update Post
    if($post->delete()) {
        echo json_encode(
            array('message' => 'Post Deleted')
        );
    } else {
        echo json_encode(
            array('message' => 'Post Not Deleted')
        );
    }
?>