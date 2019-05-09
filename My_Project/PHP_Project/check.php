<?php
  session_start();
  if($_SESSION['email'] != "" && $_SESSION['password'] != ""){
      header('location:myprofile.php');
  }else{
      header('location:login.html');
  }

?>