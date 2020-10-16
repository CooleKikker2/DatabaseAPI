<?php
class Product
{
   // database connectie en tabel-naam
   private $conn;
   private $table_name = "product";
   // object properties
   public $id;
   // constructor with $db as database connection
   public function __construct($db)
   {
       $this->conn = $db;
   }
   // read products
   function read()
   {
       // select all query
       $query = "SELECT * FROM " . $this->table_name;
       $result = $this->conn->query($query);
       return $result;
   }

   function readone($type, $value)
   {
        $query = "SELECT * FROM " . $this->table_name ." WHERE " .$type ." = ". $value;
        $result = $this->conn->query($query);
        return $result;
   }

   function deleteItem($id){
       $query = "DELETE FROM " . $this->table_name . " WHERE id=" . $id;
       $result = $this->conn->query($query);
       return $result;
   }

   function createItem($naam, $beschrijving, $prijs, $categorie){
       $query = "INSERT INTO `product` (`id`, `naam`, `beschrijving`, `prijs`, `categorie_id`, `toegevoed_op`, `gewijzigd_op`) VALUES (NULL, '$naam', '$beschrijving', '$prijs', '$categorie', now(), now())";
       $result = $this->conn->query($query);
       return $result;
    }

    function updateItem($id, $naam, $beschrijving, $prijs, $categorie){
        $query = "UPDATE `product` SET `naam`='$naam', `beschrijving`='$beschrijving', `prijs`=$prijs, `categorie_id` = $categorie, `gewijzigd_op` = now() WHERE id=$id";
        $result = $this->conn->query($query);
        return $query;
     }


}