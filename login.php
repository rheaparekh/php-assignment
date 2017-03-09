<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="http://webwonks.org/WebBuilding/images/lg_favicon.gif" type="image" sizes="20x20">
    <link rel="stylesheet" type="text/css" href="homepage.css">
</head>
<body class="background-color">

<?php
 session_start();
 if(isset($_COOKIE[$username_login])){
      header('Location: CompleteProfile.php');
 }elseif(isset($_SESSION['login_user'])){
     header('Location: CompleteProfile.php');
}else{
 $username_login=$password_login=$Error="";
 if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username_login=input_data($_POST["username1"]);
        $password_login=input_data($_POST["password1"]);
        $remember_me=input_data($_POST["remember_me"]);
        include 'gitIgnore.php';
 
        if($remember_me==true){
          $cookie_name="randomkey";
          $cookie_value="key";
          setcookie($cookie_name,$cookie_value, time()+(86400*10),"/");
        } 

        $sql="SELECT  ID FROM rhea_signup WHERE  Username='$username_login' and Password='$password_login' ";
        $result =mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

        $count= mysqli_num_rows($result);

        if($count==1){
          $_SESSION['login_user']=$username_login;
          header('Location: CompleteProfile.php');
        }else{
           $Error="invalid username or password";
        }
  }
}

function input_data($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}


?>


<form align="center" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  class="form" onsubmit="return allChecks()">
    <p class="color fontsize1">
       <a class="color fontsize1 noUnderline" href="homepage.php"> Signup </a>
        Login 
    </p>
    <br><br>

    <input type="text" name="username1" Placeholder="Input field (username)" class="div1" id="username1" >
    <br>
    <span > <?php echo $Error; ?> </span>
    <br><br>

    <input type="password" name="password1" maxlength="11" placeholder="Input field (Password)" class="div1"  id="textPassword">
    <br><br>

    <label><input type="checkbox" id="remember_me" name="remember_me" > Remember me</label>

    <br><br>
    <input type="Reset" value="Reset" class="button"> &emsp;
    <input type="Submit" value="Submit" class="button">

    </p>
</form>
</body>
</html>
