<?php

	session_start();

	$link = mysqli_connect("shareddb1c.hosting.stackcp.net","frankhartpoems-3136bd91","password98@","frankhartpoems-3136bd91");

	$curTime = time();
    $curTime = date('H:i:s',$curTime);
    $query = "SELECT * FROM `student` WHERE `otp` NOT LIKE ''";
    $result = mysqli_query($link, $query);
    while($row = mysqli_fetch_assoc($result)) {
        $time = $row['time'];
        $put = strtotime("+15 seconds",strtotime($time));
        if($put <= strtotime($curTime)) {
            $id = $row['id'];
            $query = "UPDATE `student` SET otp='' WHERE id = $id";
            mysqli_query($link, $query);
        }
    }
    $current = time();
    $current = date('Y-m-d',$current);
    $query = "SELECT * FROM `attendance`";
    $result = mysqli_query($link, $query);
    while($row = mysqli_fetch_assoc($result)) {
        $date = $row['time'];
        $put = strtotime("+1 day",strtotime($date));
        if(date('Y-m-d',$put) == $current) {
            $id = $row['id'];
            $query = "DELETE FROM `attendance` WHERE id = $id";
            mysqli_query($link, $query);
        }
    }

	$error = 0;
	$errorMessage = "";
	
	if(isset($_POST['submit'])) {

		if($_POST['email']!="" && $_POST['password']!="") {
			
			if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				
				$error += 1;
				$errorMessage .= "Invalid email address!";

			} else {

				$query = "SELECT * FROM `studentreg` WHERE `email`='".mysqli_real_escape_string($link, $_POST['email'])."'";
				$query1 = "SELECT * FROM `teacherreg` WHERE `email`='".mysqli_real_escape_string($link, $_POST['email'])."'";

				$result = mysqli_query($link, $query);
				$result1 = mysqli_query($link, $query1);

				if(mysqli_num_rows($result)==0 && mysqli_num_rows($result1)==0) {

					$error += 1;
					$errorMessage .= "Account does not exist!";

				} else {

					if(mysqli_num_rows($result)==0 && mysqli_num_rows($result1)>0) {

						$row = mysqli_fetch_array($result1);

						if(hash('sha512',$_POST['password']) == $row['password']) {

							$_SESSION['accountType'] = 1;
							$_SESSION['name'] = $row['tname'];
							$_SESSION['regno'] = $row['tid'];

						} else {

							$error += 1;
							$errorMessage .= "Wrong credentials!";

						}

					} else if(mysqli_num_rows($result)>0 && mysqli_num_rows($result1)==0) {

						$row = mysqli_fetch_array($result);

						if(hash('sha512',$_POST['password']) == $row['password']) {
							
							$_SESSION['accountType'] = 2;
							$_SESSION['name'] = $row['sname'];
							$_SESSION['regno'] = $row['regno'];
							echo "<script> location.href='student.php'; </script>";

						} else {

							$error += 1;
							$errorMessage .= "Wrong credentials!";

						}

					}

				}

			}
	
		} else {

			$error = 1;
			$errorMessage = "Complete the form!";

		}

	} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>NO PROXY</title>
	<!-- Meta tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tags -->
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<!-- //font-awesome icons -->
	<!--stylesheets-->
	<link href="css/style.css" rel='stylesheet' type='text/css' media="all">
	<!--//style sheet end here-->
	<link href="//fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
	<!--Icon-->
	<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
	<!--Bootstrap-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>

<body>
	<div class="alert alert-danger alert-dismissible fade show" role="alert" <?php if($error == 0) { echo "style='display: none;'"; } ?>>
	<?php echo $errorMessage; ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	</div>
	<h1 class="header-w3ls" style="color: black;">
		NO PROXY</h1>
	<div class="appointment-w3">

		<form method="post">
			<h2 class="sub-heading-wthree"> Login Here</h2>
			<div class="main">
				<div class="form-left-w3l">
					<input type="email" name="email" placeholder="Email" required="">
				</div>
				<div class="form-right-w3ls ">

					<input type="password" name="password" placeholder="Password" required="">

					<div class="clearfix"></div>
				</div>

			</div>
			<div class="btnn">
				<button type="submit" name="submit">Login</button><br>
				<div class="clear"></div>
			</div>

		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>

</html>