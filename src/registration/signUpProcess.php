<?php
  require_once('../db/db.php');

  $image = $_FILES['file']['name'];

  $base64Image = base64_encode(file_get_contents($image));

  // Step 6: Escape the image data
  $escaped_data = mysqli_real_escape_string($conn, $base64Image);


  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];

  // echo $file . ' ' . $firstName . ' ' . $lastName . ' ' . $phone . ' ' . $email . ' ' . $password . ' ' . $confirmPassword;

  if($password == $confirmPassword){
    $query = "INSERT INTO users (FirstName, LastName, phone, email, password, image) VALUES('$firstName', '$lastName', '$phone', '$email', '$password', '$escaped_data');";
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
