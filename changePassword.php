<!DOCTYPE html>
<html>
<head>
   <title> Change Password </title>
</head>

<?php
 include 'session.php';
 include 'gitIgnore.php';
 include 'cookie.php';
 $saved_password=$entered_password=$new_password1=$new_password2="";
 $username1=$_SESSION['login_user'];
 if($username1==NULL){
      $sql2="SELECT from rhea_signup Username  WHERE cookies=$cookie_value";
      $result2=$conn->query($sql2);
      if($result2->num_rows >0){
              while($row=$result2->fetch_assoc()){
                  $username1=$row["Username"];
              }
       }
}

if($_SERVER["REQUEST_METHOD"] =="POST"){
     $sql="SELECT Password FROM rhea_signup WHERE Username='$username1' ";
     $result1=$conn->query($sql);
     if($result1->num_rows >0){
     while($row=$result1->fetch_assoc()){
                   $saved_password= $row["Password"]; 
        }
     }
     $entered_password=input_data($_POST["enteredPassword"]);
     $new_password1=input_data($_POST["newPassword"]);
     $new_password2=input_data($_POST["newPassword2"]);
     $hashPassword=md5($new_password1); 
     $hashEnteredPassword=md5($entered_password);
     
     if($new_password1==$new_password2){
        if($hashEnteredPassword==$saved_password){
           $sql="UPDATE rhea_signup SET Password='$hashPassword' WHERE Username='$username1' ;";
                if($conn->query($sql) === TRUE){
                           echo "Password changed";
             }
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
<p>
 Change your password:
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="password" name="enteredPassword"  id="enteredPassword"  Placeholder="Enter old password">
    <br><br>
    <input type="password" name="newPassword" id="newPassword" Placeholder="Enter New Password">
    
    <br><br>
    <input type="password" name="newPassword2" id="newPassword2" Placeholder="confirm Password">

    <br><br>
    <input type="Submit" value="Submit">
      

</p>
<a href="profile.php">  Profile </a>
 </form>      

</html>
