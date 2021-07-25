<?php
include '../config/config.php';
$id=$_GET['categid'];
$market=mysqli_query($conn,"Select * from htmarkets where mrkt_id='$id'");

$row_htmrkt=$market->fetch_assoc();
$mrktcateg=$row_htmrkt['mrktcateg_id'];
$update_m="UPDATE mrkt_categories SET mrkt_count=mrkt_count-1 where mrkt_id='$mrktcateg'";
if(mysqli_query($conn,$update_m)){
    $sql = "DELETE FROM htmarkets WHERE mrkt_id='$id'";
    if (mysqli_query($conn, $sql)) {
        $redirect= BASE_URL. '/dashboard/managemarket.php';
        header( "location:$redirect" );
        echo "<script>
alert('Deleted successfully');
</script>";

    }}else{
    echo "<script>
alert('Something wrong happened');
</script>";
}

