<!DOCTYPE html>
<html>
<head> 
   <title> Complete Profile </title>
   <link rel="stylesheet" type="text/css" href="homepage.css">
</head>
<body class="background-color">

<?php 
  include 'session.php';
  $branch=$college=$bio=$interests=$branchErr=$collegeErr=$bioErr=$interestsErr="" ;
$username1=$_SESSION['login_user'];
if($_SERVER["REQUEST_METHOD"] =="POST"){
      $branch=input_data($_POST["branch"]);
      $college=input_data($_POST["college"]);
      $bio=input_data($_POST["bio"]);
      $interests = input_data($_POST["interests"]);

      function check_branch(){
         if(empty($_POST["branch"])){
             $branchErr="required branch";
             echo $branchErr;
         }else{
            $branch=input_data($_POST["branch"]);
            return 1;
         }
       }

      function check_college(){
         if(empty($_POST["college"])){
              $collegeErr="required college";
              echo $collegeErr;
          }else{
             $college=input_data($_POST["college"]);
             return 1;
          }
       }

      function check_bio(){
        if(empty($_POST["bio"])){
             $bioErr="required bio";
             echo $bioErr;
        }else{
            $bio=input_data($_POST["bio"]);
            return 1;
        }
      }

      function check_interests(){
           if(empty($_POST["interests"])){
                 $interestsErr="required interests";
                 echo $interestsErr;
           }else{
                $interests = input_data($_POST["interests"]);
                return 1;
           }
       }

      $checkBranch=check_branch();
      $checkCollege=check_college();
      $checkBio=check_bio();
      $checkInterests=check_interests();

      if($checkBranch && $checkCollege && $checkBio && $checkInterests ==1){
         include 'gitIgnore.php';
         if($conn->connect_error){
           die("connection failed: " .$conn-> connect_error);
          }
         $sql="INSERT INTO rhea_profile(branch,college,bio,interests,username) VALUES ('$branch','$college','$bio','$interests','$username1')";
         if($conn->query($sql) === TRUE){
            header('Location: CommonFeedPage.php');
         }else{
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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" align="center" class="form">
        <p class="color fontsize1"> Complete Your Profile 

        <br>
        
        <input type="text" name="branch" Placeholder="Input field( Branch)" class="div1" id="branch" >
        <span class="error"> <?php echo $branchErr ;?> </span>
        <br> 

        
        <input type="text" name="college" Placeholder="Input field( College)" class="div1" id="college" >
        <span class="error"> <?php echo $collegeErr ;?> </span>
        <br>
        
      
        <input type="text" name="bio" Placeholder="Input field (Bio)" class="div1" id="bio"> 
        <span class="error"> <?php echo $bioErr ;?> </span>
        <br>
        
      Interests: <br>
        <textarea name="interests" id="interests" rows="3" cols="50" > 
        </textarea>
        <br>
        
        <span class="error" > <?php echo $interestsErr ;?> </span>
        
        <input type="Reset" value="Reset" class="button"> &emsp;
        <input type="Submit" value="Submit" class="button"> 

</p>
</form>
