<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Aapan Sahyog</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- magnific popup CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- nice select CSS -->
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
	<style>
	.outline{
	margin-top:40px;
	margin-bottom:40px;
	padding:0px;
	box-shadow: 0 0 10px 2px gray;
	}
	.candidate_pic{
	}
	.login-btn{
	  display:none;
	}
	.login-btn, .hide-pic{
	  display:none;
	}
	.hide-pic-1{
		display:block;
		width:200px;
	}
	@media screen and (max-width:768px){
	.login-btn{
	display:block;
	border:1px solid coral;
	padding:3px 20px;
	border-radius:20px;
	color:white;
	float:right;
	font-family: "Roboto",sans-serif;
	}
	.login-btn:hover{
	color:white;
	background-color:coral;
	}
	.hide-pic{
		display:block;
	}
	}
	</style>
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.php"> <img src="img/logo.png" alt="logo"> </a>
		<?php
         include "connection.php";	
         session_start();
         if(isset($_SESSION["loggedIn"])) {
	     if(!empty($_SESSION["loggedInUserId"])) {
         $id = $_SESSION["loggedInUserId"];
		 
		 $sql="SELECT * FROM volunteer where userId=".$id;
         $result = $conn->query($sql);
		 while ($row = mysqli_fetch_array($result)) {
		 echo "<div class='hide-pic'>";
         echo "<a href='profile.php'><img src='profilePic/".$row['profile_pic']."' class='w3-circle' style='height:50px;width:50px;border-radius:50%; float:right;padding:5px' alt='Avatar' title='Profile'></a>";
		 echo "</div>";
		 }}}
		 else {
	     echo "<a class='login-btn' href='login.php'>Login <i class='flaticon-right-arrow'></i></a>";
		 }?>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="ti-menu"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
								<li class="nav-item">
                                    <a class="nav-link" href="community.php">Community</a>
                                </li>
								<li class="nav-item dropdown">
                                    <a class="nav-link" href="posts.php">Posts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.php">about</a>
                                </li>
								<li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact</a>
                                </li>
                                <li class="d-none d-lg-block">
         <?php
         include "connection.php";	
         if(isset($_SESSION["loggedIn"])) {
	     if(!empty($_SESSION["loggedInUserId"])) {
         $id = $_SESSION["loggedInUserId"];
		 
		 $sql="SELECT * FROM volunteer where userId=".$id;
         $result = $conn->query($sql);
		 while ($row = mysqli_fetch_array($result)) {
		 echo "<div class='hide-pic-1'>";
         echo "<a href='profile.php'><img src='profilePic/".$row['profile_pic']."' class='w3-circle' style='height:50px;width:50px;border-radius:50%; float:right;padding:5px' alt='Avatar' title='Profile'></a>";
		 echo "</div>";
		 }}}
		 else {
	     echo "<a class='btn_1' href='login.html'>login <i class='flaticon-right-arrow'></i></a>";
		 }?>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

     <!-- breadcrumb start-->
     <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item text-center">
                            <h2>Community</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->
    
	<!-- commmmunity content -->
<?php
	include "connection.php";
   $sql="SELECT * FROM community ORDER By sl_no DESC";
   $result = $conn->query($sql);
while ($row = mysqli_fetch_array($result)) {
echo "<div class='container  outline'>";
   echo "<div class='row'>";
	echo "<div class='community-list col-sm-6'>";
	   echo "<div class='candidate_pic'>";
	    echo "<img src='community/".$row['image']."' alt='loding..' style='width:100%;height:auto'>";  
	   echo "</div>";
	echo "</div>";
	echo "<div class='community-list col-sm-6'>";
	   echo "<div class='details' style='margin:10px 10px;'><br>";
	   
	   $date=date_create($row['dateTime']);
        $dateTime=date_format($date,"d-M-Y, g:i:s a");
		
	         echo "<p style='float:right'>".$dateTime."</p>";
	         echo "<h3><span class='ti-user'></span> ".$row['name']."</h3>";
	         echo "<p><span class='ti-location-pin'></span> ".$row['location']."<p>";
	      echo "</div>";
	   echo "<h3 style='margin:10px 10px;'>Descrption:</h3><hr>";
	   echo "<p style='margin:10px 10px;'>".$row['description']."</p>";
	   echo "<p class='w3-opacity' style='float:right; padding-right:20px'>by: ".$row['volunteer_name']."</p>";
	echo "</div>";
  echo "</div>";
 echo "</div>";
}
 ?>
<!-- commmmunity content end -->
	
	
<!-- footer part start-->
    <footer class="footer-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="single-footer-widget footer_1">
                        <a href="index.php"> <img src="img/logo.png" alt=""> </a>
                        <p>लोगों की मदद से, हम अपने समाज में रहने वाले असहाय लोगों की मदद करते हैं। हमें उम्मीद है कि आप इस आंदोलन में शामिल होंगे।</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-4">
                    <div class="single-footer-widget footer_2">
                        <h4>Newsletter</h4>
                        <p>Subscribe this portal and stay connected with us.</p>
                        <div class="form-wrap" id="mc_embed_signup">
                            <form target="_blank"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="form-inline">
                                <input class="form-control" name="EMAIL" placeholder="Your Email Address"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
                                    required="" type="email">
                                <button class="btn btn-default text-uppercase"><i class="ti-angle-right"></i></button>
                                <div style="position: absolute; left: -5000px;">
                                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                        type="text">
                                </div>

                                <div class="info"></div>
                            </form>
                        </div>
                        <div class="social_icon">
                            <a href="#"> <i class="ti-facebook"></i> </a>
                            <a href="#"> <i class="ti-twitter-alt"></i> </a>
                            <a href="#"> <i class="ti-instagram"></i> </a>
                            <a href="#"> <i class="ti-skype"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-4">
                    <div class="single-footer-widget footer_2">
                        <h4>Contact us</h4>
                        <p><span class="ti-location-pin"></span> Shidhwalia, gopalganj, Bihar, IN</p>
                        <div class="contact_info">
                            <p><span class="ti-mobile"></span>9693487008</p>
                            <p><span class="ti-email"></span>info@aapansahyog.org</p>
                            <p><span class="ti-world"></span>aapansahyog.org </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright_part_text text-center">
                        <div class="row">
                            <div class="col-lg-12">
                              <p class="footer-text m-0">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Powered by: <a href="https://vmswebtech.com" target="_blank">vmswebtech.com</a></p>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    <!-- jquery plugins here-->

    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.smooth-scroll.min.js"></script>
    <!-- swiper js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- swiper js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <!-- contact js -->
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/contact.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>