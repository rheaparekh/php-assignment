<?php 
    
  include('gitIgnore.php');
  session_start();

  $user_check=$_SESSION['login_user'];

  $user_sql=mysqli_query($conn,"SELECT Username FROM rhea_signup WHERE Username='$user_check' ");

  $row =mysql_fetch_array($user_sql,MYSQLI_ASSOC);

  $login_session=$row['Username'];

  if(!isset($_SESSION['login_user'])){
    header("Location: login.php");
  }
?>
