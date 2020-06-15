<!DOCTYPE html>
<html>
<title>Apan Sahyaog</title>
<link rel="icon" href="img/favicon.png">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
	
	
	<style>
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
.vms-theme{
	background-color: rgba(13,16,29,0.8);
	color:white;
}
.w3-button{
	background-color:transparent;
}
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar vms-theme w3-left-align w3-large">
  <a href="index.php" class="w3-bar-item w3-button w3-padding-large" title="Home"><i class="fa fa-home "></i></a>
  <a href="addPeople.php" class="w3-bar-item w3-button  w3-padding-large w3-theme-d4" title="Add People"><i class="fa fa-user-plus"></i></a>
  <?php
         include "connection.php";	
         session_start();
         if(isset($_SESSION["loggedIn"])) {
	     if(!empty($_SESSION["loggedInUserId"])) {
         $id = $_SESSION["loggedInUserId"];
		 
		 $sql="SELECT * FROM volunteer where userId=".$id;
         $result = $conn->query($sql);
		 while ($row = mysqli_fetch_array($result)) {
         echo "<a href='profile.php'><img src='profilePic/".$row['profile_pic']."' class='w3-circle' style='height:50px;width:50px; float:right;padding:5px' alt='Avatar' title='Profile'></a>";
		 }}}
		 else {
	     header("Location:login.html");
		 }?>
  <button class="w3-button w3-padding-large" title="Notifications" style="float:left"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button> 
  <a href="logout.php" class="w3-bar-item w3-button  w3-padding-large w3-hover-white" title="Logout" style="float:right"><i class="fa fa-sign-out"></i></a>  
  
 </div>
</div>
<div class="logo w3-center  " style="max-width:1400px;margin-top:50px; background-color:"><img src="img/logo.png" alt="loading.."></div><br>
<!-- Page Container -->
  
<div class="row w3-center" style="padding:2% 10%;background-color:white;">
        <div class="col-lg-12 w3-center" style="box-shadow: 0 0 10px 2px gray;padding:3%;">
		<div class="col-12">
          <h2 class="contact-title">Add People</h2>
        </div>
          <form class="form-contact contact_form" action="addPeopleNext.php" method="post" id="contactForm"  enctype="multipart/form-data">
            <div class="row">
              
              <div class="col-sm-12">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter his/her name'" placeholder='Enter his/her name' required>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <input class="form-control" name="location" id="location" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter location of him/her'" placeholder='Enter location of him/her' required>
                </div>
              </div>
			  <div class="col-sm-12">
                <div class="form-group">
                  <input class="form-control" name="body_mark" id="body_mark" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Mark on Body'" placeholder='Mark on Body'required>
                </div>
              </div>
			  <div class="col-12">
                <div class="form-group">
                  <textarea class="form-control w-100" name="description" id="description" cols="30" rows="9"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'write about him/her'"
                    placeholder='write about him/her'required></textarea>
                </div>
              </div>
              </div>
			  <div class="col-sm-12">
                <div class="form-group"><p>Upload a picture of him/ her :
                  <input  name="image" id="image" type="file" required></p><br>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" name="submit" class="button button-contactForm btn_1">Upload <i class="flaticon-right-arrow"></i> </button>
            </div>
          </form>
        </div>
        </div>  

<!-- Footer -->
<footer class="w3-container w3-theme-d5 w3-center" >
  <p>Powered by: <a href="https://vmswebtech.com/" >VMSwebtech.com</a></p>
</footer>
 
</body>
</html> 
