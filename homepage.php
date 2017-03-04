<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="http://webwonks.org/WebBuilding/images/lg_favicon.gif" type="image" sizes="20x20">
</head>
<style>
.div1{
 height:28px;
 background-color:#202020;
 width:60%;
 border-radius:3px;
 border:none;
 box-shadow: 0px 1px 5px 1px #202020;
 color:white;
}
.button{
  width: 30%;
  height:28px;
  border-radius:1px;
  background-color:#202020;
  border:none;
  cursor:pointer;
  border-radius:2px;
  color:white;
  text-decoration:none;
  box-shadow: 0px 1px 3px 1px #202020 ;
}
.background-color{
   background-color:#202020;
}
.form{
   margin:4% 31%;
   padding: 1px;
   background: rgba(225,225,225,0.1); 
   box-shadow: 0px 2px 5px 2px; 
   border-radius:20px;
}
.color{
    color:white;
}
.fontsize1{
   font-size:50px;
}
.fontsize2{
   font-size:20px;
}
.dropdown{
 width:40%;
 height:20px;
}
.ageInput{
  width:40%;
  border-radius: 4px;
  border:none;
  height: 18px;
}
body{
  background-image: url(http://www.hvac2000.com/wp-content/uploads/2016/04/Desktop-Wallpaper-Tumblr-.jpg) ; 
}
   
</style>
<body class="background-color">


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
    function errorEducation(){
        if( document.getElementById('Education').value === '' ){
                alert('Select Education Qualification');
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


<form align="center" class="form" onsubmit="return allChecks()">
    <p class="color fontsize1"> Signup </p> 
    <input type="text" name="Email" Placeholder="Input field (Email)" class="div1" id="Email" onchange=" return errorEmail()" required="required">
    <br><br>

    <input type="text" name="Name" placeholder="Input field (Name)" class="div1" id="name" onchange="return errorName()" required="required">
    <br><br>

    <input type="number" name="Phone Number" placeholder="Phone Number" class="div1" maxlength="10" id="phoneNumber" onchange="return errorPhoneNumber()"  required="required">
    <br><br><br>

    <input type="password" name="lastname" maxlength="11" placeholder="Input field (Password)" class="div1"  id="textPassword" onchange="return errorPassword(false)" required="required">
    <br><br>

    <input type="password" name="lastname" placeholder="Confirm Password" class="div1" id="confirmPassword" onchange="return errorPassword(true)" required="required">


    <p class="color">maxlength: 11 characters</p>
    <p class="color fontsize2">
    Gender &emsp;
    <select class="dropdown"  id="gender" required="required" onchange="return errorGender()">
       <option value="" disabled selected > Select</option>
       <option value="Male" > Male</option>
       <option value="Female"> Female</option>
    </select>
    <br><br>

    Age &emsp;
    <input type= "number" name= "age" class="ageInput" max= "120" min= "18" step= "1" value= "" id="age" required="required" onchange="return errorAge()" />
    <br><br>
    <label><input type="checkbox" id="checkbox" required="required"> I agree to terms and conditions</label>

    <br><br>
    <input type="Reset" value="Reset" class="button"> &emsp;
    <input type="Submit" value="Submit" class="button">

    </p>
</form>
</body>
</html>
