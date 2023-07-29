<?php
  require_once('../../db/db.php');

  // ini_set('display_errors', 0);
  // error_reporting(E_ALL);

	session_start();
	if (!isset($_SESSION['userId'])){
		header('location:../../login/index.php');
	}
  $userId = $_SESSION['userId'];
  $clubId = $_GET['clubId'];

  $query = "INSERT INTO clubmember (clubId, userId, clubRole, status) VALUES('$clubId', '$userId', 'member', 'pending');";
  $create_query = mysqli_query($conn,$query);
  
  if($create_query){
    echo 'successful';
    $_SESSION['join_club'] = "Request Successful!";
    $_SESSION['message'] = "Wait for Admin Approval!";
    $_SESSION['Status'] = "success";
    header("location:index.php?clubId=$clubId");
  }else{
    echo 'failed';
  }
?>