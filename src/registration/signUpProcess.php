<?php
  // echo "Hello";
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];

  echo $firstName . ' ' . $lastName . ' ' . $phone . ' ' . $email . ' ' . $password . ' ' . $confirmPassword;
?>