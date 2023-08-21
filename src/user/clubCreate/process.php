<?php
  require_once('../../db/db.php');

  session_start();
  $userId = $_SESSION['userId'];

  $clubName = $_POST['clubName'];
  $clubWork = $_POST['clubWork'];
  $clubGoal = $_POST['clubGoal'];
  $clubDescription = $_POST['clubDescription'];
  $img = $_POST['clubImage'];

  // echo $clubName . ' ' . $clubWork . ' ' . $clubGoal . ' ' . $clubDescription;

  $query = "INSERT INTO clubs (userId, clubName, clubWork, clubGoal, clubDescription, image) VALUES('$userId', '$clubName', '$clubWork', '$clubGoal', '$clubDescription', '$img');";
  $create_query = mysqli_query($conn,$query);

  if($create_query){
    $_SESSION['Club_Status'] = "Club Successfully Created!";
    $_SESSION['message'] = "Successful!";
    $_SESSION['Status'] = "success";
    header('location:index.php');
  }else{
    $_SESSION['Club_Status'] = "Something Wrong!";
    $_SESSION['message'] = "Wrong!";
    $_SESSION['Status'] = "error";
    header('location:index.php');
  }
?>