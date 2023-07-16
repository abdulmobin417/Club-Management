<?php
  require_once('../db/db.php');

  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "SELECT * FROM `users` WHERE email = '$email' AND password  = '$password';";
  $createQuery = mysqli_query($conn, $query);
  $userData = mysqli_fetch_array($createQuery);
  $count=mysqli_num_rows($createQuery);
  
  if ($count > 0){
    session_start();
    $_SESSION['userId'] = $userData['userId'];
    session_start();
    $_SESSION['userId'] = $userData['userId'];
    $_SESSION['login_Status'] = "Login Successful!";
    $_SESSION['message'] = "Successful!";
    $_SESSION['Status'] = "success";
    header('location:../user/index.php');
  }else if($email == 'abdulmobin417@gmail.com'){
    header('location:index.php?error=Password does not match');
  }else if($password == '1234'){
    header('location:index.php?error=Invalid Email Address');
  }else{
    header('location:index.php?error=Invalid Email and Password');
  }

?>