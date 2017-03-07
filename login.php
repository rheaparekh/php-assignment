<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="http://webwonks.org/WebBuilding/images/lg_favicon.gif" type="image" sizes="20x20">
    <link rel="stylesheet" type="text/css" href="homepage.css">
</head>
<body class="background-color">

<?php
 session_start();
 $email_login=$password_login=$Error="";
 if($_SERVER ["REQUEST_METHOD"] == "POST"){
        $email_login=input_data($_POST["Email"]);
        $password_login=input_data($_POST["password1"]);
        include 'gitIgnore.php';
        echo "connection set up";

        $sql="SELECT  ID FROM rhea_signup WHERE  Email='$email_login' and Password='$password_login' ";
        $result =mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

        $count= mysqli_num_rows($result);

        if($count==1){
          $_SESSION['login_user']=$email_login;
          header('Location: CommonFeedPage.php');
        }else{
           $Error="invalid email or password";
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

    <input type="text" name="Email" Placeholder="Input field (Email)" class="div1" id="Email" >
    <br>
    <span > <?php echo $Error; ?> </span>
    <br><br>

    <input type="password" name="password1" maxlength="11" placeholder="Input field (Password)" class="div1"  id="textPassword">
    <br><br>

    <label><input type="checkbox" id="checkbox" > Remember me</label>

    <br><br>
    <input type="Reset" value="Reset" class="button"> &emsp;
    <input type="Submit" value="Submit" class="button">

    </p>
</form>
</body>
</html>
