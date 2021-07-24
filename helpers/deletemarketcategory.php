<?php
include '../config/config.php';
$id=$_GET['categid'];

$sql = "DELETE FROM mrkt_categories WHERE mrkt_id='$id'";


if (mysqli_query($conn, $sql)) {
    $redirect= BASE_URL. '/dashboard/managemarket.php';
    header( "refresh:0;url=$redirect" );
    echo "<script>
alert('Deleted successfully');
</script>";

}else{
    echo "<script>
alert('Something wrong happened');
</script>";
}

