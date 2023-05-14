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
        width:20%;
    }
    .card-header{
        background-color:goldenrod;
    }
    @media only screen and (max-width:550px){
        .nav{
            width:980px !important;
        }
    }
    @media only screen and (min-width:551px) and (max-width:942px){
        .nav{
            width:1000px !important;
        }
    }
    #search{
        display:block;
    }
    #search1{
        display:block;
    }

    
</style>
</head>
<body>
<?php 
$con=new mysqli("localhost","root","","bookstore_project_login_join");
if($con){
    $search_term = $_POST['search'];
    $search_term = strtolower($search_term);
    $sql = "SELECT * FROM users WHERE lower(username) LIKE '%{$search_term}%'";
    $r=$con->query($sql);
    if ($r->num_rows > 0) {
        echo '<table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';
        while ($result = $r->fetch_assoc()) {
            echo '<tr>
                    <td>' . $result['id'] . '</td>
                    <td>' . $result['username'] . '</td>
                    <td>' . $result['email'] . '</td>
                    <td>' . $result['created_at'] . '</td>
                    <td>
                    <button type="submit" class="btn btn-danger" id="user-delete" data-del="' . $result['id'] . '">Delete</button>
                    </td>
                </tr>';
        }
        echo '</tbody></table>';
    }else{
        echo '
      <div class="msgcon"><div class="msg3">
         No User found
        </div></div>';
      }
}


?>
</body>
</html>