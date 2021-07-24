<?php
$mrkts_categs=mysqli_query($conn,"Select * from mrkt_categories");
if (mysqli_num_rows($mrkts_categs)<1) {
    echo "<script>
alert('No Market Categories added');
	window.location.href='../dashboard/addnewmarket.php';
</script>";
}elseif (isset($_POST['addhtmrkt'])){
    $mrkt_categid = filter_var(stripslashes($_POST['mrkt_categ']), FILTER_SANITIZE_STRING);
    $mrktname = filter_var(stripslashes($_POST['mrkt']), FILTER_SANITIZE_STRING);
    $mrktdesc=filter_var(stripslashes($_POST['mrktdesc']),FILTER_SANITIZE_STRING);
    if (empty($_POST['mrktdesc']) || empty($_POST['mrkt']) || empty($_POST['mrkt_categ'])) {
        $msg = "inputs can not be empty";
        $msg_class=" alert-danger";
    } else{
        $sql_e = "SELECT * FROM htmarkets WHERE mrkt_name ='$mrktname'";

        $res_e = mysqli_query($conn, $sql_e);


        if (mysqli_num_rows($res_e)>0){
            $msg = "Market  already added";
            $msg_class = " alert-danger";
        }else{
            if(empty($error)) {

                $sql = "INSERT INTO htmarkets SET mrktcateg_id='$mrkt_categid',mrkt_name ='$mrktname',mrkt_desc='$mrktdesc'";
                if (mysqli_query($conn, $sql)) {
                    $sql = "UPDATE mrkt_categories SET mrkt_count=mrkt_count+1 where mrkt_id='$mrkt_categid'";
                    if (mysqli_query($conn, $sql)) {

                        $msg = "Market added successfully!!";
                        $msg_class = " alert-success";


                    }}else{
                    $msg = "There was an Error in the database";
                    $msg_class=" alert-danger";
                }


            }

        }

}}