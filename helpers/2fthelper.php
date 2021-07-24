<?
function getmarketid($marketname){
    global $conn;
    $getid=mysqli_query($conn,"select mrkt_id from ftmarkets where mrkt_name='$marketname'");
    return mysqli_fetch_assoc($getid)['mrkt_id'];
}
function checkmatch_winner($gameid,$tipid,$mrktid){
    global $conn;
    $takescores=mysqli_query($conn,"select ft_hscore,ft_ascore from fixtures where fix_code='$gameid' and status='2'");
    if (mysqli_num_rows($takescores)>0) {


        $scores=$takescores->fetch_assoc();

        $hscore=$scores['ft_hscore'];
        $ascore=$scores['ft_ascore'];



        $status='';
        $statusclass="";
        if ($ascore>$hscore) {
            $status='1';
            $updateresult=mysqli_query($conn,"update predictions set result='$status' where id='$tipid' and tip_id='$mrktid'");
            $statusclass="won";
        }else{
            $status='2';
            $statusclass="Lost";
            $updateresult=mysqli_query($conn,"update predictions set result='$status' where id='$tipid' and tip_id='$mrktid'");
        }


    }}
    function gethomescoreft($gameid){
      global $conn;
      $takescores=mysqli_query($conn,"select ft_ascore from fixtures where fix_code='$gameid'");
    $scores=$takescores->fetch_assoc();
    $score='';
      if ($scores['ft_ascore']>=0) {

      $score=$scores['ft_ascore'];
    }else{
      $score='-';
    }

      return $score;
    }
  function getawayscoreft($gameid){
    global $conn;
    $takescores=mysqli_query($conn,"select ft_hscore from fixtures where fix_code='$gameid'");
  $scores=$takescores->fetch_assoc();
  $score='';
    if ($scores['ft_hscore']>=0) {

    $score=$scores['ft_hscore'];
  }else{
    $score='-';
  }

    return $score;
  }
getmarketid("Away team to win");

$id=getmarketid("Away team to win");


//$awayteamwintips=mysqli_query($conn,"select * from predictions where tip_id='$id'");

if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}

$total_records_per_page = 10;
$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";

$result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM predictions INNER JOIN fixtures ON fixtures.fix_code = predictions.game_id
WHERE DATE(fixtures.kick_off) >='$today'  and predictions.tip_id = '$id'");
$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total page minus 1






$awayteamwintips=mysqli_query($conn, "SELECT * FROM  predictions	INNER JOIN fixtures ON fixtures.fix_code = predictions.game_id
WHERE DATE(fixtures.kick_off) >='$today'  and predictions.tip_id = '$id' order by predictions.tipped_at DESC LIMIT $offset, $total_records_per_page");

//
// =mysqli_query($conn, "SELECT * FROM predictions	INNER JOIN fixtures ON fixtures.fix_code = predictions.game_id
// WHERE DATE('fixtures.kick_off') = DATE($today)  and predictions.tip_id = '$id' ORDER BY predictions.tipped_at DESC,predictions.status");
