<?php
require "Core/Database.php";
$config = require("config.php");

$db = new Database($config);

$query = "SELECT * FROM borrowed_books where id = :id";
$params = [ ":id" => $_GET["id"]];
$db = new Database($config);
$book = $db
        ->execute($query, $params)
        ->fetch();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = "UPDATE books SET availability = availability+1 WHERE id = :book_id;
                DELETE FROM borrowed_books WHERE id = :id;";
    $params = [ ":user_id" => $_SESSION["user_id"],
                ":book_id" => $_GET["id"]];
    $db->execute($query, $params);
}
header("Location: /");
die();
?>