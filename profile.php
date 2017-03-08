<!DOCTYPE html>
<html>
<head>
 <title> Profile Page </title>
</head>

<?php 
  $name=$gender=$email=$branch=$college=$bio=$interests="";
  include 'gitIgnore.php';
  include 'session.php';
  $username1=$_SESSION['login_user'];
  
  $sql="SELECT name,Gender,Email FROM rhea_signup WHERE Username='$username1' ";
  $result1=$conn->query($sql);
  if($result1->num_rows >0){
        while($row=$result1->fetch_assoc()){
                       $name= $row["name"]; 
                       $gender=$row["Gender"];
                       $email= $row["Email"];
  }}


  $sql1="SELECT branch,college,bio,interests FROM rhea_profile WHERE username='$username1' ";
  $result2=$conn->query($sql1);
  if($result2->num_rows >0){
            while($row=$result2->fetch_assoc()){
                         $branch= $row["branch"]; 
                         $college=$row["college"];
                         $bio= $row["bio"];
                         $interests=$row["interests"];
            }}
?>

<p> welcome to your profile </p>
name : <?php echo $name; ?>
<br>
bio: <?php echo $bio;?>
<br>
Gender:<?php echo $gender;?>
<br>
Email: <?php echo $email; ?>
<br><br>
College: <?php echo $college; ?>
<br>
Branch: <?php echo $branch; ?>
<br><br>
Interests: <?php echo $interests; ?>
<br>

</html>
 

