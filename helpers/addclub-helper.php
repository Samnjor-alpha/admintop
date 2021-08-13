<?php
$msg = "";
$msg_class = "";

$countries=mysqli_query($conn,"select * from teams group by team_region");
//insert teams
if (isset($_POST['addclub'])) {
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

                $sql_e = "SELECT * FROM teams WHERE team_name='$clubname'";

                $res_e = mysqli_query($conn, $sql_e);


                if (mysqli_num_rows($res_e)>0){
                    $msg = "Club already added";
                    $msg_class = " alert-danger";
                }else{





                    if(empty($error)) {

                        $sql = "INSERT INTO teams SET team_region='$region',team_name='$clubname',team_logo='$logo',abt_team='$desc'";
                        if (mysqli_query($conn, $sql)) {
                            echo "<script type='text/javascript'>
  					alert( 'Club added successfully!!');
  						window.location.href='../dashboard/addclub.php';
</script>";



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

//Query teams
if (isset($_POST['filter'])){
    $region=$_POST['region'];
    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
        $page_no = $_GET['page_no'];
        $region=$_POST['region'];
    } else {
        $page_no = 1;
    }

    $total_records_per_page = 10;
    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";

    $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM teams where team_region LIKE '%{$region}%'");
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1

    $teams = mysqli_query($conn, "Select * from teams where team_region LIKE '%{$region}%' order by team_name asc LIMIT $offset, $total_records_per_page");
}else {

    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
        $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
    }

    $total_records_per_page = 10;
    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";

    $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM teams");
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1

    $teams = mysqli_query($conn, "Select * from teams   order by team_name asc LIMIT $offset, $total_records_per_page");
}