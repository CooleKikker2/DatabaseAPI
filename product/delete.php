<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


include_once '../config/database.php';
include_once '../objects/product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $product->deleteItem($id);
    if($result){
        http_response_code(200);
        echo json_encode(
            array("message" => "Verwijderen gelukt!")
        );
    }else{
        http_response_code(404);
        // tell the user no products found
        echo json_encode(
            array("message" => "Het product dat je wilde verwijderen bestaat niet meer!")
        );
    }
}else{
    http_response_code(404);

    echo json_encode(
        array("message" => "Er is iets fout gegaan! probeer het opnieuw!")
    );
}

?>