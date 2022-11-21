<?php

include("connect.php");

$request_method = $_SERVER["REQUEST_METHOD"];
function AddUsers()
{
    global $conn;
    $data = json_decode(file_get_contents('php://input'), true);
   
    $name = $data["name"];
    $lastname = $data["lastname"];
    $id = $data["id"];
    
    $created = date('Y-m-d H:i:s');
    $modified = date('Y-m-d H:i:s');


    //echo 
    $query="INSERT INTO user (name, description, lastname, id, created, modified) VALUES('".$name."', '".$lastname."', '".$price."', '".$created."', '".$modified."')";
    
    if(mysqli_query($conn, $query))
    {
        $response=array(
            'status' => 1,
            'status_message' =>'Produit ajouté avec succès.'
        );
    }
    else
    {
        $response=array(
            'status' => 0,
            'status_message' =>'ERREUR!.'. mysqli_error($conn)
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

    ?>