<?php

  session_start();

  $link = mysqli_connect("shareddb1c.hosting.stackcp.net","frankhartpoems-3136bd91","password98@","frankhartpoems-3136bd91");

  $error = 0;
  $errorMessage = "";
  $success = "";

  if(isset($_POST['logout'])) {

      $_SESSION['name'] = "";
      $_SESSION['regno'] = 0;
      $_SESSION['accountType'] = 0;
      echo "<script> location.href='index.php'; </script>";

  }

  if(isset($_POST['submit'])) {

      if($_POST['subcode']!="" && $_POST['otp']!="" && $_POST['password']!="") {

          if(strlen($_POST['subcode'])<7) {

              $error += 1;
              $errorMessage .= "Invalid subject code!";

          }

          $query = "SELECT `password` FROM `studentreg` WHERE regno='".mysqli_real_escape_string($link, $_SESSION['regno'])."'";

          $row = mysqli_fetch_array(mysqli_query($link, $query));

          if(hash('sha512',$_POST['password']) != $row['password']) {

              $error += 1;
              $errorMessage .= "<br>Incorrect password!";

          }

          $query = "SELECT * FROM `student` WHERE reg='".mysqli_real_escape_string($link, $_SESSION['regno'])."' AND subcode='".
          mysqli_real_escape_string($link, $_POST['subcode'])."'";

          $row = mysqli_fetch_array(mysqli_query($link, $query));

          if(hash('sha512',$_POST['otp']) != $row['otp']) {

              $error += 1;
              $errorMessage .= "<br>Incorrect OTP!";

          }

          if($error == 0) {

              $query = "INSERT INTO `attendance`(`tid`, `regno`, `slot`, `batch`, `subcode`) VALUES('".mysqli_real_escape_string($link, $row['tid'])."', '".
              mysqli_real_escape_string($link, $_SESSION['regno'])."', '".mysqli_real_escape_string($link, $row['slot'])."', '".mysqli_real_escape_string($link, $row['batch']).
              "', '".mysqli_real_escape_string($link, $_POST['subcode'])."')";

              mysqli_query($link, $query);

              $success = "Attendance marked successfully!";

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
    <title>STUDENT</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <!--Icon-->
	<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">

  <style>

      .logout {

          background-color: black;
          color: white;
          font-weight: bold;
          border: 2px solid black;
          padding: 5px;
          border-radius: 20px;

      }

      .logout:hover {

          background-color: white;
          color: black;

      }
 
  </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
      <a class="navbar-brand" href="#" style="font-size: 25px"><strong>NO PROXY</strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#" disabled>STUDENT <span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="post">
          <button class='logout' name="logout">LOGOUT</button>
        </form>
      </div>
    </nav>

    <div class="jumbotron" style="background: white; text-align: center;">
      <div class="alert alert-danger alert-dismissible fade show" role="alert" <?php if($error == 0) { echo "style='display: none;'"; } ?>>
      <?php echo $errorMessage; ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="alert alert-success alert-dismissible fade show" role="alert" <?php if($success == "") { echo "style='display: none;'"; } ?>>
      <?php echo $success; ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
       <h4>Welcome <?php echo $_SESSION['name']; ?></h4><br>
       <form method="post">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Subject Code" name="subcode" aria-label="Subject Code" aria-describedby="basic-addon1">
        </div><br>
        <div class="input-group">
          <input type="text" class="form-control" placeholder="OTP" name="otp" aria-label="OTP" aria-describedby="basic-addon1">
        </div><br>
        <div class="input-group">
          <input type="password" class="form-control" placeholder="Password" name="password" aria-label="Password" aria-describedby="basic-addon1">
        </div><br>
        <button type="submit" class="btn btn-primary" name="submit">SUBMIT</button>
      </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>