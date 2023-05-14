<?php

$jsonString = file_get_contents('../book/bookdata.json');
$jsonData = json_decode($jsonString, true);

$host = 'localhost';
$dbname = 'bookstore_project_books';
$user = 'root';
$password = '';

$con = new mysqli($host, $user, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

foreach ($jsonData as $item) {
    $author = $item['author'];
    $title = $item['title'];
    $filename = $item['image_filename'];
    $description = $item['description'];
    $isbn = $item['ISBN'];
    $price = $item['price'];
    $genre=$item['genre'];
    $quantity=$item['quantity'];
    $query = "INSERT INTO books (title, author, image_filename, description, ISBN, price,genre,quantity) VALUES ('$title', '$author', '$filename', '$description', '$isbn', '$price','$genre','$quantity')";

    if ($con->query($query) === false) {
        echo "Error inserting data: " . $con->error;
    }
}

$con->close();

?>
