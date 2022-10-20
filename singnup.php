<?php
include "db.php";
$firstname = $_POST['firstName'];
$lastname =$_POST['lastName'];
$email = $_POST['email'];
$pass = $_POST['password'];

$sql = "SELECT * FROM `users` WHERE `email`='$email'";
$query = mysqli_query($conn, $sql);
// First check email exists or not
if (mysqli_num_rows($query)>0) {
    // Email exists
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Oops!</strong> Email already exists.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}else{
    // If email not exists
    // Check both passwords matches or not
    // if ($pass == $cpass) {
        // Password match here
        // Store password in incrypted form
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $sql1 = "INSERT INTO `users`( `firstname`, `lastname`, `email`, `pass`) VALUES ('$firstname','$lastname','$email','$hash')";
        $query1 = mysqli_query($conn, $sql1);
        // If account created
        if ($query1) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> Account has been created! you can <a href="login.php">Login now</a>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        } else {
        //    If account not created (SErver problem will be here)
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Oops!</strong> Server is busy.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        }
        
//     } else {
//        // Password not match here
//        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
//     <strong>Oops!</strong> Passwords not matched.
//     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//   </div>';
    
    
}

?>