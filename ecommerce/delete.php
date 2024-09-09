<?php

 include_once("helpers/dbConnection.php");
if(!isset($_GET['user_id'])){
    header('location: index.php');
}

 $id =$_GET['user_id'];
$conn =connectToDB();
$result =$conn->query("DELETE FROM users WHERE id =$id ");
if($result){
   
  header("location: index.php");
}

?>