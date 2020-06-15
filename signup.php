<?php	
/*connection*/	 
include "connection.php";

/*Cheacking request type*/
$name=$fathers_name=$email_id=$mobile_no=$dob=$location=$user_pass=$user_repeatpass=$profile_pic=$qualification=$profession="";
$messg=$messg1=$messg2=$messg3=$messg4=$messg5=$messg6=$messg7=$messg8=$messg9="";
if($_SERVER["REQUEST_METHOD"]== "POST")
	 {
		 $name=$_POST["name"];
		 $fathers_name=$_POST["fathers_name"];
		 $email_id=$_POST["email_id"];
		 $mobile_no=$_POST["mobile_no"];
		 $user_pass=$_POST["user_pass"];
		 $user_repeatpass=$_POST["user_repeatpass"];
		 $dob=$_POST["dob"];
		 $location=$_POST["location"];
		 $qualification=$_POST["qualification"];
		 $profession=$_POST["profession"];
	 }	

/*image upload----->*/	 
$target_dir = "profilePic/";
$target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
  if($check !== false) {
    $messg= "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    $messg1= "File is not an image.<br>";
    $uploadOk = 0;
  }
}


// Check file size
if ($_FILES["profile_pic"]["size"] > 1048576) {
  $messg3= "Sorry, your file is too large, it should be less than 1MB.<br>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $messg4= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $messg5= "Sorry, your file was not uploaded.<br>";
} 

//chech already exist or not
    $sql = "SELECT email_id FROM volunteer where email_id='$email_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    $messg8="This Email-id is already used<br>";
    $messg9="Try to sugnUp with another Email-id<br>";
	$uploadok = 0;
    }
	
// if everything is ok, try to upload file
else {
  if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
	//data uploading in database
	$profile_pic=basename( $_FILES["profile_pic"]["name"]);
	
	//INSERT RECORD
    $sql = "INSERT INTO volunteer (name,fathers_name,dob,email_id,mobile_no,location,user_pass,user_repeatpass,qualification,profession,profile_pic)
    VALUES ('$name','$fathers_name','$dob','$email_id','$mobile_no','$location','$user_pass','$user_repeatpass','$qualification','$profession','$profile_pic')";
  
if ($conn->query($sql) === TRUE) {
header("Location:login.html");
} else {
  $messg6= "Error: " . $sql . "<br>" . $conn->error . "<br>" ;
}
$messg7= "The file ". basename( $_FILES["profile_pic"]["name"]). " has been uploaded.<br>";
	
  } else {
    $messg8= "Sorry, there was an error uploading your file.<br>";
  }
}
$conn->close();
?>  


<html><head><title>Aapan Sahyog</title>
<link rel="icon" href="images/icon.png" type="image/png">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link href="css/style_index.css" rel="stylesheet" type="text/css">
<style>
.messg{
	text-align:center;
	margin-top:20%;
	color:red;
	font-family: "Raleway", sans-serif;
}
.button{
	border-radius: 50px;
  background-color: #3C589C;
  border: 1.5px solid white;
  color: #FFFFFF;
  text-align: center;
  font-size: 20px;
  padding:auto;
  width: 200px;
  height:50px;
  transition: all 0.3s;
  cursor: pointer;
  margin: 15px;
  box-shadow: 0 0 10px 1.5px gray;
  outline: none; /* Remove outline */
	width:170px;
	font-size:17px;
	background-color:red;
}
.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
  border-radius:100%;
}

.button span:after {
  content: '<<';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}


</style>
</head><body>
<div class="messg"><?php echo $messg1 . $messg2 . $messg3 . $messg4 . $messg5 . $messg6 .$messg7. $messg8. $messg9?>
<a href="login.html"><br><br><button class="button"><span>Go Back</span></button></div></a>
</body></html>
