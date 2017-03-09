<?php 

   $cookie_name="randomkey";
   if(!isset($_COOKIE[$cookie_name])){
     header('Location: login.php');
     
   }
?>
