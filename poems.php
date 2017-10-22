<?php

	$link = mysqli_connect("shareddb1c.hosting.stackcp.net","frankhartpoems-3136bd91","password98@","frankhartpoems-3136bd91");

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>POEMS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!-- css -->
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- skin color -->
<link href="color/default.css" rel="stylesheet">
<!--[if lt IE 7]>
            <link href="css/font-awesome-ie7.css" type="text/css" rel="stylesheet">
        <![endif]-->
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
<!-- Favicon -->
<link rel="shortcut icon" href="img/favicon.ico">

<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

<!-- jQuery -->
<script src="js/jquery.js"></script>

<style>

	.poems {

		width: 50%;
		height: 100px;
		margin: 0 auto;
		font-size: 120%;
		font-family: 'Pacifico', cursive;
		-webkit-transition: font-size 0.5s;
		transition: font-size 0.5s;

	}

	.poems:hover {

		font-size: 150%;

	}

	.pages {

		border: 1px solid black;
		border-radius: 50%;;
		margin-right: 10px;
		background: none;
		color: black; 
		font-weight: bold;
		font-size: 120%;
		font-family: 'Indie Flower', cursive;


	}

	.pages:hover {

		background: black;
		color: white;

	}

	@media screen and (max-width: 480px) {

		.title {

			font-size: 50%;
			font-weight: bold;

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

<div>

	<h2 style="text-align: center; margin-top: 80px;">POEMS</h2>
	<div style='text-align: center;'>
    <?php

        $query = "SELECT * FROM `posts` ORDER BY id DESC";

        $num = mysqli_num_rows(mysqli_query($link, $query));

		$pages = ceil($num/12);
		
		echo "Pages: ";	

		for($i = 0; $i < $pages; $i++) {

			echo "<button value='$i' class='pages'>".$i."</button> ";

		}

		echo "<br><br>";

        if($result = mysqli_query($link, $query)) {

			$i = 1;

			$j = 0;

            while($row = mysqli_fetch_array($result)) {

                $photo = "poems/".$row['file'];

				$link = "poem.php?id=".$row['id'];

				if($i<12) {
					
					if($i==1 && $j==0) {

						echo "<div id=$j>";

					} else if($i==1) {

						echo "<div id=$j>";

					}

					echo "<a href='$link'><br><div class='poems'>".$row['title']."</div></a>";
					

				} else if($i==12) {

					echo "<a href='$link'><br><div class='poems'>".$row['title']."</div><br></a>";

					echo "</div>";

					$i = 0;

					$j++;

				}

				$i++;

            }

        }

    ?>

	<br><br>

	<script>

		for(var i=1;i<=<?php echo $pages; ?>;i++) {

			$("#"+i).hide();

		}

		$(".pages").click(function() {

			for(var i=0;i<=<?php echo $pages; ?>;i++) {

				if($(this).val()==i) {

					$("#"+i).show();

				} else {

					$("#"+i).hide();

				}

			}

		})

	</script>

</div>

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
<!-- nav -->
<script src="js/jquery.scrollTo.js"></script>
<script src="js/jquery.nav.js"></script>
<!-- localScroll -->
<script src="js/jquery.localScroll.js"></script>
<!-- bootstrap -->
<script src="js/bootstrap.js"></script>
<!-- prettyPhoto -->
<script src="js/jquery.prettyPhoto.js"></script>
<!-- Works scripts -->
<script src="js/isotope.js"></script>
<!-- flexslider -->
<script src="js/jquery.flexslider.js"></script>
<!-- inview -->
<script src="js/inview.js"></script>
<!-- animation -->
<script src="js/animate.js"></script>
<!-- twitter -->
<script src="js/jquery.tweet.js"></script>
<!-- custom functions -->
<script src="js/custom.js"></script>
</body>
</html>
