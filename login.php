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
.noUnderline{
   text-decoration: none;
}
.dropdown{
 width:40%;
 height:20px;
}
body{
  background-image: url(http://www.hvac2000.com/wp-content/uploads/2016/04/Desktop-Wallpaper-Tumblr-.jpg) ; 
}
   
</style>
<body class="background-color">




<form align="center" class="form" onsubmit="return allChecks()">
    <p class="color fontsize1">
       <a class="color fontsize1 noUnderline" href="homepage.php"> Signup </a>
        Login 
    </p>
    <br><br>

    <input type="text" name="Email" Placeholder="Input field (Email)" class="div1" id="Email"  required="required">
    <br><br>

    <input type="text" name="Name" placeholder="Input field (Name)" class="div1" id="username"  required="required">
    <br><br><br>

    <input type="password" name="password" maxlength="11" placeholder="Input field (Password)" class="div1"  id="textPassword" required="required">
    <br><br>

    <label><input type="checkbox" id="checkbox" > Remember me</label>

    <br><br>
    <input type="Reset" value="Reset" class="button"> &emsp;
    <input type="Submit" value="Submit" class="button">

    </p>
</form>
</body>
</html>
