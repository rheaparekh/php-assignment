<!DOCTYPE html>
<html>
<head> 
   <title> Update Profile </title>
</head>

<?php 
   include 'session.php';
   include 'gitIgnore.php';

   $name=$profilepic=$gender=$email=$branch=$college=$bio=$interests="";
   $username1=$_SESSION['login_user'];

   $inputName=$inputEmail=$inputBranch=$inputBio=$inputInterests=$inputProfile="";

    $sql="SELECT name,Email FROM rhea_signup WHERE Username='$username1' ";
    $result1=$conn->query($sql);
    if($result1->num_rows >0){
        while($row=$result1->fetch_assoc()){
                $name= $row["name"]; 
                $email= $row["Email"];
         }
     }
    
    $sql1="SELECT branch,college,bio,interests,image FROM rhea_profile WHERE username='$username1' ";
    $result2=$conn->query($sql1);
    if($result2->num_rows >0){
         while($row=$result2->fetch_assoc()){
                $branch= $row["branch"]; 
                $college=$row["college"];
                $bio= $row["bio"];
                $interests=$row["interests"];
                $profilepic=$row["image"];
         }
     }
   if($_SERVER["REQUEST_METHOD"] =="POST"){
        $inputName=input_data($_POST["name1"]);
        $inputEmail=input_data($_POST["email"]);
        $inputBranch=input_data($_POST["branch"]);
        $inputBio=input_data($_POST["bio"]);
        $inputInterests=input_data($_POST["interests"]);
        
        
        $target_dir="uploads/";
        $target_file=$target_dir.basename($_FILES["profilepic"]["name"]);
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
        }else{
           if (move_uploaded_file($_FILES["profilepic"]["tmp_name"], $target_file)) {
               echo "The file ". basename( $_FILES["profilepic"]["name"]). " has been uploaded.";
            } else {
               echo "Sorry, there was an error uploading your file.";
             }
        }

        if($uploadOk==1){
            $sql1="UPDATE rhea_signup SET name='$inputName',Email='$inputEmail' WHERE Username='$username1' ";
            $sql2="UPDATE rhea_profile SET branch='$inputBranch',bio='$inputBio',interests='$inputInterests',image='$target_file' WHERE username='$username1' ";
            if($conn->query($sql1)===TRUE and $conn->query($sql2)===TRUE){
                echo "Profile Updated Successfully";
             }
         }else{
           $sql1="UPDATE rhea_signup SET name='$inputName',Email='$inputEmail' WHERE Username='$username1' ";
           $sql2="UPDATE rhea_profile SET branch='$inputBranch',bio='$inputBio',interests='$inputInterests' WHERE username='$username1' ";
           if($conn->query($sql1)===TRUE and $conn->query($sql2)===TRUE){
                      echo "Profile Updated Successfully";
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
<h2> Update Profile </h2>
<form enctype="multipart/form-data"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
     Name:<br>
     <input type="text" value="<?php echo $name ?>" id="name1" name="name1" >
     <br><br>
     Email:<br>
     <input type="text" value="<?php echo $email ?>" id="email" name="email">
     <br><br>
     Branch: <br>
     <input type="text" value="<?php echo $branch ?>" id="branch" name="branch" >
     <br><br>
     Bio : <br>
     <input type="text" value="<?php echo $bio ?>" id="bio" name="bio">
     <br><br>
     Interests:<br>
     <textarea rows="6" cols="50" name="interests" id="interests"> <?php echo $interests?>
     </textarea>
     <br><br>
     Change Profile picture:<br><?php echo $profilepic?><br>
     <input type="file" name="profilepic" id="profilepic" value="<?php echo $profilepic?>"><br><br>
     <input type="submit" value="submit">
</form>
<a href="profile.php" > Profile </a>
<br>
<a href="CommonFeedPage.php"> Feed Page </a>
</html>

