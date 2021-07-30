<?php
date_default_timezone_set($time_zone);
$today=date('Y-m-d');

$updatetodayscores=mysqli_query($conn,"select * from fixtures where  status='0' or status='1' order by status ASC, kick_off ASC");

if (mysqli_num_rows($updatetodayscores)<1){
    echo "<script>
alert('No matches scheduled today');
	window.location.href='../dashboard/addfixture.php';
</script>";

}else{

    if(isset($_POST['upHT'])){
        if (empty($_POST['gameid'])) {
            $msg = "inputs can not be empty";
            $msg_class=" alert-danger";
        }else if($_POST['ht_hscore']<0 || $_POST['ht_hscore']>30) {
        $msg='Real scores required';
        $msg_class='alert-danger';
        }else if($_POST['ht_ascore']<0 ||$_POST['ht_ascore']>30){
            $msg='Real scores required';
            $msg_class='alert-danger';
        }else{

            $gameid=$_POST['gameid'];

        $ht_hscore=$_POST['ht_hscore'];
        $ht_ascore=$_POST['ht_ascore'];




        if(empty($error)) {

                $sql = "UPDATE fixtures SET ht_hscore='$ht_hscore', ht_ascore='$ht_ascore'  where f_id='$gameid'";
                if (mysqli_query($conn, $sql)) {
                    echo "<script type='text/javascript'>
  					alert('HT scores Updated successfully')
  					window.location.href='../dashboard/updatescores.php';
  					
</script>";



                }else{
                    $msg ="Error occured in the database";
                    $msg_class=" alert-danger";
                }


            }
    }

}

    if(isset($_POST['upFT'])){
        if (empty($_POST['gameid'])) {
            $msg = "inputs can not be empty";
            $msg_class=" alert-danger";

        }else if($_POST['ft_hscore']<0 || $_POST['ft_hscore']>30) {
            $msg='Real scores required';
            $msg_class='alert-danger';
        }else if($_POST['ft_ascore']<0 ||$_POST['ft_ascore']>30){
            $msg='Real scores required';
            $msg_class='alert-danger';
        }else{
            $gameid=$_POST['gameid'];
            $ft_hscore=$_POST['ft_hscore'];
            $ft_ascore=$_POST['ft_ascore'];


            $updateFTscores=mysqli_query($conn,"select * from fixtures where  f_id='$gameid'");
            $score_row=$updateFTscores->fetch_assoc();
            $ht_hscore=$score_row['ht_hscore'];
            $ht_ascore=$score_row['ht_ascore'];

            if ($ht_hscore>$ft_hscore){
                $msg = "HT Homescore cannot be greater than FT Home score ";
                $msg_class=" alert-danger";
            } elseif ($ht_ascore>$ft_ascore){
                $msg = "HT Awayscore cannot be greater than FT Away score ";
                $msg_class=" alert-danger";
            }else{
            if(empty($error)) {

                $sql = "UPDATE fixtures SET ft_hscore='$ft_hscore', ft_ascore='$ft_ascore' where f_id='$gameid'";
                if (mysqli_query($conn, $sql)) {
                    echo "<script type='text/javascript'>
  					alert('FT scores Updated successfully')
  					window.location.href='../dashboard/updatescores.php';
  					
</script>";



                }else{
                    $msg ="Error occured in the database";
                    $msg_class=" alert-danger";
                }


            }
        }

    }













































}}
function geteamNameById($id)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT team_name FROM teams WHERE team_id =" . $id . " LIMIT 1");

    return mysqli_fetch_assoc($result)['team_name'];
}
function geteamLogoById($id)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT team_logo FROM teams WHERE team_id =" . $id . " LIMIT 1");

    return mysqli_fetch_assoc($result)['team_logo'];
}