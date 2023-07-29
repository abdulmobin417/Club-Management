<?php
  require_once('../../db/db.php');
  // ini_set('display_errors', 0);
  // error_reporting(E_ALL);
	session_start();
	if (!isset($_SESSION['userId'])){
		header('location:../../login/index.php');
	}
  $userId = $_GET['userId'];
  $clubId = $_GET['clubId'];

  $updateQuery = "UPDATE clubmember SET status = 'approved' WHERE clubId = $clubId AND userId = $userId;";
  $updateClubQuery = mysqli_query($conn, $updateQuery);
  
  if($updateClubQuery){
    header("location:adminManage.php?clubId=$clubId");
  }else{
    echo 'failed';
  }

?>