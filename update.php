<?php

         include "connection.php";	
         session_start();
         if(isset($_SESSION["loggedIn"])) {
	     if(!empty($_SESSION["loggedInUserId"])) {
         $id = $_SESSION["loggedInUserId"];
		 
		 $sql="SELECT * FROM volunteer where userId=".$id;
         $result = $conn->query($sql);
		 while ($row = mysqli_fetch_array($result)) {
         }}}
		 else {
	     header("Location:login.html");
		 }
$messg="";
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
		 
		 $sql = "UPDATE volunteer set name='" . $name . "', fathers_name='" . $fathers_name . "', email_id='" . $email_id . "', mobile_no='" . $mobile_no . "' ,user_pass='" . $user_pass . "' ,user_repeatpass='" . $user_repeatpass . "', dob='" . $dob . "', location='" . $location . "', qualification='" . $qualification . "', profession='" . $profession . "' WHERE userId='$id'";
	     
		 if ($conn->query($sql) === TRUE) {
         $messg="Record updated successfully!!";
		 header("location:profile.php");
         } else {
         $messg= "Error updating record: " . $conn->error;
         }
	 }

$result = mysqli_query($conn,"SELECT * FROM volunteer WHERE userId='$id'");
$row= mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Aapan sahyog</title>
<link rel="icon" href="img/favicon.png">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <script src="js/login.js"></script>
  <link href="css/login.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" class="w3-light-grey">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a href="index.php" class="w3-bar-item w3-button w3-padding-large" title="Home"><i class="fa fa-home "></i></a>
  <a href="addPeople.php" class="w3-bar-item w3-button  w3-padding-large w3-hover-white w3-theme-d4" title="Login"><i class="fa fa-sign-in"></i></a>
  
  <?php echo "<a href='profile.php'><img src='profilePic/".$row['profile_pic']."' class='w3-circle' style='height:50px;width:50px;border-radius:50%; float:right;padding:5px' alt='Avatar' title='Profile'></a>";?>
		 
  <button class="w3-button w3-padding-large" title="Notifications" style="float:left"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button> 
  <a href="logout.php" class="w3-bar-item w3-button  w3-padding-large w3-hover-white" title="Logout" style="float:right"><i class="fa fa-sign-out"></i></a>  
  
  </div>
</div>


<!--login form-->
<div id="logreg-forms" >
        
          <!--sign up--> 
		
            <form name="myForm" action="update.php"  method="POST"   onsubmit="return validate()">
			<div class="logo w3-center  " ><img src="img/logo.png" alt="loading" width=200px></div><hr>
              <p style='text-align:center;color:green'><?php echo $messg?></p>

                Name: <input type="text" id="name" name="name" class="form-control" value="<?php echo $row['name']?>" required="" autofocus="">
                Fathers Name: <input type="text" id="fathers_name" name="fathers_name" class="form-control" value="<?php echo $row['fathers_name']?>" required="" autofocus="">
                
				Email: <input type="email" id="email_id" name="email_id" class="form-control" value="<?php echo $row['email_id']?>" required autofocus="">
                Mobile: <input type="tel" id="mobile_no" name="mobile_no" class="form-control" value="<?php echo $row['mobile_no']?>" required autofocus="">
				
                Password: <input type="text" id="user_pass" name="user_pass" class="form-control" value="<?php echo $row['user_pass']?>" required autofocus="">
                Repeat Password: <input type="text" id="user_repeatpass" name="user_repeatpass"class="form-control" value="<?php echo $row['user_repeatpass']?>" required autofocus="">
                
				DOB: <input type="date" name="dob" value="<?php echo $row['dob']?>" class="form-control" autofocus="">
                Address: <input type="text" id="location" name="location" class="form-control" value="<?php echo $row['location']?>" required autofocus="">
				
                Qualification: <input type="text" class="form-control" list="qualification" name="qualification" value="<?php echo $row['qualification']?>" required autofocus="">
              <datalist id="qualification">
                <option value="PG">
                <option value="Graduate">
                <option value="HSC">
                <option value="SSC">
                <option value="below 10std">
              </datalist>
			  Profession: <input type="text" class="form-control" list="profession" name="profession" value="<?php echo $row['profession']?>" required autofocus="">
              <datalist id="profession">
                <option value="Engineer">
                <option value="Doctor">
                <option value="Lawyer">
                <option value="Teacher">
                <option value="Bussiness Man">
                <option value="Farmer">
              </datalist>
                <button class="btn btn-primary btn-block" type="submit" id="submit" name="submit" value="Submit"><i class="fa fa-edit"></i> Update</button>
                <a href="profile.php" id="cancel_update"  style="text-align:center"><i class="fa fa-angle-left"></i> Back</a>
            </form>
			<script>
				function validate() {
	var a = document.forms["myForm"]["user_pass"].value;
	var b = document.forms["myForm"]["user_repeatpass"].value;  
    if (a!==b) {
        alert("password Missmathed");
        return false;
    }
	
}
</script>		
            <br>
            
    </div>
</body>
</html>