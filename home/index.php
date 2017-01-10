<?php 
session_start();
require '../oauth/database.php';
require '../accounts/data/user-lib.php';
if (isset($_REQUEST['logout'])) {
   session_unset();
}
if (isset($_GET['c']))
{
	$confirm = false;
	$sql = 'SELECT * FROM users WHERE (uuid = "' . $_GET['c'] .  '")'; //Check for Email in database
   $result = mysqli_query($conn, $sql); 
   if (mysqli_num_rows($result) > 0) { //Make sure email is vaild first 
		$sql = 'UPDATE users SET email_confirmed=1 WHERE (uuid="' . $_GET['c'] .  '")';
		if (mysqli_query($conn, $sql)) {
			$confirm = true;
		} 
  } 
}
if (isset($_GET['shop']) && isset($_SESSION['access_token'])) {
	header("Location: /accounts/shop/");
}


if (isset($_SESSION['access_token'])) {
	$user = new UserData($conn, $_SESSION['uuid']);
	print($user->getError());
}


$authUrl = "https://accounts.google.com/o/oauth2/auth?response_type=code&redirect_uri=http%3A%2F%2F1nfinityinc.cf%2Foauth%2Fgoogle&client_id=96895580435-il2gi5gnlfe2sc0f17v05jtvcuqk3pgt.apps.googleusercontent.com&scope=email&access_type=online&approval_prompt=auto"
?>

<!DOCTYPE html>
<html lang="en">

<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../img/icons/icon.ico" type="image/sx-icon" />
	<link rel="shortcut icon" href="../img/icons/icon.ico" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>1nfinity - Innovation for Living</title>

	<!-- Bootstrap Core CSS -->
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link href="../css/bootstrap-social.css" rel="stylesheet">

	<!-- Theme CSS from Startbootstrap.com-->
	<link href="../css/agency.css?v=1.5.3" rel="stylesheet">
	<!-- 1nfinity Developement CSS -->
	<link href="../css/dev.css?v=1.2.1" rel="stylesheet">
	<link href="../css/easyhelp.css?v=1.0.0" rel="stylesheet">



	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="page-top" class="index">

	<!-- Navigation -->
	<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header page-scroll">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" id="mainNavCol">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
				<a class="navbar-brand page-scroll fg-black bold" href="#page-top"><span class="dev-main-color">1</span>nfinity</span></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li class="hidden">
						<a href="#page-top"></a>
					</li>
					<li>
						<a class="page-scroll" href="#services">Overview</a>
					</li>
					<li>
						<a class="page-scroll" href="#portfolio">Features</a>
					</li>
					<li>
						<a class="page-scroll" href="#shop">Shop</a>
					</li>
					<li>
						<a class="page-scroll" href="#team">Team</a>
					</li>
					<li>
						<a class="page-scroll" href="#contact">Contact</a>
					</li>
					<li id="#accountsNav">
						<?php require "accountsNav.php";?>
					</li>
                    <?php require "logout.php" ?>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>

	<!-- Header -->
	<header>
		<div class="container">
			<div class="intro-text">
				<div class="intro-lead-in">Welcome to Infinity</div>
				<div class="intro-heading">INNOVATION FOR LIVING</div>
				<a href="#services" class="page-scroll btn btn-xl">BEGIN</a>
			</div>
		</div>
	</header>

	<!-- Services Section -->
	<section id="services">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2 class="section-heading">Overview</h2>
					<h3 class="section-subheading text-muted">Let's understand the basics.</h3>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-md-4">
					<span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
					<h4 class="service-heading">Smart</h4>
					<p class="text-muted">As we offer SmartApartments/Offices, technology is one of the many factors we want into something, thus creating a wonderful space for you!</p>
				</div>
				<div class="col-md-4">
					<span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-home fa-stack-1x fa-inverse"></i>
                    </span>
					<h4 class="service-heading">Design</h4>
					<p class="text-muted">With technology, we like customization. This give that personal touch with what you want to create your personal space with.</p>
				</div>
				<div class="col-md-4">
					<span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-usd fa-stack-1x fa-inverse"></i>
                    </span>
					<h4 class="service-heading">More for Less</h4>
					<p class="text-muted">We renovate to help costs and allow for more customzation. Also allows for any SmartSpace to be created anywhere.<sup>*</sup></sup>
					</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Portfolio Grid Section -->
	<section id="portfolio" class="bg-light-gray">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2 class="section-heading">Features</h2>
					<h3 class="section-subheading text-muted">This is what to excpect in a SmartSpace</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-6 portfolio-item">
					<img src="../img/features/binary5.png" class="img-responsive" alt="">
					<div class="portfolio-caption">
						<h4>Being Connected</h4>
						<p class="text-muted">The Internet is everywhere, so let's use it!</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 portfolio-item">
					<img src="../img/features/personal2.png" class="img-responsive" alt="">
					<div class="portfolio-caption">
						<h4>Personal Assistant</h4>
						<p class="text-muted">And no, its not a real person...</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 portfolio-item">
					<img src="../img/features/batterytable.png" class="img-responsive" alt="">
					</a>
					<div class="portfolio-caption">
						<h4>Charging Desks/Counters</h4>
						<p class="text-muted">Batteries die, but we got you covered!</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 portfolio-item">
					<img src="../img/features/finishedsecurity.png" class="img-responsive" alt="">
					<div class="portfolio-caption">
						<h4>Security</h4>
						<p class="text-muted">Smart locks help keep bad guys out!</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 portfolio-item">
					<img src="../img/features/re-arrangecouch.png" class="img-responsive" alt="">
					<div class="portfolio-caption">
						<h4>Re-arrange</h4>
						<p class="text-muted">Change it up! That's what we want!</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 portfolio-item">
					<img src="../img/features/function.png" class="img-responsive" alt="">
					<div class="portfolio-caption">
						<h4>Functonality</h4>
						<p class="text-muted">Spice it up with this, that or whatever!</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- About Section -->
	<section id="shop" class="bg-gray">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2 class="section-heading">Shop</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6 shop-item">
					<img src="../img/shop/smartapartment.png" class="img-responsive" alt="">
					<div class="shop-caption">
						<h4>SmartApartments</h4>
						<p class="text-muted">A nice techy way to live!</p>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 shop-item">
					<img src="../img/shop/comm.png" class="img-responsive" alt="">
					<div class="shop-caption">
						<h4>SmartOffices</h4>
						<p class="text-muted">A Smart way to operate your company!</p>
					</div>
				</div>
			</div>
            <?php if(isset($_SESSION['access_token'])) {
                print '<div class="row text-center">
                <a class="btn btn-success" href="../accounts/shop/">
                                        Start Shopping!
				</a></div>';
            
                
            } else {
                print '<div class="row text-center">
                <a class="btn btn-primary" onClick="openModal(\'#account\')">
                                     Signin to  Start Shopping!
				</a>
            </div>';
            } ?>
		</div>
	</section>


	<!-- Team Section -->
	<section id="team" class="bg-light-gray">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2 class="section-heading">The Team</h2>
					<h3 class="section-subheading text-muted">Here's a few of the amazing teamates at 1nfinity!</h3>
				</div>
			</div>
			<div class="row">
			<?php require "team/random.php";?>
			</div>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 text-center">
					<p class="large text-muted">Here is some of our talented teammates. To see all click the button below!</p>
				</div>
			</div>
			<div class="text-center">
				<a class="page-scroll btn btn-xl" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="There seems to be an error?">Show me everyone!</a>
			</div>
		</div>
	</section>


	<!-- Contact Section -->
	<section id="contact">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2 class="section-heading">Contact Us</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<form name="sentMessage" id="contactForm" novalidate>
						<div class="row">
							<div class="col-md-6 margin-10-top">
								<div class="padding-5 bg-gray text-center radius-10 size-16 bold">
									<p class="navbar-brand fg-black bold size-24" style="float: none !important;">Our Infomation</p>
									12500 Holly Road, Grand Blanc, MI 48439<br/>
									810-591-1572<br/>
									11:00 A.M. - 12:00 P.M. EST<br/>
									1nfinityinc.mi@veinternational.org<br/>
									<br/>
								</div>
							</div>
							<div class="col-md-6 margin-10-top">
								<div class="padding-5 bg-gray radius-10 size-24 bold">
									<div class="text-center" style="text-align: center;"><p class="navbar-brand fg-black bold size-24 text-center" style="float: none !important;">Live Chat!</p> 
									Have a question to ask? <br/>
									Use the <b>Live Chat</b>!<br/></div>
										<?php
										 if (!isset($_SESSION['access_token'])) {
										 		print '<a type="button" class="btn btn-info btn-xs" data-toggle="collapse" data-parent="#accordion" onClick="openModal(\'#account\')" aria-expanded="true">Sign in to use Live Chat!</a>';
										 } else {
											 print '<div class="row padding-5 bg-lightgray border" style="border-radius: 10px;">
												 <div class="col-md-8">
												 <h4>Click the icon in the bottom right hand corner to start talking!</h4>
												 </div>
												 <div class="col-md-4">
												 	<img src="https://cdn.1nfinityinc.cf/1nfinity_oauth_120px.png" style="height: 50px; width: 50px; border-radius: 50px;"/>
												 </div>
											</div>';
										 }
										?>

									<br/>
								</div>
							</div>
							
							<div class="clearfix"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<span class="copyright">Copyright &copy;2017 Infinity Inc </span> <br/>
					<span class="size-10">This is an official Virtual Enterprises International firm website and is for educational purposes only.</span>
				</div>
				<div class="col-md-4">
					<ul class="list-inline social-buttons">
						<li><a href="https://twitter.com/1nfinityvei" data-toggle="tooltip" data-placement="top" title="" data-original-title="Follow Us!"><i class="fa fa-twitter"></i></a>
						</li>
						<li><a href="https://github.com/1nfinityinc" data-toggle="tooltip" data-placement="top" title="" data-original-title="Code On"><i class="fa fa-github"></i></a>
						</li>
						<li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Watch us!"><i class="fa fa-youtube"></i></a>
						</li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul class="list-inline quicklinks">
						<li><a href="../terms/" >Privacy Policy & Terms of Service</a>
						</li>
						<br/>
						<li><a href="../changelog" data-toggle="tooltip" data-placement="top" title="" data-original-title="Our Work!" style="cursor: pointer;">Changelog</a>
						</li>
						<li><a data-toggle="tooltip" data-placement="top" title="" data-original-title="Coming Soon!" style="cursor: pointer;">API</a>
						</li>
						<li><a href="https://cdn.1nfinityinc.cf/" data-toggle="tooltip" data-placement="top" title="" data-original-title="View our files!" style="cursor: pointer;">CDN</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>

	<!-- Portfolio Modals -->
	<!-- Use the modals below to showcase details about your portfolio projects! -->

		<?php
		if (isset($_SESSION['access_token'])) {
			require 'modals/user.php';
		} else {
			require 'modals/accounts.php';
		}
		?>
		
		
		<!-- jQuery -->
		<script src="../vendor/jquery/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

		<!-- Plugin JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.js"></script>

		<!-- Contact Form JavaScript -->
		<script src="../js/jqBootstrapValidation.js"></script>
		<script src="../js/contact_me.js"></script>

		<!-- Theme JavaScript -->
		<script src="../js/agency.min.js"></script>
		<!-- JavaScript Functions-->
		<script>
			function openModal(z) {
				$(z).modal('toggle');
			}

			function navCollapsed() {
				var canSee = $("#mainNavCol").is(":visible");
				return canSee;
			}

			function runCollapsed() {
				if (!navCollapsed() == true) {
					// PC/MAC/LINUX (aka bigger screens)
					$("#accountText").hide();
                    $("#logoutText").hide();
					$("#mobile_signInDivide").hide();
					$("#signInGrid").addClass("vdivide");
				} else {
					//MOBILE (smaller screens)
					$("#accountText").show();
                    $("#logoutText").show();
					$("#mobile_signInDivide").show();
					$("#signInGrid").removeClass("vdivide");
				}
			}
			setInterval(function() {
				runCollapsed();
			}, 1000);
		</script>
		<!-- 1nfinity Developement JS -->
		<script src="../js/dev_accounts.js?v=1.4.8"></script>
		<!-- DOM Start -->
		<script>
			$(document).ready(function() {
				$('[data-toggle="tooltip"]').tooltip();
				$("#accountText").hide();
				$("#mobile_signInDivide").hide();
				runCollapsed();
			});
			$( "#accordion" ).click(function() {
				$("#collapseOne").collapse('toggle');
			});
		</script>
		<!-- Google Analytics :) -->
		<script>
			(function(i, s, o, g, r, a, m) {
				i['GoogleAnalyticsObject'] = r;
				i[r] = i[r] || function() {
					(i[r].q = i[r].q || []).push(arguments)
				}, i[r].l = 1 * new Date();
				a = s.createElement(o),
					m = s.getElementsByTagName(o)[0];
				a.async = 1;
				a.src = g;
				m.parentNode.insertBefore(a, m)
			})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

			ga('create', 'UA-85752868-1', 'auto');
			ga('send', 'pageview');
		</script>
		<?php 
			if (isset($_SESSION['access_token'])) { 
				print '<script src="https://cdn.smooch.io/smooch.min.js"></script>
				<script>
						Smooch.init({ appToken: \'d7tne6o6psjzxbowdrfgsk692\', 
						givenName: \'' . $_SESSION['name'] . '\', 
						userId: \'' . $_SESSION['uuid'] . '\',
						email: \'' . $_SESSION['email'] . '\',
						properties: {
								\'URI-PAGE\': \'' . $_SERVER['REQUEST_URI'] . '\'
						}
						
						});
				</script>';
			}
		?>
</body>

</html>