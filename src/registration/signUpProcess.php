<?php
  require_once('../db/db.php');

  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
  $img = '../images/' . $_FILES['file']['name'];

  if($password == $confirmPassword){
    $query = "INSERT INTO users (FirstName, LastName, phone, email, password, image) VALUES('$firstName', '$lastName', '$phone', '$email', '$password', '$img');";
    $create_query = mysqli_query($conn,$query);

    if($create_query){
      $userDetails = "SELECT * FROM `users` WHERE email = '$email';" ;
      $result = mysqli_query($conn, $userDetails);
      $userData = mysqli_fetch_array($result);
      session_start();
      $_SESSION['userId'] = $userData['userId'];
      $_SESSION['login_Status'] = "Registration Successful!";
      $_SESSION['message'] = "Successful!";
      $_SESSION['Status'] = "success";
      header('location:../user/index.php');
    }else{
      echo "unsuccessfull";
    }
  }else{
    header("location:index.php?error=Password doesn't match with confirm password.");
  }

?>
