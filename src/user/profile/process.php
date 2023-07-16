<?php
  require_once('../../db/db.php');
  session_start();
  $userId = $_SESSION['userId'];

  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  echo $userId . ' ' . $firstName . ' ' . $lastName . ' ' . $phone . ' ' . $email . ' ' . $password;

  function updateUserQuery($userId, $firstName, $lastName, $phone, $email, $password) {
    return "UPDATE users SET FirstName = '$firstName', LastName='$lastName', phone='$phone', email = '$email', password = '$password' WHERE userId = $userId;";
  }

  $sqlQuery = updateUserQuery($userId, $firstName, $lastName, $phone, $email, $password);

  if (mysqli_query($conn, $sqlQuery)) {
    $_SESSION['Profile_Status'] = "profile Successfully Updated!";
    $_SESSION['message'] = "Successful!";
    $_SESSION['Status'] = "success";
    header("location: index.php");
  }else {
    echo "Error: " . $sqlQuery . "<br>" . mysqli_error($conn);
  }

?>
