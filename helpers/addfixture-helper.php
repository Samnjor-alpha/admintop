<?php
function creatematchCode() {
    $chars = "003232303232023232023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 4) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }
    return $pass;
}
$Matchcode='FIX-'.creatematchCode();
$code=$_GET['code'];
if(!isset($_GET['code'])){

    header("location:../dashboard/addfixture.php?code=$Matchcode");
}else {
    $competitions = mysqli_query($conn, "select * from competitions");
    if (mysqli_num_rows($competitions) < 1) {
        $comp = BASE_URL . '/dashboard/addcompetition.php';
        header("location:$comp");
        echo "<script>
alert('Add competition');
</script>";

    }else{
        $teams = mysqli_query($conn, "select * from teams");
        $teamsa = mysqli_query($conn, "select * from teams");
        if (mysqli_num_rows($teams) < 1) {
            $comp = BASE_URL . '/dashboard/addclub.php';
            header("location:$comp");
            echo "<script>
alert('Add clubs');
</script>";

        }
    }
}

if (isset($_POST['addfix'])) {
    $code=$_GET['code'];

    $region = filter_var(stripslashes($_POST['compname']), FILTER_SANITIZE_STRING);
    $hteam = filter_var(stripslashes($_POST['hteam']), FILTER_SANITIZE_STRING);
    $ateam = filter_var(stripslashes($_POST['ateam']), FILTER_SANITIZE_STRING);
    $kickoff = filter_var(stripslashes($_POST['kickoff']), FILTER_SANITIZE_STRING);
    $venue = filter_var(stripslashes($_POST['venue']), FILTER_SANITIZE_STRING);
    $desc=filter_var(stripslashes(htmlentities($_POST['fixdesc'])),FILTER_SANITIZE_STRING);




    //$kicktime=date('Y-m-d h:i',strtotime($kickoff));

   $kicktime=date("Y-m-d H:i", strtotime($kickoff));

    if (empty($_POST['compname']) || empty($_POST['hteam']|| empty($_POST['ateam'])|| empty($_POST['kickoff']) || empty($_POST['venue']) || empty($_POST['fixdesc']))) {
        $msg = "inputs can not be empty";
        $msg_class=" alert-danger";
    } else{
        $td= date('Y-m-d H:i');
        $date2 = new DateTime($kicktime);
        $dt2=$date2->format('Y-m-d H:i');
        if ($dt2<$td){
            $msg = "You cant enter previous matches";
            $msg_class=" alert-danger";
        }elseif($_POST['hteam']==$_POST['ateam']){
            $msg = "A team cant play against each other";
            $msg_class=" alert-danger";
        }else{
                $sql_e = "SELECT * FROM fixtures WHERE fix_code='$code'";

                $res_e = mysqli_query($conn, $sql_e);


                if (mysqli_num_rows($res_e)>0){
                    $msg = "Fixture already added";
                    $msg_class = " alert-danger";
                }else{
                    if(empty($error)) {

                        $sql = "INSERT INTO fixtures SET fix_code='$code',c_id='$region',h_team='$hteam',a_team='$ateam',kick_off='$kicktime',venue='$venue',fix_desc='$desc'";
                        if (mysqli_query($conn, $sql)) {
                            echo "<script type='text/javascript'>
  					alert('fixture added successfully')
  					window.location.href='../dashboard/addfixture?code=$Matchcode';
  					
</script>";



                        }else{
                            $msg =$kicktime;
                            $msg_class=" alert-danger";
                        }


                    }
                }
            }





}}