<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['uname'])) {
include 'db.php';
if(isset($_GET['delete'])){
  $id=$_SESSION['id'];
  $sql= "DELETE from users WHERE id='$id'";
  $result=mysqli_query($conn,$sql);
  if($result){
    header("Location: delete_.php?success=Votre compte a été supprimé avec succès");
    exit();
  }
  }
}else{
    die(mysqli_error($conn));
}
