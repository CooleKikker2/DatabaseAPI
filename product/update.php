<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


include_once '../config/database.php';
include_once '../objects/product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

if(isset($_GET['id']) && isset($_GET['naam']) && isset($_GET['beschrijving']) && isset($_GET['prijs']) && isset($_GET['categorie'])){
    $id = $_GET['id'];
    $naam = $_GET['naam'];
    $beschrijving = $_GET['beschrijving'];
    $prijs = $_GET['prijs'];
    $categorie = $_GET['categorie'];
    echo $product->updateItem($id, $naam, $beschrijving, $prijs, $categorie);

}else{
    http_response_code(404);
        // tell the user no products found
        echo json_encode(
            array("message" => "Er is iets fout gegaan! Probeer het nog een keer!")
        );
}
