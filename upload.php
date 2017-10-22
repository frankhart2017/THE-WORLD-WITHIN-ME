<?php

    session_start();

    $link = mysqli_connect("shareddb1c.hosting.stackcp.net","frankhartpoems-3136bd91","password98@","frankhartpoems-3136bd91");

    if(isset($_POST['submit'])) {

        if($_POST['email']!='' AND $_POST['password']!='') {

            $query = "SELECT * FROM `admin` WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."'";

            $result = mysqli_query($link, $query);

            if(mysqli_num_rows($result)==0) {

                echo "Account does not exist";

            } else {

                $row = mysqli_fetch_array($result);

                if($row['password']==hash('sha512',$_POST['password'])) {

                    $_SESSION['email'] = $_POST['email'];

                } else {

                    echo "Wrong password";

                }

            }

        } else {

            echo "Complete the form";

        }

    }

    if(isset($_POST['upload'])) {

        $poemName = mysqli_real_escape_string($link, $_FILES['poem']['name']);

        $error=0;

        if($poemName=='') {

            echo "Uploading a poem is must.";
            $error=1;

        }

        if(isset($_FILES['poem'])){
            $errors= array();
            $file_name = $_FILES['poem']['name'];
            $file_size =$_FILES['poem']['size'];
            $file_tmp =$_FILES['poem']['tmp_name'];
            $file_type=$_FILES['poem']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['poem']['name'])));
            
            $expensions= array("txt");
            
            if(in_array($file_ext,$expensions)=== false){
                $errors[]="extension not allowed, please choose TXT file.";
            }
            
            if($file_size > 1000000){
                $errors[]='File size must not exceed 1 MB';
            }
            
            if(empty($errors)==true){
                move_uploaded_file($file_tmp,"poems/".$file_name);
            }else{
                print_r($errors);
            }
        }
        if($error==0) {

            $query = "INSERT INTO `posts`(`title`, `file`) VALUES('".mysqli_real_escape_string($link, $_POST['title'])."', '".mysqli_real_escape_string($link, $poemName)."')";

            mysqli_query($link, $query);

            echo "Successfully uploaded";

        }

    }

    if(isset($_POST['logout'])) {

        $_SESSION['email']='';

    }

    if(isset($_POST['delete'])) {

            $query = "SELECT * FROM `posts` WHERE id='".mysqli_real_escape_string($link, $_POST['delete'])."'";

            $row = mysqli_fetch_array(mysqli_query($link, $query));

            $name = $row['file'];

            $name = "poems/".$name;

            unlink($name);

            $query = "DELETE FROM `posts` WHERE id = '".mysqli_real_escape_string($link, $_POST['delete'])."'";

            mysqli_query($link, $query);

            echo "<script> alert('Successfully deleted poem.'); </script>"; 

    }

?>

<style type="text/css">

    table, th, td {

        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px;
        text-align: center;

    }

</style>

<form method="post" <?php if($_SESSION['email']!='') { echo 'style="display: none;"'; } ?>>

    <input type="text" name="email" placeholder="Enter email address">
    <input type="password" name="password" placeholder="Enter password">
    <button type="submit" name="submit">Submit</button>

</form>

<div <?php if($_SESSION['email']=='') { echo 'style="display: none;"'; } ?>>

    <form method="post" enctype="multipart/form-data">

        <input type="text" placeholder="Enter title of poem" name="title"><br><br>
        <input type="file" name="poem" autocomplete=off><br><br>
        <input type="submit" name="upload" value="Upload"><br><br>
        <input type="submit" name="logout" value="Logout">

    </form>

    <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <form method="post">
            <?php

                $query = "SELECT * FROM `posts`";
                
                if($result = mysqli_query($link, $query)) {

                    $i=1;

                    while($row = mysqli_fetch_array($result)) {

                        echo "<tr>";
                        echo "<td>".$i."</td>";
                        echo "<td>".$row['title']."</td>";
                        $id = $row['id'];
                        $link='edit.php?id='.$id;
                        echo "<td><a href=$link>Edit</a></td>";
                        echo "<td><button name='delete' value=$id>Delete</button>";
                        echo "</tr>";
                        $i++;

                    }

                }

            ?>
        </form>
        </tbody>
    </table>

</div>  





