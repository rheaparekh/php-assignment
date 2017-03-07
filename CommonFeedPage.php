<!DOCTYPE html>
<html>
<head>
  <title> feed </title>
</head>
<?php
include 'session.php';
$comment=$username1=$timeStamp="";
include 'gitIgnore.php';
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $comment= test_input($_POST["comment_user"]);
  }
$timeStamp=date("Y-m-d H:i:s");
$username1=$_SESSION['login_user'];
// $sql="INSERT INTO rhea_feed(Username,comment,timeStamp) VALUES ('$username1','$comment','$timestamp')";

function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}
?>

<body>
   <h1> Feed Page  </h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER ["PHP_SELF"]); ?>" align="center">
    Comment:
    <br>
    <textarea id="comment_user" name="comment_user" cols="100" rows="5"> </textarea>
    <br> <br>
    <input type="submit" name="submit" value="submit">

</form>
</body>


</html>
