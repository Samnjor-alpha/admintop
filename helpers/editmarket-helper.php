<?php
if(!isset($_GET['categ'])){

    header("location:../dashboard/managemarket.php");
}else {

$categid=$_GET['categ'];

    $market=mysqli_query($conn,"Select * from mrkt_categories where mrkt_id='$categid'");

    $row_categ=$market->fetch_assoc();

if (isset($_POST['upmrkt']))    {
    $mrktname = filter_var(stripslashes($_POST['mrkt']), FILTER_SANITIZE_STRING);
    $mrktdesc=filter_var(stripslashes($_POST['mrktdesc']),FILTER_SANITIZE_STRING);

    if (empty($_POST['mrktdesc']) || empty($_POST['mrkt'])) {
        $msg = "inputs can not be empty";
        $msg_class=" alert-danger";
    } else{


        $sql_e = "SELECT * FROM mrkt_categories WHERE mrkt_name ='$mrktname' and not mrkt_id='$categid'";

        $res_e = mysqli_query($conn, $sql_e);


        if (mysqli_num_rows($res_e)>0){
            $msg = "Market Category already added";
            $msg_class = " alert-danger";
        }else{
            if(empty($error)) {

                $sql = "update mrkt_categories SET mrkt_name ='$mrktname',mrkt_desc='$mrktdesc' where mrkt_id='$categid'";
                if (mysqli_query($conn, $sql)) {

                    $msg="Market updated successfully!!";
                    $msg_class=" alert-success";


                }else{
                    $msg = "There was an Error in the database";
                    $msg_class=" alert-danger";
                }


            }

        }
    }

}



















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


}