<?php
$con = new mysqli("localhost", "root", "", "bookstore_project_login_join");
if (!$con) {
  die("Connection failed: " . $con->connect_error);
}
?>