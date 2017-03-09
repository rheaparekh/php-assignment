<!DOCTYPE html>
<html>
<head> 
   <title> Complete Profile </title>
   <link rel="stylesheet" type="text/css" href="homepage.css">
</head>
<body class="background-color">

<?php 
include 'session.php';
include 'gitIgnore.php';
$branch=$college=$bio=$interests=$branchErr=$collegeErr=$bioErr=$interestsErr="" ;
$username1=$_SESSION['login_user'];
$sql="SELECT ProfileID FROM rhea_profile WHERE  username='$username1' ";


$target_dir="uploads/";
$target_file=$target_dir.basename($_FILES["profilePic"]["name"]);
$uploadOk=1;
$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
if(isset($_POST["submit"])){
   $check=getimagesize($_FILES["profilePic"]["tmp_name"]);
   if($check!==false){
       echo "file is an image - ".$check["mime"].".";
       $uploadOk=1;
   } else {
       echo "File is not an image" ;
       $uploadOk=0;
   }
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else{
     if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $target_file)) {
         echo "The file ". basename( $_FILES["profilePic"]["name"]). " has been uploaded.";
     } else {
         echo "Sorry, there was an error uploading your file.";
     }
}


 $result =mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

$count= mysqli_num_rows($result);
echo $count;
if($count==1){
  header('Location: CommonFeedPage.php');
}else{
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

    if($checkBranch && $checkCollege && $checkBio && $checkInterests && $uploadOk ==1 ){
       if($conn->connect_error){
           die("connection failed: " .$conn-> connect_error);
          }
         
         $sql="INSERT INTO rhea_profile(branch,college,bio,interests,username,image) VALUES ('$branch','$college','$bio','$interests','$username1','$target_file')";
         if($conn->query($sql) === TRUE){
            header('Location: CommonFeedPage.php');
         }else{
             echo "error: " . $conn->error;
         }$conn->close();
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
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" align="center" class="form">
        <p class="color fontsize1"> Complete Your Profile <br>

       <input type="file" name="profilePic" id="profilePic">

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
        <input type="submit" value="submit" class="button"> 

</p>
</form>
</body>
</html>
