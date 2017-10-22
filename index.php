<?php

	if(isset($_POST['submit'])) {

		if($_POST['name']!='' AND $_POST['email']!='' AND $_POST['message']!='') {

			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				
				echo "<script> alert('Invalid email address!'); </script>";
				echo "<script> location.href='index.php#contact'; </script>";

			} else {

				$to = "sdharchou@gmail.com";
                $subject = "Feedback";
                $message = '
Someone sent a feedback. The details are given below:-

------------------------
Name: '.$_POST['name'].'
Email: '.$_POST['email'].'
Message: '.$_POST['message'].'
------------------------

This is a system generated mail. Do not reply. 
';
$headers = 'From:noreply@frankhartpoems.com' . "\r\n"; 
                mail($to, $subject, $message, $headers);

				echo "<script> alert('Mail sent successfully! I will get back to you soon'); </script>";
				echo "<script> location.href='index.php#contact'; </script>";

			}
		
		} else {

			echo "<script> alert('Complete the form'); </script>";
			echo "<script> location.href='index.php#contact'; </script>";

		}

	}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>THE WORLD WITHIN ME</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="color/default.css" rel="stylesheet">
<link rel="shortcut icon" href="img/favicon.ico">

<style>

	.author {

		height: 300px;

	}

	#dp {

		width: 45%;

	}

	@media screen and (max-width: 480px) {

		.title {

			font-size: 50%;
			font-weight: bold;

		}

		#dp {

			width: 65%;

		}

	}

</style>

</head>
<body>

<!-- navbar -->
<div class="navbar-wrapper">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<!-- Responsive navbar -->
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
				</a>
				<h1 class="brand"><a href="index.php"><span class="title">THE WORLD WITHIN ME</span></a></h1>
				<!-- navigation -->
				<nav class="pull-right nav-collapse collapse">
				<ul id="menu-main" class="nav">
					<li><a title="team" href="#about">About</a></li>
					<li><a title="blog" href="https://frankhartpoems.blogspot.in/" target="_blank">Blog</a></li>
					<li><a title="contact" href="#contact">Contact</a></li>
					<li><a href="poems.php">Poems</a></li>
				</ul>
				</nav>
			</div>
		</div>
	</div>
</div>

<!-- Header area -->
<div id="header-wrapper" class="header-slider">
	<header class="clearfix">
	<div class="logo">
		<h2><strong>WELCOME TO MY WORLD</strong></h2>
	</div>
	<div class="container">
		<div class="row">
			<div class="span12">
				<div id="main-flexslider" class="flexslider">
					<ul class="slides">
						<li>
						<p class="home-slide-content">
							<strong>eat</strong> 
						</p>
						</li>
						<li>
						<p class="home-slide-content">
							<strong>sleep</strong>
						</p>
						</li>
						<li>
						<p class="home-slide-content">
							<strong>write</strong>
						</p>
						</li>
						<li>
						<p class="home-slide-content">
							<strong>repeat</strong>
						</p>
						</li>
					</ul>
				</div>
				<!-- end slider -->
			</div>
		</div>
	</div>
	</header>
</div>

<!-- section: About -->
<section id="about" class="section">
<div class="container">
	<h4>About Me</h4>
	<div class="row">
		<div class="span4 offset1">
			<div>
				<p style="text-align: justify;">
					Hey there, I&#39;m Siddhartha Dhar Choudhury (Frank Hart). I am pursuing B.Tech in Computer Science and Engineering in SRM University, Chennai. 
					Programming and writing are my favourite recreations. Both programming and writing compel one to think and help in growing one&#39;s imaginatve power.
					<br><br> 
					I started writing when I was about 8. As I grew up I started taking my hobby seriously.
					The best part about writing is that you can create a world that you like. The various writers especially classical writers and poets intrigue me
					and I came to realize the beauty of literature and poetry.
					<br><br>
					So, welcome to my world of poetry where I have attempted to attempt various emotions. I hope you like them.
				</p>
			</div>
		</div>
		<div class="span6">
			<div class="aligncenter">
				<img class="team-thumb img-circle" src="img/dp.jpg" id="dp" alt="" />
			</div>
		</div>
	</div>
</div>
<!-- /.container -->
</section>
<!-- end section: team -->

<!-- section: authors -->
<section id="services" class="section orange">
<div class="container">
	<h4>Authors I admire</h4>
	<!-- Four columns -->
	<div class="row">
		<div class="span3 animated-fast flyIn">
			<a href="https://en.wikipedia.org/wiki/Dan_Brown" target="_blank"><div class="service-box">
				<img src="img/authors/danbrown.jpg" alt="" class="author" />
				<h2>Dan Brown</h2>
			</div></a>
		</div>
		<div class="span3 animated flyIn">
			<a href="https://en.wikipedia.org/wiki/Sidney_Sheldon" target="_blank"><div class="service-box">
				<img src="img/authors/sidneysheldon.jpg" alt="" class="author" />
				<h2>Sidney Sheldon</h2>
			</div></a>
		</div>
		<div class="span3 animated-fast flyIn">
			<a href="https://en.wikipedia.org/wiki/Amish_Tripathi" target="_blank"><div class="service-box">
				<img src="img/authors/amishtripathi.jpg" alt="" class="author" />
				<h2>Amish Tripathi</h2>
			</div></a>
		</div>
		<div class="span3 animated-slow flyIn">
			<a href="https://en.wikipedia.org/wiki/Paulo_Coelho" target="_blank"><div class="service-box">
				<img src="img/authors/paulocoelho.jpg" alt="" class="author" />
				<h2>Paulo Coelho</h2>
			</div></a>
		</div>
	</div>
</div>
</section>
<!-- end section: services -->

<!-- section: contact -->
<section id="contact" class="section green">
<div class="container">
	<h4>Feedback</h4>
	<p>
		Your valuable feedback will help me when I write next. If you have any suggestions feel free to drop a message.
	</p>
	<div class="blankdivider30">
	</div>
	<div class="row">
		<div class="span12">
			<div class="cform" id="contact-form">
				<div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>
				<form action="" method="post" role="form" class="contactForm">
					<div class="row">
						<form method="post">
						<div class="span6">
							<div class="field your-name form-group">
								<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
							</div>
							<div class="field your-email form-group">
								<input type="text" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validation"></div>
							</div>
						</div>
						<div class="span6">
							<div class="field message form-group">
								<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validation"></div>
							</div>
							<input type="submit" value="Send message" name="submit" class="btn btn-theme pull-left">
						</div>
					</div>
					</form>
				</form>
			</div>
		</div>
		<!-- ./span12 -->
	</div>
</div>
</section>
<footer>
<div class="container">
	<div class="row">
		<div class="span6 offset3">
			<ul class="social-networks">
				<li><a href="https://twitter.com/sdharchou" target="_blank"><i class="icon-circled icon-bgdark icon-twitter icon-2x"></i></a></li>
				<li><a href="https://www.facebook.com/frankhart1998" target="_blank"><i class="icon-circled icon-bgdark icon-facebook icon-2x"></i></a></li>
			</ul>
			<p class="copyright">
				&copy; Siddhartha Dhar Choudhury. All rights reserved.
			</p>
		</div>
	</div>
</div>
<!-- ./container -->
</footer>
<a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>
<script src="js/jquery.js"></script>
<script src="js/jquery.scrollTo.js"></script>
<script src="js/jquery.nav.js"></script>
<script src="js/jquery.localScroll.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/isotope.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/inview.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
<script src="contactform/contactform.js"></script>

</body>
</html>
