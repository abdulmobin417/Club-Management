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

  $removeQuery = "DELETE FROM clubmember WHERE clubId = $clubId AND userId = $userId;";
  $removeClubQuery = mysqli_query($conn, $removeQuery);
  
  if($removeClubQuery){
    header("location:adminManage.php?clubId=$clubId");
  }else{
    echo 'failed';
  }

?>