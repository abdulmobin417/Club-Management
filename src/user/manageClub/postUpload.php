<?php
  require_once('../../db/db.php');
  session_start();

  $userId = $_SESSION['userId'];
  $clubId = $_GET['clubId'];

  $eventName = $_POST['name'];
  $eventTitle = $_POST['title'];
  $eventDate = $_POST['date'];
  $eventImage = '../../images/'.$_POST['img'];
  $eventDescription = $_POST['description'];

  $query = "INSERT INTO clubevent (clubId, userId, eventName, eventTitle, eventDate, eventIamge, eventDescription, participant, status) VALUES($clubId, $userId, '$eventName', '$eventTitle', '$eventDate', '$eventImage', '$eventDescription', 0, 'pending');";
  $create_query = mysqli_query($conn,$query);

  if($create_query){
    header("location:adminManage.php?clubId=$clubId");
  }else{
    echo "unsuccessfull";
  }

?>