<?php

if(isset($_POST["user_name"])){
           if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
            die();
           }
           include 'gitIgnore.php';
           $user_name=filter_var($_POST["user_name"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
           $statement=$conn-> prepare("SELECT Username from rhea_signup WHERE Username=?");
           $statement->bind_param('s',$user_name);
           $statement->execute();
           $statement->bind_result($user_name);
           if($statement->fetch()){
                     die("not available");
           }else{
               die(" available");
            }
       }
   ?>

