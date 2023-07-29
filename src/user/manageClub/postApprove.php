<?php
  require_once('../../db/db.php');
  // ini_set('display_errors', 0);
  // error_reporting(E_ALL);
	session_start();
	if (!isset($_SESSION['userId'])){
		header('location:../../login/index.php');
	}
  $postId = $_GET['postId'];
  $clubId = $_GET['clubId'];

  echo $postId . ' ' . $clubId;

  $updateQuery = "UPDATE clubevent SET status = 'approved' WHERE eventId = $postId;";
  $updatePostQuery = mysqli_query($conn, $updateQuery);
  
  if($updatePostQuery){
    header("location:adminManage.php?clubId=$clubId");
  }else{
    echo 'failed';
  }

?>