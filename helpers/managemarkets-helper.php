<?php

$markets=mysqli_query($conn,"Select * from mrkt_categories");
if (mysqli_num_rows($markets)<1){
    echo "<script>
alert('No Markets available');
	window.location.href='../dashboard/addnewmarket.php';
</script>";

}else{
    $htmarkets=mysqli_query($conn,"Select * from htmarkets");
    $ftmarkets=mysqli_query($conn,"Select * from ftmarkets");
function getmarketcategById($mrktid)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT mrkt_name FROM mrkt_categories WHERE mrkt_id =" . $mrktid . " LIMIT 1");
    // return the username
    return mysqli_fetch_assoc($result)['mrkt_name'];
}

}