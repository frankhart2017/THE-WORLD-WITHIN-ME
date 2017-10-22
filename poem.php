<?php

	$link = mysqli_connect("shareddb1c.hosting.stackcp.net","frankhartpoems-3136bd91","password98@","frankhartpoems-3136bd91");

    $query = "SELECT * FROM `posts` WHERE id='".$_GET['id']."'";

    $row = mysqli_fetch_array(mysqli_query($link, $query));

	if(isset($_POST['submit'])) {

		if($_POST['name']!='' AND $_POST['comment']!='') {

			$query1 = "INSERT INTO `comments`(`pid`, `name`, `comment`) VALUES('".mysqli_real_escape_string($link, $row['id'])."', '".mysqli_real_escape_string($link, $_POST['name'])."'
			, '".mysqli_real_escape_string($link, $_POST['comment'])."')";

			mysqli_query($link, $query1);

			echo "<script> alert('Successfully posted comment'); </script>";

		} else {

			echo "<script> alert('Complete the form'); </script>";

		}

	}

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

<!-- jQuery -->
<script src="js/jquery.js"></script>

<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">

<style>

	#background {

        font-family: 'Inconsolata', monospace;
        font-weight: bold;
        background-image: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('img/background.jpg');
        background-size: cover;
        color: white;

    }

    #poet {

         text-align: right; 
         margin-right: 100px;
         color: white;

    }


    #poem {

        margin-left: 20px; 
        width: 25%;

    }

    .comment {

        width: 25%;
        margin: 0 auto;

    }

    .submit {

        border: none;
        background-color: white;
        border-radius: 10px;

    }

    .submit:hover {

        background-color: black;
        color: white;
        border-radius: 20px;

    }

    #view {

        border: none; 
        background: none;
        font-weight: bold;
        font-size: 100%;
        color: blue;

    }

    #go {

        margin-left: 10px;
        color: white;

    }

    #go:hover {

        color: black;

    }

    @media screen and (max-width: 480px) {

        #poet {

            margin-right: 10px;

        }

        #poem {

            width: 90%;

        }

        .comment {

            width: 75%;

        }

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

<div id='background'>

    <br><br>
    <p><a href="poems.php" id="go"><< Go back</a></p>
	<h2 style="text-align: center; color: white"><strong><?php echo $row['title']; ?></strong></h2>
    <h5 id="poet">-<strong>FRANK HART</strong></h5>

    <div id="poem">

    <?php

        $file = "poems/".$row['file'];

        $handle = fopen($file, "r");

        if ($handle) {

            while (!feof($handle)) {
                
                echo fgets($handle)."<br>";

            }

            fclose($handle);

        } else {
            
            echo "Could not open file";

        } 

    ?>

    </div>
	<br><br>
    <form method="post">
    <div class="field your-name form-group comment">
        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" style="padding: 20px;">
    </div>
    <div class="field message form-group comment">
        <textarea class="form-control" name="comment" rows="3" placeholder="Comment"></textarea>
    </div>
    <div class="comment">
        <input type="submit" value="Post Comment" name="submit" class="submit">
    </div>
    </form>
    <br>
    <div style="text-align: center;"><button type="button" id="view">View Comments</button><br><br>
    <div style="margin-bottom: 20px; display: none;" id="comments">

    <?php

        $query2 = "SELECT * FROM `comments` WHERE pid='".$_GET['id']."'";

        if($result = mysqli_query($link, $query2)) {

            while($row1 = mysqli_fetch_array($result)) {

                echo '<strong>'.$row1['name'].'</strong>: '.$row1['comment'].'<br>';

            }

        }

        if(mysqli_num_rows(mysqli_query($link, $query2))==0) {

            echo "No comments posted yet!";

        }

    ?>

    </div>
    </div>
    <br>
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

<script>

	$("#view").click(function(){

		$("#comments").toggle();

	})

</script>

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
