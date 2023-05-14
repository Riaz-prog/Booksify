<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.min.js"></script>
<style>
    .card{
        background-color:purple;
        color:WHITE;
        min-width:150px;
        margin-left:2rem;
    }
    .card-header{
        background-color:goldenrod;
    }
    #search{
        display:none;
    }
    #search1{
        display:none;
    }
</style>
</head>
<body>
<?php 
$con = new mysqli("localhost", "root", "", "bookstore_project_login_join");
$con1=new mysqli("localhost","root","","bookstore_project_books");
if ($con and $con1) {
    $sql = "SELECT COUNT(*) AS total FROM users";
    $sql1="SELECT COUNT(*) AS total1 FROM admin";
    $sql2="SELECT COUNT(*) AS total2 FROM checkout where status='pending'";
    $r = $con->query($sql);
    $r1=$con->query($sql1);
    $r2=$con1->query($sql2);
    $a = "";

    if ($r && $r1 && $r2) {
        $res = $r->fetch_assoc();
        $total = $res['total'];
        $res1 = $r1->fetch_assoc();
        $total1 = $res1['total1'];
        $res2=$r2->fetch_assoc();
        $total2=$res2['total2'];
        echo '<div class="container">
        <div class="card">
            <div class="card-header">
                Users
            </div>
            <div class="card-body">
                <p>Total number of users: '.$total.'</p>
            </div>
            </div>
    <div class="card">
        <div class="card-header">
            Admin
        </div>
        <div class="card-body">
            <p>Total number of admin: '.$total1.'</p>
        </div>
</div>
        <div class="card">
        <div class="card-header">
            Pending Orders
        </div>
        <div class="card-body">
            <p>Total number of pending orders: '.$total2.'</p>
        </div>
        </div>
</div>';
    }
}
?>
</body>
</html>

