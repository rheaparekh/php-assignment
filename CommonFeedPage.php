<!DOCTYPE html>
<html>
<head>
  <title> feed </title>
</head>
<?php
include 'session.php';
include 'cookie.php';
$comment=$username1=$timeStamp="";
$cookie_value=$_COOKIE['randomkey'];
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
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'gitIgnore.php';
    $comment= test_input($_POST["comment_user"]);
    $timeStamp=date('Y-m-d H:m:s');
    $sql="INSERT INTO rhea_feed(Username,comment,timeStamp) VALUES ('$username1','$comment','$timeStamp');";

    if($conn->query($sql) === TRUE){
             echo "success";
    } else {
        echo "error: " . $conn->error;  
    }$conn->close();
    }


function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}
?>

<body>
   <h1> Feed Page  </h1>
    <a href="profile.php">  Profile  </a>
    &emsp;
    <a href="Logout.php"> Logout </a><br> <br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Comment:
    <br>
    <textarea id="comment_user" name="comment_user" cols="100" rows="5"> </textarea>
    <br> <br>
    <input type="submit" name="submit" value="submit">
</form>


<?php 
include 'gitIgnore.php';
$sql1="SELECT Username,comment,timeStamp FROM rhea_feed";
$result1=$conn->query($sql1);

if($result1->num_rows >0){
      echo"<table> <tr> <th> time </th><th> username </th><th>comment</th></tr>";
      while($row=$result1->fetch_assoc()){
          echo "<tr><td>" . $row["timeStamp"]."</td><td>".$row["Username"]."</td><td>".$row["comment"]."</td></tr>";
      }
      echo "</table>";
 } else{
   echo "no results";
 }

$conn->close();

?>
</body>


</html>
