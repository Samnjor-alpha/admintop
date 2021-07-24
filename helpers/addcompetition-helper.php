<?php
$msg = "";
$msg_class = "";


//insert competitions
if (isset($_POST['addcomp'])) {
    //    $cpwd = stripslashes($_POST['cpassword']);
    $region = filter_var(stripslashes($_POST['region']), FILTER_SANITIZE_STRING);
    $compname = filter_var(stripslashes($_POST['compname']), FILTER_SANITIZE_STRING);
    $logo = filter_var(stripslashes($_POST['logo']), FILTER_SANITIZE_STRING);
    $desc=filter_var(stripslashes($_POST['compdesc']),FILTER_SANITIZE_STRING);








    if (empty($_POST['region']) || empty($_POST['compname']|| empty($_POST['logo'])|| empty($_POST['compdesc']))) {
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

                    $sql_e = "SELECT * FROM competitions WHERE comp_name='$compname'";

                    $res_e = mysqli_query($conn, $sql_e);


                    if (mysqli_num_rows($res_e)>0){
                        $msg = "Competition already added";
                        $msg_class = " alert-danger";
                    }else{





                                if(empty($error)) {

                                    $sql = "INSERT INTO competitions SET comp_region='$region',comp_name='$compname',comp_logo='$logo',comp_desc='$desc'";
                                    if (mysqli_query($conn, $sql)) {

                                        $msg="Competition added successfully!!";
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

//Query competitions

$competitions=mysqli_query($conn,"Select * from competitions");
