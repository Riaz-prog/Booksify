<?php
$id = $_POST['id'];
$con = new mysqli("localhost", "root", "", "bookstore_project_bookreviews");
if ($con) {
    $con->query("DELETE FROM comments WHERE id='$id'");
}
?>