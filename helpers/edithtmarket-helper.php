<?php
if(!isset($_GET['categ'])){

    header("location:../dashboard/managemarket.php");
}else {

    $categid=$_GET['categ'];
    $mrkts_categs=mysqli_query($conn,"Select * from mrkt_categories");
    $market=mysqli_query($conn,"Select * from htmarkets where mrkt_id='$categid'");

    $row_htmrkt=$market->fetch_assoc();
    $mrktcateg=$row_htmrkt['mrktcateg_id'];

    if (isset($_POST['uphtmrkt']))    {
        $mrkt_categid = filter_var(stripslashes($_POST['mrkt_categ']), FILTER_SANITIZE_STRING);
        $mrktname = filter_var(stripslashes($_POST['mrkt']), FILTER_SANITIZE_STRING);
        $mrktdesc=filter_var(stripslashes($_POST['mrktdesc']),FILTER_SANITIZE_STRING);
        if (empty($_POST['mrktdesc']) || empty($_POST['mrkt']) || empty($_POST['mrkt_categ'])) {
            $msg = "inputs can not be empty";
            $msg_class=" alert-danger";
        } else{

            $sql_e = "SELECT * FROM htmarkets WHERE mrkt_name ='$mrktname' and not mrkt_id='$categid'";

            $res_e = mysqli_query($conn, $sql_e);


            if (mysqli_num_rows($res_e)>0){
                $msg = "Market Category already added";
                $msg_class = " alert-danger";
            }else{

                if(empty($error)) {

                    $sql = "update htmarkets SET mrkt_name ='$mrktname',mrkt_desc='$mrktdesc' ,mrktcateg_id='$mrkt_categid' where mrkt_id='$categid'";
                    if (mysqli_query($conn, $sql)) {
                        if ($mrkt_categid!=$mrktcateg){

                            $update_p=mysqli_query($conn,"UPDATE mrkt_categories SET mrkt_count=mrkt_count+1 where mrkt_id='$mrkt_categid'");
                            $update_m=mysqli_query($conn,"UPDATE mrkt_categories SET mrkt_count=mrkt_count-1 where mrkt_id='$mrktcateg'");

                            $msg="Market updated successfully!!";
                            $msg_class=" alert-success";

                        }



                    }else{
                        $msg = "There was an Error in the database";
                        $msg_class=" alert-danger";
                    }


                }

            }
        }













        }}







    $htmarkets=mysqli_query($conn,"Select * from htmarkets");
    $ftmarkets=mysqli_query($conn,"Select * from ftmarkets");
    $markets=mysqli_query($conn,"Select * from mrkt_categories");


    function getmarketcategById($mrktid)
    {
        global $conn;
        $result = mysqli_query($conn, "SELECT mrkt_name FROM mrkt_categories WHERE mrkt_id =" . $mrktid . " LIMIT 1");
        // return the username
        return mysqli_fetch_assoc($result)['mrkt_name'];
    }


