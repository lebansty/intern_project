<?php

include "db.php";

$email = $_POST['email'];
$pass = $_POST['password'];

$sql = "SELECT * FROM `users` WHERE `email`='$email'";
$query = mysqli_query($conn, $sql);
// First check email exists or not
if (mysqli_num_rows($query)>0) {
    // Email exists
    $data = mysqli_fetch_assoc($query);
    if(password_verify($pass,$data['pass'])){
        echo "Logged in";
    }else{
        echo "Incorrect password";
    }
   
}else{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Oops!</strong> Login failed
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>