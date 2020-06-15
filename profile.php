<!DOCTYPE html>
<html>
<title>Aapan sahyog</title>
<link rel="icon" href="img/favicon.png">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<!-- themify CSS -->
<link rel="stylesheet" href="css/themify-icons.css">
    
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
.vms-margin{
	margin-top:0px;
	margin-bottom:15px;
	margin-right:15px;
	margin-left:15px;
}

@media screen and (max-width: 768px){
	.vms-margin{
	margin-top:0px;
	margin-bottom:15px;
	margin-right:0px;
	margin-left:0px;
}
.w3-container h4{
		font-size:17px;
	}
}
.vms-theme{
	background-color: rgba(13,16,29,0.8);
	color:white;
}
a{
	text-decoration:none;
}
.w3-button{
	background-color:transparent;
}
</style>
<body class="w3-theme-l5">
<!--php session start-->
<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar vms-theme w3-left-align w3-large">
  <a href="index.php" class="w3-bar-item w3-button w3-padding-large" title="Home"><i class="fa fa-home "></i></a>
  <a href="addPeople.php" class="w3-bar-item w3-button  w3-padding-large " title="Add People"><i class="fa fa-user-plus"></i></a>
  <?php
         include "connection.php";	
         session_start();
         if(isset($_SESSION["loggedIn"])) {
	     if(!empty($_SESSION["loggedInUserId"])) {
         $id = $_SESSION["loggedInUserId"];
		 
		 $sql="SELECT * FROM volunteer where userId=".$id;
         $result = $conn->query($sql);
		 while ($row = mysqli_fetch_array($result)) {
         echo "<a href='profile.php'><img src='profilePic/".$row['profile_pic']."' class='w3-circle' style='height:50px;width:50px;border-radius:50%; float:right;padding:5px' alt='Avatar' title='Profile'></a>";
		 }}}
		 else {
	     header("Location:login.html");
		 }?>
  <button class="w3-button w3-padding-large" title="Notifications" style="float:left"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button> 
  <a href="logout.php" class="w3-bar-item w3-button  w3-padding-large w3-hover-white" title="Logout" style="float:right"><i class="fa fa-sign-out"></i></a>  
  
 </div>
</div>
<div class="logo w3-center  " style="max-width:1400px;margin-top:50px; background-color:"><img src="img/logo.png" alt="loading"></div><br>
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:10px">    
 
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">Welcome!</h4>
		 <?php
         include "connection.php";	
         if(isset($_SESSION["loggedIn"])) {
	     if(!empty($_SESSION["loggedInUserId"])) {
         $id = $_SESSION["loggedInUserId"];
		 
		 $sql="SELECT * FROM volunteer where userId=".$id;
         $result = $conn->query($sql);
		 while ($row = mysqli_fetch_array($result)) {
         echo "<p class='w3-center'><img src='profilePic/".$row['profile_pic']."' class='w3-circle' style='height:106px;width:106px' alt='Avatar'></p>";
         echo "<p style='text-align:center'>".$row['name']."</p>";
		 echo "<p style='text-align:center'>ID: ".$row['userId']."</p><hr>";
		 $dob1=date_create($row['dob']);
         $dob=date_format($dob1,"d-M-Y");
		 echo "<a href='update.php'><i class='fa fa-pencil fa-fw w3-margin-right ' style='float:right;height:40px;width:40px;background-color:coral;padding-top:10px' title='edit profile'></i></a>";
		 echo "<p><i class='fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme'></i>".$dob."</p>";
		 echo "<p><i class='fa fa-phone fa-fw w3-margin-right w3-text-theme'></i>".$row['mobile_no']."</p>";
		 echo "<p><i class='fa fa-envelope fa-fw w3-margin-right w3-text-theme'></i>".$row['email_id']."</p>";
		 echo "<p><i class='fa fa-home fa-fw w3-margin-right w3-text-theme'></i>".$row['location']."</p>";
         echo "<p><i class='fa fa-book fa-fw w3-margin-right w3-text-theme'></i>".$row['qualification']."</p>";
		 echo "<p><i class='fa fa-graduation-cap fa-fw w3-margin-right w3-text-theme'></i>".$row['profession']."</p>"; 
		 }}}
		 else {
	     header("Location:login.html");
		 }?>
        </div>
      </div>
      <br>
      
	  <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Friend Request</p>
          <img src="/w3images/avatar6.png" alt="Avatar" style="width:50%"><br>
          <span>Jane Doe</span>
          <div class="w3-row w3-opacity">
            <div class="w3-half">
              <button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></button>
            </div>
            <div class="w3-half">
              <button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fa fa-remove"></i></button>
            </div>
          </div>
        </div>
      </div>
      <br>
      
      <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>People are looking at your profile. Find out who.</p>
      </div>
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
	
	<!--php code for accessing database-->
  <?php
   include "connection.php";
   $sql="SELECT * FROM community  WHERE volunteer_id='$id' ORDER BY sl_no DESC" ;
   $result = $conn->query($sql);
   $count="";
   while ($row = mysqli_fetch_array($result)) {
      echo "<div class='w3-container w3-card w3-white w3-round vms-margin'>"."<br>";
       echo "<img src='community/".$row['image']."' alt='Avatar' class='w3-left  w3-margin-right' style='width:50%; height:50'>";
		$date=date_create($row['dateTime']);
        $dateTime=date_format($date,"d-M-Y, g:i:s a");
		echo "<span class='w3-right w3-opacity'>" .$dateTime. "</span><br>";
        echo "<h4 span class='ti-user'></span> " .$row['name']. "</h4>";
        echo "<h6><span class='ti-location-pin'></span> " .$row['location']. "</h6>";
        echo "<hr class='w3-clear'>";
         echo "<p style='text-align:justify'>".$row['description']."</p>";
          echo "<div class='w3-row-padding' style='margin:0 -16px'>";
        echo "</div>";
        echo "<p class='w3-opacity' style='float:right'>by: ".$row['volunteer_name']."</p>";
      echo "</div>";
	  $count++;
	}
    if($count<1)
	{
	echo "<div class='w3-container w3-card w3-white w3-round vms-margin' style='height:200px;text-align:center'>"."<br><br>you do not have added any people yet!!<br>";
	echo "add now<br><hr>";
	echo "<a href='addPeople.php' class='w3-bar-item w3-button  w3-padding-large w3-hover-white' title='Add People'><i class='fa fa-user-plus'></i></a>";
	echo "</div>";}
  ?>    
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Upcoming Events:</p>
          <img src="/w3images/forest.jpg" alt="Forest" style="width:100%;">
          <p><strong>Holiday</strong></p>
          <p>Friday 15:00</p>
          <p><button class="w3-button w3-block w3-theme-l4">Info</button></p>
        </div>
      </div>
      <br>
      <!-- Accordion -->
      <div class="w3-card w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p>Some text..</p>
          </div>
          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Events</button>
          <div id="Demo2" class="w3-hide w3-container">
            <p>Some other text..</p>
          </div>
          <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Photos</button>
          <div id="Demo3" class="w3-hide w3-container">
         <div class="w3-row-padding">
         <br>
           <div class="w3-half">
             <img src="/w3images/lights.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/mountains.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/forest.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/snow.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
         </div>
          </div>
        </div>      
      </div>
      <br>
      
      
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container vms-theme w3-center" >
  <p>Powered by: <a href="https://vmswebtech.com/" >VMSwebtech.com</a></p>
</footer>
 
</body>
</html> 
