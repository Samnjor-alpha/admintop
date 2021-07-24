<?php
if(!isset($_GET['clubid'])){

    header("location:../dashboard/manageclub.php");
}else {

    $clubid=$_GET['clubid'];

    $clubs=mysqli_query($conn,"Select * from teams where team_id='$clubid'");

    $row_clubs=$clubs->fetch_assoc();
    if (isset($_POST['upd_club'])) {
        //    $cpwd = stripslashes($_POST['cpassword']);
        $region = filter_var(stripslashes($_POST['region']), FILTER_SANITIZE_STRING);
        $clubname = filter_var(stripslashes($_POST['clubname']), FILTER_SANITIZE_STRING);
        $logo = filter_var(stripslashes($_POST['logo']), FILTER_SANITIZE_STRING);
        $desc=filter_var(stripslashes($_POST['clubdesc']),FILTER_SANITIZE_STRING);








        if (empty($_POST['region']) || empty($_POST['clubname']|| empty($_POST['logo'])|| empty($_POST['clubdesc']))) {
            $msg = "inputs can not be empty";
            $msg_class=" alert-danger";
        } else{
            if(!empty($_POST["logo"])) {
                $logo = $_POST["logo"];
                if (filter_var($logo, FILTER_VALIDATE_URL) === false) {

                    $msg = 'invalid link';
                    $msg_class = ' alert-danger';
                } else if (!@getimagesize($logo)) {
                    $msg = "The link has no image";
                    $msg_class = " alert-danger";
                } else {

                    $sql_e = "SELECT * FROM teams WHERE team_name='$clubname'and not team_id='$clubid'";

                    $res_e = mysqli_query($conn, $sql_e);


                    if (mysqli_num_rows($res_e)>0){
                        $msg = "Club already added";
                        $msg_class = " alert-danger";
                    }else{





                        if(empty($error)) {

                            $sql = "UPDATE teams SET team_region='$region',team_name='$clubname',team_logo='$logo',abt_team='$desc' where team_id='$clubid'";
                            if (mysqli_query($conn, $sql)) {

                                $msg="Club updated successfully!!";
                                $msg_class=" alert-success";


                            }else{
                                $msg = "There was an Error in the database";
                                $msg_class=" alert-danger";
                            }


                        }
                    }
                }


            }

        }
    }
























}
$teams=mysqli_query($conn,"Select * from teams where not team_id='$clubid' ");
