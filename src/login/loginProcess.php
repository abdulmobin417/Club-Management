<?php
  $email = $_POST['email'];
  $password = $_POST['password'];
  // echo $email . ' ' . $password;

  if($password == '1234' && $email == 'abdulmobin417@gmail.com'){
    header('location:../user/index.php');
  }else if($email == 'abdulmobin417@gmail.com'){
    header('location:index.php?error=Password does not match');
  }else if($password == '1234'){
    header('location:index.php?error=Invalid Email Address');
  }else{
    header('location:index.php?error=Invalid Email and Password');
  }
?>