<?php 
  session_start();
  $cookie_name="randomkey";
  $cookie_value="key";
  setcookie($cookie_name,$cookie_value,time() -3600,"/");

  if(session_destroy()){
    header("Location: login.php");
 }
?>
