<?php
require_once('config.php');


///login validate
function Login($email, $password) {
  global $con;
  $email = $con->real_escape_string($email);
  $password = $con->real_escape_string($password);
  $sql="SELECT * FROM users WHERE email='$email'";
  $result = $con->query($sql);
  if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    $password = password_verify($password,$user['password']);
    if($password){
      return true;
    }else{
      return false;
    }
    
  } else {
    return false;
  }
}
//admin 
function Admin($email, $password) {
  global $con;
  $email = $con->real_escape_string($email);
  $password = $con->real_escape_string($password);
  $sql="SELECT * FROM admin WHERE email='$email'";
  $result = $con->query($sql);
  if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    if($password==$user['password']){
      return true;
    }else{
      return false;
    }
    
  } else {
    return false;
  }
}
function getAdminName($email) {
  global $con;
  $email = $con->real_escape_string($email);
  $sql="SELECT username FROM admin WHERE email ='$email'";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  return $row['username'];
}

//user id

function getId($email) {
  global $con;
  $email = $con->real_escape_string($email);
  $sql = "SELECT id FROM users WHERE email = '$email'";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  return $row['id'];
}


// register


function Register($name, $email, $password) {
  global $con;
  
  $name = $con->real_escape_string($_POST['name']);
  $email = $con->real_escape_string($_POST['email']);
  $sql="SELECT * FROM users where email='$email'";
  $r=$con->query($sql);
  if($r->num_rows>0){
    return 2;
  }
  $password = $con->real_escape_string($_POST['password']);
  $password=password_hash($password,PASSWORD_DEFAULT);
  $query = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$password')";
  $result = $con->query($query);

  if ($result) {
    return 1;
  } else {
    return 0;
  }
}


function getName($email) {
  global $con;
  $email = $con->real_escape_string($email);
  $sql="SELECT username FROM users WHERE email ='$email'";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  return $row['username'];
}


function Register1($name, $email, $password) {
  global $con;
  $name = $con->real_escape_string($name);
  $email = $con->real_escape_string($email);
  $password = $con->real_escape_string($password);

  // Hash the password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // Insert the user into the database
  $query = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$password')";
  $result = $con->query($query);

  if ($result) {
    // User registration successful
    return true;
  } else {
    // User registration failed
    return false;
  }
}

function postcommnetId($id) {
  global $con;
  $email = $con->real_escape_string($id);
  $sql = "SELECT email FROM users WHERE id = '$id'";
  $result = $con->query($sql);
  if($result->num_rows>0){
    $r=$result->fetch_assoc();
    return $r['email'];
  }else{
    return "0";
  }
}
function checkiftaken($name){
  $con=new mysqli("localhost","root","","project_bookreviews");
  $name=$con->real_escape_string($name);
  $sql="SELECT * FROM comments where name='$name'";
  $r=$con->query($sql);
  if($r->num_rows>0){
    return "name is already taken";
  }
  return 1;
  
}