<?php
date_default_timezone_set("Africa/Nairobi");
$today=date('Y-m-d');

$allfixtures=mysqli_query($conn,"select * from fixtures where  DATE('kick_off') <= DATE($today)  and status='2' order by  kick_off DESC");

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

function getCompnameById($id)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT comp_name FROM competitions WHERE comp_id =" . $id . " LIMIT 1");

    return mysqli_fetch_assoc($result)['comp_name'];
}