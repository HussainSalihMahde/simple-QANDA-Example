<?php
 session_start();

 $con = mysqli_connect('localhost','root','','OWNER');

 $c = $_POST['comment'];
 $e = $_SESSION['email'];
 if($e != ""){
 $sql = "INSERT INTO comments (id,email,comment) VALUES(NULL,'$e','$c')";

 if(mysqli_query($con,$sql)){
     header('location:index.html');
 }else{
     echo 'An Error Occur';
 }

}

?>
