<?php

    $link = mysqli_connect("shareddb1c.hosting.stackcp.net","frankhartpoems-3136bd91","password98@","frankhartpoems-3136bd91");

    $login = -1;

    $accountType = 0;

    $id = 0;

    $name = "";

    $attendance = 0;

    $tname = "";

    $course = Array();

    $slot = Array();

    $hour = Array();

    $subcode = Array();

    $batch = Array();

    $otpgen = -1;

    $normalOTP = -1;

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

    if($_GET['log'] == 1) {

        $query = "SELECT * FROM `teacherreg` WHERE email = '".mysqli_real_escape_string($link, $_GET['email'])."'";
        $query1 = "SELECT * FROM `studentreg` WHERE email = '".mysqli_real_escape_string($link, $_GET['email'])."'";
         
        $result = mysqli_query($link, $query);
        $result1 = mysqli_query($link, $query1);

        if(mysqli_num_rows($result) == 0 && mysqli_num_rows($result1) == 0) {

            $login = 0;

        } else {

            if(mysqli_num_rows($result) == 0 && mysqli_num_rows($result1)>0) {

                $row = mysqli_fetch_array($result1);

                if($row['registered'] == 0) {

                    $query2 = "UPDATE `studentreg` SET registered=1 WHERE regno = '".$row['regno']."'";
                    mysqli_query($link, $query2);

                }

                $accountType = 1;

                $id = $row['regno'];

                $name = $row['sname'];

            } else if(mysqli_num_rows($result)>0 && mysqli_num_rows($result1)==0) {

                $row = mysqli_fetch_array($result);

                if($row['registered'] == 0) {

                    $query2 = "UPDATE `teacherreg` SET registered=1 WHERE tid = '".$row['tid']."'";
                    mysqli_query($link, $query2);

                }

                $accountType = 2;

                $id = $row['tid'];

                $name = $row['tname'];

            }

            if(hash('sha512',$_GET['pass']) == $row['password']) {

                $login = 1;

            } else {

                $login = 2;

            }

        }

    } else if($_GET['log'] == 2) {

        $query = "SELECT * FROM `student` WHERE reg = '".mysqli_real_escape_string($link, $_GET['regno'])."' AND subcode = '".mysqli_real_escape_string($link, $_GET['subcode'])."'";

        $row = mysqli_fetch_array(mysqli_query($link, $query));

        $query1 = "SELECT `tname` FROM `teacherreg` WHERE tid = '".$row['tid']."'";

        $row1 = mysqli_fetch_array(mysqli_query($link, $query1));

        $query2 = "SELECT `password`  FROM `studentreg` WHERE regno = '".$_GET['regno']."'";

        $row2 = mysqli_fetch_array(mysqli_query($link, $query2));

        if(hash('sha512',$_GET['otp']) == $row['otp'] && $_GET['pass'] == "") {

            $tname = $row1['tname'];

        } else {

            if(hash('sha512',$_GET['otp']) == $row['otp'] && hash('sha512',$_GET['pass']) == $row2['password']) {

                $attendance = 1;

                $query1 = "INSERT INTO `attendance`(`tid`,`regno`,`slot`,`batch`,`subcode`) VALUES('".mysqli_real_escape_string($link, $row['tid'])."', '".
                mysqli_real_escape_string($link, $_GET['regno'])."', '".mysqli_real_escape_string($link, $row['slot'])."', '".mysqli_real_escape_string($link, $row['batch'])."', '".
                mysqli_real_escape_string($link, $_GET['subcode'])."')";

                mysqli_query($link, $query1);

            } else if($row['otp'] == "") {

                $attendance = 5;

            } else if(hash('sha512',$_GET['otp']) == $row['otp'] && hash('sha512',$_GET['pass']) != $row2['password']) {

                $attendance = 2;

            } else if(hash('sha512',$_GET['otp']) != $row['otp'] && hash('sha512',$_GET['pass']) == $row2['password']) {

                $attendance = 3;

            } else {

                $attendance = 4;

            }

        }

    } else if($_GET['log'] == 3) {

        $do = $_GET['do'];

        $query = "SELECT * FROM `teacher` WHERE tid='".mysqli_real_escape_string($link, $_GET['tid'])."'";

        if($result = mysqli_query($link, $query)) {

            while($row = mysqli_fetch_array($result)) {

                $do = $row['do'];

                $do = explode(' ',$do);

                if(in_array($_GET['do'],$do)) {

                    $pos = array_search($_GET['do'],$do);
                    $hr = $row['hour'];
                    $hr = explode(' ',$hr);
                    $hr = $hr[$pos];
                    $crse = str_replace(" ","",$row['course']);
                    array_push($course, $crse);
                    array_push($subcode, $row['subcode']);
                    array_push($batch, $row['batch']);
                    array_push($slot, $row['slot']);
                    array_push($hour, $hr);

                }

            }

        }

    } else if($_GET['log'] == 4) {

        $otp = mt_rand(100000, 999999);

        $normalOTP = $otp;

        $otp = hash('sha512',$otp);

        $query = "SELECT `id` FROM `student` WHERE otp = '".$otp."'";

        if(mysqli_num_rows(mysqli_query($link, $query))>0) {

            $otpgen = 0;

            $normalOTP = 0;

        } else {

            $query = "SELECT * FROM `teacher` WHERE tid='".mysqli_real_escape_string($link, $_GET['tid']).
            "' AND batch='".mysqli_real_escape_string($link, $_GET['batch'])."' AND slot = '".mysqli_real_escape_string($link, $_GET['slot'])."' AND subcode = '".
            mysqli_real_escape_string($link, $_GET['subcode'])."'";
    
            $result = mysqli_query($link, $query);

            if(mysqli_num_rows($result) == 0) {

                $otpgen = 2;

            } else {

                $otpgen = 1;

                $query = "UPDATE `student` SET `otp`='".$otp."' WHERE tid='".mysqli_real_escape_string($link, $_GET['tid']).
                "' AND batch='".mysqli_real_escape_string($link, $_GET['batch'])."' AND slot = '".mysqli_real_escape_string($link, $_GET['slot'])."' AND subcode = '".
                mysqli_real_escape_string($link, $_GET['subcode'])."'";
        
                $result = mysqli_query($link, $query);

            }

        }

    } 

    $results = Array("login" => $login,"accountType" => $accountType, "id" => $id, "name" => $name, "attendance" => $attendance, "tname" => $tname, "course" => $course,
    "subcode" => $subcode, "batch" => $batch, "slot" => $slot, "hour" => $hour, "otpgen" => $otpgen, "normalOTP" => $normalOTP);

    header("Content-Type: application/json");
    echo json_encode($results);

?>