<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="http://webwonks.org/WebBuilding/images/lg_favicon.gif" type="image" sizes="20x20">
    <link rel="stylesheet" type="text/css" href="homepage.css">
</head>


<body class="background-color">

<!--
<script type="text/javascript">
    function errorEmail(){
        if( document.getElementById('Email').value === '' ){
                alert('Email empty!');
                return false;
        }
        else if (document.getElementById('Email').value !=''){
                 console.log("Entered for the email check")
                 return validateEmail(document.getElementById('Email').value);
                 console.log("Check email function")

        }
    }
    function errorUserName(){
        if(document.getElementById('username').value===''){
           alert('username empty');
           return false;
        }
        else{
           return true;
        }
    }

    function errorName(){
        if( document.getElementById('name').value === '' ){
                alert('name empty');
                return false;
           }
           else{
            return true;
           }
    }
    function errorPhoneNumber(){
        if( document.getElementById('phoneNumber').value === '' ){
                alert('Number empty');
                return false;
         }else if (document.getElementById('phoneNumber').value != ''){
                return validatePhonenumber(document.getElementById('phoneNumber').value);
         }

    }
    function errorGender(){
        if( document.getElementById('gender').value === '' ){
                alert('Select Gender');
                return false;
        }else{
          return true;
        }
    }

    function errorPassword(confirmField){
           if( document.getElementById('textPassword').value === '' ){
                alert(' Password empty');
                return false;
           }
           else if (document.getElementById('textPassword').value !=''){
                if (confirmField) {
                return validatePassword();
              } else {
                return true;
              }
           }
    }

    function validateEmail(inputText){
       var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
       console.log("entered validate email")

       if(inputText.match(mailformat)){
            return true;
       }else{
       alert("You have entered an invalid email address!");
       return false;
       }
    }
     
    function validatePassword(){
       var password = document.getElementById("textPassword").value;
       var confirmPassword= document.getElementById("confirmPassword").value;
       if(password!=confirmPassword){
          alert("Passwords do not match");
          return false;
        }else{
          return true;
        }
    }

    function validatePhonenumber(inputText){
          var phoneNumber= inputText;
          var stringLength= phoneNumber.length;
          if(stringLength!=10){
            alert("You have entered an invalid Phone Number");
            return false;
          } else{
            return true;
          }
    }

    function allChecks() {
      return errorEmail()&& errorPassword(true) && errorName() && errorGender()&& errorPhoneNumber()&&;
    }
</script>
-->


<?php


$name=$email=$gender=$username1=$number=$password1=$confirmPassword=$nameErr=$emailErr=$genderErr=$usernameErr=$numberErr=$passwordErr=$confirmPasswordErr=""; 
if($_SERVER["REQUEST_METHOD"] =="POST"){
      $name=input_data($_POST["name"]);
      $username1 =input_data($_POST["username"]);
      $gender=input_data($_POST["gender"]);
      $email = input_data($_POST["email"]);
      $password1 =input_data($_POST["password"]);

      function check_name(){
            if(empty($_POST["name"])){
                   $nameErr="required name ";
                   echo $nameErr;
            }else{
                   $name=input_data($_POST["name"]);
                   if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                         $nameErr = "Only letters and white space allowed ";
                         echo $nameErr;
                   }
                   else{
                       return 1; 
                       echo  $name;
                   } 
            }
      }


      function check_username(){
              if (empty($_POST["username"])) {
                     $usernameErr = "required username";
                     echo $usernameErr;
              } else {
                    $username1 =input_data($_POST["username"]);
                    if(strlen($username1)<5||strlen($username1)>20){
                           $usernameErr="username should be between 5-20 char";
                           echo $usernameErr;
                    }
                    else{
                      return 1;
                    }
              }
      }


     function check_email(){
          if (empty($_POST["email"])) {
                $emailErr = "required email";
                echo $emailErr;
           } else {
                  $email = input_data($_POST["email"]);
                  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                         $emailErr = "Invalid email format";
                         echo $emailErr;
                  }else{
                    return 1;
                  }
            }
      }

     function check_password(){
       if (empty($_POST["password"])) {
             $passwordErr = "required password";
             echo $passwordErr;
       }else {
                $password1 =input_data($_POST["password"]);
                if(strlen($password1)<5||strlen($password1)>20){                                               $passwordErr="password should be between 5-20 char";
                       echo $passwordErr;
                  }
                else{
        $confirmPassword=input_data($_POST["confirmPassword"]);
        echo "checking passwod";
        if($confirmPassword==$password1){
            return 1;
         }else{
             $confirmPasswordErr="Passwords dont match";
             echo  $confirmPasswordErr;
         }
    }
       }
     }
    function check_gender(){
       if(empty($_POST["gender"])){
           $genderErr="gender required";
           echo $genderErr;
        }else{
            $gender=input_data($_POST["gender"]);
            return 1;
         }
     }
    
    $checkEmail=check_email();
    $checkUsername=check_username();
    $checkName=check_name();
    $checkPassword=check_password();
    $checkGender=check_gender();


     if($checkEmail && $checkUsername && $checkName && $checkPassword  && $checkGender== 1){
       echo "save values";
       include 'gitIgnore.php';
       echo "connection established ";

       if($conn->connect_error){
             die("connection failed: " .$conn-> connect_error);
       }

       $sql="INSERT INTO rhea_signup(Email,Username,name,Password,Gender) VALUES ('$email', '$username1','$name','$password1','$gender')";
       if($conn->query($sql) === TRUE){
             header('Location: login.php');
       } else {
             echo "error: " . $conn->error;
       }$conn->close();
    }
}

function input_data($data){
     $data=trim($data);
     $data=stripslashes($data);
     $data=htmlspecialchars($data);
     return $data;
}


?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" align="center" class="form" onsubmit="return allChecks()">
    <p class="color fontsize1"> Signup 
       <a class="color  fontsize1 noUnderline" href="login.php"> Login </a>
    </p>

    <p><span class="error"> *required field </span> </p>
    <br> <br>

    <input type="text" name="email" Placeholder="Input field (Email)" class="div1" id="email" onchange=" return errorEmail()" >
    <span class="error"> * </span>
    <br>
    <span class="error"> <?php echo $emailErr ;?></span>
    <br><br>


    <input type="text" name="username" Placeholder="Input field(username)" class="div1" id="username" onchange="return errorUserName()" >
    <span class="error"> * </span>
    <br>
    <span class="error"> <?php echo $usernameErr;?> </span>
    <br><br>
    


    <input type="text" name="name" placeholder="Input field (Name)" class="div1" id="name" onchange="return errorName()" >
    <span class="error"> * </span>
    <br>
    <span class="error"> <?php echo $nameErr;?> </span>
    <br><br>


    <input type="password" name="password" maxlength="11" placeholder="Input field (Password)" class="div1"  id="textPassword" onchange="return errorPassword(false)">
    <span class="error"> * </span>
    <br>
    <span class="error"> <?php echo $passwordErr;?> </span>
    <br><br>



    <input type="password" name="confirmPassword" placeholder="Confirm Password" class="div1" id="confirmPassword" onchange="return errorPassword(true)" >
    <span class="error">*</span>
    <br>
    <span class="error"> <?php echo $confirmPasswordErr;?> </span>
    <br><br>



    <p class="color fontsize2">
    Gender :
    <input type="radio" name="gender" id="gender" value="female"> Female
    <input type="radio" name="gender" id="gender" value="male"> Male
     <br>
     <span class="error"> <?php echo $genderErr;?></span>
     <br><br>

    <br><br>
    <input type="Reset" value="Reset" class="button"> &emsp;
    <input type="Submit" value="Submit" class="button">

    </p>
</form>
</body>
</html>
