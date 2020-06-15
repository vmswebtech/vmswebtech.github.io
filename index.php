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
	.volunteers_part img{
	border:1px solid coral;
	radius:5px;
    border-top-style: outset;
    border-top-color: coral;
    border-top-width: 9px;
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
	.hide-pic{
		display:block;
	}
	.login-btn:hover{
	color:white;
	background-color:coral;
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

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 offset-lg-5">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>Feed others 
							with your small help</h1>
                            <p>Just think, by donating a small amount you can make someone life better, join us in this movement for better future of our nation.</p>
							<p>जरा सोचिए, एक छोटी राशि दान करके आप किसी का जीवन बेहतर बना सकते हैं, हमारे राष्ट्र के बेहतर भविष्य के लिए इस आंदोलन में शामिल हो सकते हैं।</p>
                            <a href="#" class="btn_2">Start Donation</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- feature_part start-->
    <section class="feature_part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <p>Awesome Feature</p>
                        <h2>How Could You Help </h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-5 col-sm-6">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <div class=" d-flex align-items-center">
                                <img src="img/icon/feature_1.svg" alt="">
                                <h4>Give Donation</h4>
                            </div>
                            <p>By donating a small amount, you can make a life better and feel proud of own self.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-6">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <div class=" d-flex align-items-center">
                                <img src="img/icon/feature_2.svg" alt="">
                                <h4>Become A Volunteer</h4>
                            </div>
                            <p>Become a volunteer and start the journey of helping others with us.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-6">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <div class=" d-flex align-items-center">
                                <img src="img/icon/feature_3.svg" alt="">
                                <h4>Child Education</h4>
                            </div>
                            <p>Donate small amount for those who doesn't able get education, it can make a better future of nation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature_part start-->

    <!-- top_service part start-->
    <section class="be_part">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <div class="be_part_text">
                        <h2>Be a part of the break
                            through and make someones
                            dream come true</h2>
                        <p>By donating a small amount, you can make a life better, we are here to collect all the amount from the public and use it for the betterment of all the helpless people in all the way.</p>
                        <a href="#" class="btn_2">learn more</a>
                    </div>
                </div>
            </div>
        </div>
        <img src="img/Charity.jpg" alt="" class="be_img">
    </section>
    <!-- top_service part end-->

    <!-- counter part start-->
    <section class="counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="single_counter d-flex">
                        <img src="img/icon/feature_1.svg" alt="">
                        <div class="single_counter_text">
                            <p>Total Collection</p>
                            <span class="count">58,9672412</span>
                        </div>
                    </div>
                    <div class="single_counter d-flex">
                        <img src="img/icon/feature_2.svg" alt="">
                        <div class="single_counter_text">
                            <p>Helped People</p>
                            <span class="count">58,9672412</span>
                        </div>
                    </div>
                    <div class="single_counter d-flex">
                        <img src="img/icon/feature_3.svg" alt="">
                        <div class="single_counter_text">
                            <p>Total Volunteer</p>
                            <span class="count">58,9672412</span>
                        </div>
                    </div>
                    <div class="single_counter d-flex">
                        <img src="img/icon/feature_4.svg" alt="">
                        <div class="single_counter_text">
                            <p>Successed Mission</p>
                            <span class="count">58,967</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- counter part end-->
	

    <!--::volunteers_part start::-->
    <section class="volunteers_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <p>volunteers</p>
                        <h2>Expert Volunteers</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="img/volunteers/volunteers_1.png" alt="doctor">
                            <div class="social_icon">
                                <a href="#"> <i class="ti-facebook"></i> </a>
                                <a href="#"> <i class="ti-twitter-alt"></i> </a>
                                <a href="#"> <i class="ti-instagram"></i> </a>
                                <a href="#"> <i class="ti-skype"></i> </a>
                            </div>
                        </div>
                        <div class="single_text">
                            <div class="single_blog_text">
                                <h3>Karan Singh</h3>
                                <p>Founder & Director</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="img/volunteers/volunteers_2.jpg" alt="doctor">
                            <div class="social_icon">
                                <a href="#"> <i class="ti-facebook"></i> </a>
                                <a href="#"> <i class="ti-twitter-alt"></i> </a>
                                <a href="#"> <i class="ti-instagram"></i> </a>
                                <a href="#"> <i class="ti-skype"></i> </a>
                            </div>
                        </div>
                        <div class="single_text">
                            <div class="single_blog_text">
                                <h3>Manjeet Singh</h3>
                                <p>Manager & Tech Support</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="img/volunteers/volunteers_3.jpg" alt="loading..">
                            <div class="social_icon">
                                <a href="#"> <i class="ti-facebook"></i> </a>
                                <a href="#"> <i class="ti-twitter-alt"></i> </a>
                                <a href="#"> <i class="ti-instagram"></i> </a>
                                <a href="#"> <i class="ti-skype"></i> </a>
                            </div>
                        </div>
                        <div class="single_text">
                            <div class="single_blog_text">
                                <h3>Samuel Gardner</h3>
                                <p>Co Founder</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="img/volunteers/volunteers_1.png" alt="doctor">
                            <div class="social_icon">
                                <a href="#"> <i class="ti-facebook"></i> </a>
                                <a href="#"> <i class="ti-twitter-alt"></i> </a>
                                <a href="#"> <i class="ti-instagram"></i> </a>
                                <a href="#"> <i class="ti-skype"></i> </a>
                            </div>
                        </div>
                        <div class="single_text">
                            <div class="single_blog_text">
                                <h3>-------</h3>
                                <p>Financer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::volunteers_part end::-->
	
	 <!-- intro_video_bg start-->
    <section class="intro_video_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="intro_video_iner text-center">
                        <h2>Forget what you can get and
                            see what you can give</h2>
                        <a href="#" class="btn_2">Become a Volunteer</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- intro_video_bg part start-->
	<br><br>

    <!--::blog_part start::-->
    <section class="blog_part padding_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <p>Our Posts</p>
                        <h2>Every Single Update</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="single_blog">
                        <div class="appartment_img">
                            <img src="img/blog_1.jpg" alt="loading..">
                        </div>
                        <div class="single_appartment_content">
                            <a href="blog.html">
                                <h4>We are providing foods to helpless 
                                    people.
                                </h4>
                            </a>
                            <ul class="list-unstyled">
                                <li><a href=""> <span class="flaticon-calendar"></span> </a> May 10, 2019</li>
                                <li><a href=""> <span class="flaticon-comment"></span> </a> 1 comments</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right_single_blog">
                        <div class="single_blog">
                            <div class="media">
                                <div class="media-body align-self-center">
                                    <p><a href="#">child Education</a></p>
                                    <a href="blog.html">
                                        <h5 class="mt-0"> Funding helpless childs for their education</h5>
                                    </a>
                                    <ul class="list-unstyled">
                                        <li><a href=""> <span class="flaticon-calendar"></span> </a> May 10, 2019</li>
                                        <li><a href=""> <span class="flaticon-comment"></span> </a> 1 comments</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single_blog">
                            <div class="media">
                                <div class="media-body align-self-center">
                                    <p><a href="#">Blancket for winter</a></p>
                                    <a href="blog.html">
                                        <h5 class="mt-0"> providing blancket to helpless peoples for their safety in winter</h5>
                                    </a>
                                    <ul class="list-unstyled">
                                        <li><a href=""> <span class="flaticon-calendar"></span> </a> May 10, 2019</li>
                                        <li><a href=""> <span class="flaticon-comment"></span> </a> 1 comments</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single_blog">
                            <div class="media">
                                <div class="media-body align-self-center">
                                    <p><a href="#">healthy food</a></p>
                                    <a href="blog.html">
                                        <h5 class="mt-0"> providing grain to poor people </h5>
                                    </a>
                                    <ul class="list-unstyled">
                                        <li><a href=""> <span class="flaticon-calendar"></span> </a> May 10, 2019</li>
                                        <li><a href=""> <span class="flaticon-comment"></span> </a> 1 comments</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::blog_part end::-->

    <!--::our client part start::-->
    <section class="client_part padding_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <p>OUr Client</p>
                        <h2>Worldwide Partners</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="client_logo owl-carousel">
                        <div class="single_client_logo">
                            <img src="img/client_logo/Logo_1.png" alt="">
                        </div>
                        <div class="single_client_logo">
                            <img src="img/client_logo/Logo_2.png" alt="">
                        </div>
                        <div class="single_client_logo">
                            <img src="img/client_logo/Logo_3.png" alt="">
                        </div>
                        <div class="single_client_logo">
                            <img src="img/client_logo/Logo_4.png" alt="">
                        </div>
                        <div class="single_client_logo">
                            <img src="img/client_logo/Logo_5.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::our client part end::-->

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