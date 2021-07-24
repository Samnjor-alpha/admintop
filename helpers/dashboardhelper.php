<?php
$tips=mysqli_query($conn, "select * from predictions where status='0'");
$tippedgames=mysqli_query($conn,"select * from fixtures");

$markets=mysqli_query($conn,"select * from mrkt_categories order by mrkt_name asc");

//functions
function counttipsters(){
global $conn;
$count=mysqli_query($conn,"select count(*) as total from tipsters");
    return mysqli_fetch_assoc($count)['total'];
}
function countvisits(){
    global $conn;
    $count=mysqli_query($conn,"select count(*) as total from ipdb");
    return mysqli_fetch_assoc($count)['total'];
}
function countusers(){
    global $conn;
    $count=mysqli_query($conn,"select count(*) as total from users");
    return mysqli_fetch_assoc($count)['total'];
}
function countblogviews(){
    global $conn;
    $count=mysqli_query($conn,"select count(*) as total from article_views");
    return mysqli_fetch_assoc($count)['total'];
}
function countblogs(){
    global $conn;
    $count=mysqli_query($conn,"select count(*) as total from articles");
    return mysqli_fetch_assoc($count)['total'];
}
function countcompetitions(){

    global $conn;
    $count=mysqli_query($conn,"select count(*) as total from competitions");
    return mysqli_fetch_assoc($count)['total'];
}
function countpredictions(){
    global $conn;

    $count=mysqli_query($conn,"select count(*) as total from predictions");
    return mysqli_fetch_assoc($count)['total'];
}
function countbetting(){
    global $conn;
    $count=mysqli_query($conn,"select count(*) as total from mrkt_categories");
    return mysqli_fetch_assoc($count)['total'];
}


function geteamNameById($id)
{
    global $conn;
    $results = mysqli_query($conn, "SELECT team_name FROM teams WHERE team_id =" . $id . " LIMIT 1");

    return mysqli_fetch_assoc($results)['team_name'];
}
function getcompNameById($id)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT comp_name FROM competitions WHERE comp_id =" . $id . " LIMIT 1");

    return mysqli_fetch_assoc($result)['comp_name'];
}
function getmarketnamebyid($id){
    global $conn;
    $result = mysqli_query($conn, "SELECT mrkt_name FROM mrkt_categories WHERE mrkt_id =" . $id . " LIMIT 1");

    return mysqli_fetch_assoc($result)['mrkt_name'];
}
function gettipnamebyid($id){
    global $conn;
    $result = mysqli_query($conn, "SELECT mrkt_name FROM ftmarkets WHERE mrkt_id =" . $id . " LIMIT 1");

    return mysqli_fetch_assoc($result)['mrkt_name'];
}
function gettipresultbyid($id){
    global $conn;
    $result = mysqli_query($conn, "SELECT result FROM predictions WHERE id ='$id'");

    return mysqli_fetch_assoc($result)['result'];
}
function gettipsterbyid($id){
global $conn;
$tipstername=mysqli_query($conn,"select tipster_name from tipsters where tipster_id='$id'");
return mysqli_fetch_assoc($tipstername)['tipster_name'];


}

function tipstatusname($id){
    $status= "";
    if ($id==0){
        $status='<i class="text-secondary fad fa-hourglass-start"></i>';

    }elseif ($id==1){
        $status='<i class="text-success fal fa-check-circle"></i>';
    }elseif($id==2){
        $status='<i class="text-danger fal fa-times-circle"></i>';
    }else{
        $status="match not played";
    }
    return $status;
}
