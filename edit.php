<?php

    session_start();

    $link = mysqli_connect("shareddb1c.hosting.stackcp.net","frankhartpoems-3136bd91","password98@","frankhartpoems-3136bd91");

    if(isset($_POST['submit'])) {

        if($_POST['title']!='') {

            $query = "UPDATE `posts` SET title='".mysqli_real_escape_string($link, $_POST['title'])."' WHERE id='".$_GET['id']."'";

            mysqli_query($link, $query);

            echo "<script> alert('Successfully updated data!'); </script>";

            echo "<script> location.href='upload.php'; </script>";

        }

    }

?>

<form method="post">

    <input type="text" placeholder="Enter new title" name="title">
    <input type="submit" name="submit">

</form>