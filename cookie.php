<?php 

   $cookie_name="randomkey";
   if(!isset($_COOKIE[$cookie_name]) && !isset($_SESSION['login_user'])){
     header('Location: login.php');
     
   }
?>
