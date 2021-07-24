<?php include '../sessions/session.php';
date_default_timezone_set("Africa/Nairobi");
include '../helpers/updatescoreshelper.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta http-equiv="refresh" content="120">

    <title>Update Scores</title>
    <? include'../public/dashboardstyles.php' ?>
    <link rel="stylesheet" href="../dist/css/matchdetails.css"/>
    <link rel="stylesheet" href="../dist/css/animate-fa.css"/>
</head>

<body class="sb-nav-fixed">
<? include '../navs/topbar.php' ?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <? include '../navs/sidebar.php' ?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <div class="row mt-5">
                    <div id="" class="col-lg-12 col-sm-12 col-md-12">
                        <div>
                            <?php if (!empty($msg)): ?>
                                <div class="alert <? echo $msg_class?> alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong><? echo $msg ?></strong>
                                </div>
                            <?php endif; ?>

                        </div>
                        <div class="container">
                            <div class="alert alert-secondary" role="alert">
                                <h3 class="text-center">Today Matches</h3>
                            </div>
                            <div id="accordion">
                                <?php $i=1;  while ($fix_row = $updatetodayscores->fetch_assoc()) {
                                    $cid=$fix_row['c_id'];
                                    $comps=mysqli_query($conn,"select * from competitions where comp_id='$cid'");
                                $row_comp=$comps->fetch_assoc();

                                    ?>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="text-primary" data-toggle="collapse"
                                           href="#collapse<?php echo $i; ?>">
                                            <div class="row">
                                                <div class="col-2 col-sm-2 d-inline-block">
                                                    <i class="fal fa-whistle"></i>
                                                    <?php
                                                    $dy=$fix_row['kick_off'];
                                                    $date2 = new DateTime("$dy");
                                                    echo $dt2=$date2->format("H:i");
                                                     ?>
                                                </div>
                                                <div class="col-4 col-sm-4 float-left">




                                                    <h5>
                                                        <img src="<? echo geteamLogoById($fix_row['h_team'])?>" style="border-radius:50%;height: 50px; width:50px;" class="img-thumbnail" alt="logo">
                                                        <?php
                                                    $gameid=$fix_row['f_id'];
                                                    echo geteamNameById($fix_row['h_team'])?>
                                                    </h5></div>
                                                <h6 class=" col-2 col-sm-2 text-center">VS</h6>
                                                <div class="col-4 col-sm-4 text-right">
                                                    <h5>
                                                        <img src="<? echo geteamLogoById($fix_row['a_team'])?>" style="border-radius:50%;height: 50px; width:50px;" class="img-thumbnail" alt="logo">
                                                        <?php
                                                        echo geteamNameById($fix_row['a_team']) ?></h5></div>
                                            </div>
                                        </a>
                                    </div>
                                    <?
                                    $statfix=$fix_row['status'];
                                    if($statfix==0){
                                        $status='Match Not started';
                                        $statusclass='bg';
                                    }elseif ($statfix==1){
                                        $status='Match Started';
                                        $statusclass='bg-started';
                                    }else{
                                        $status='Match Finished';
                                        $statusclass='bg-finished';
                                    }
                                    ?>
                                    <div id="collapse<?php echo $i; ?>" class="collapse <?php if ($i == 1) {
                                        echo 'show';
                                    } ?>" data-parent="#accordion">
                                        <div class="card-body justify-content-center align-content-center">
                                            <div class="wrapper mb-2">

                                                <div class="outer">
                                                    <div class="content">
                                                        <h4 class="text-center">Match Details</h4>
                                                        <span class="<? echo $statusclass?> animated fadeInDown"><?echo $status ?></span>
                                                                         <div class="desc">
                                                                             <h5 class="text-center text-capitalize"> <img src="<? echo $row_comp['comp_logo']?>" style="border-radius:50%;height: 40px"  alt="logo"> <? echo $row_comp['comp_name'] ?></h5>

                                                            <p>  <? echo $fix_row['fix_desc'] ?></p>

                                                        </div>
                                                        <div class="details text-capitalize ">
                                                           <ul class="list-unstyled">
                                                               <li><i class="fal fa-drum-steelpan"></i> : <? echo $fix_row['venue']?> </li>
                                                               <li><i class="fal fa-analytics"></i> : <? echo $fix_row['tipped']?> </li>
                                                           </ul>
                                                        </div>
                                                        <hr>
<div class="row scores">
    <div class="col-md-6">
    <? if ($fix_row['ht_hscore']>=0 && $fix_row['ht_ascore']>=0){?>
        Half Time: <?echo $fix_row['ht_hscore'] ?> : <? echo $fix_row['ht_ascore']?>
    <? }else{ ?>
        Half Time: --:--
    <? }?>
    </div>
    <div class="col-md-6">
    <? if ($fix_row['ft_hscore']>=0 && $fix_row['ft_ascore']>=0){?>
        Full Time: <?echo $fix_row['ft_hscore'] ?> : <? echo $fix_row['ft_ascore']?>
    <? }else{ ?>
        Full Time: --:--
    <? }?>
</div>
</div>

                                                    </div>



                                                </div>
                                            </div>
                                            <?
                                            $time=$fix_row['kick_off'];
                                            $dy=$fix_row['kick_off'];
                                            $date2 = new DateTime("$dy");

                                             $dt2=$date2->format("Y-m-d H:i");
                                            $curtime= date('Y-m-d H:i');

                                            if(($curtime >=$dt2)) {

                                                $sql = mysqli_query($conn, "UPDATE fixtures SET  status='1' where f_id='$gameid'");
                                            if($fix_row['status']==2){
                                                $msg='Match Over';
                                                $msg='alert-info';
                                            }else{
                                             ?>
                                            <form class="form-inline" method="post" action="">
    <div class="row">
        <div class="col-md-4">
    <div class="form-group">
<input type="hidden" class="disabled" name="gameid" value="<? echo $gameid; ?>"
        <label for="hteam"></label>
        <input class="form-control py-2" min="-1" value="<?= isset($_POST['ht_hscore']) ? $_POST['ht_hscore'] : $fix_row['ht_hscore']; ?>" id="hteam" name="ht_hscore" type="text" placeholder="HT Homescore" />
    </div>
        </div>
        <div class="col-md-4">
    <div class="form-group">

        <input class="form-control py-2" value="<?= isset($_POST['ht_ascore']) ? $_POST['ht_ascore'] : $fix_row['ht_ascore']; ?>" id="hteam" name="ht_ascore" type="text" placeholder="HT  AwayScore" />
    </div>
        </div>
            <div class="col-md-4">
            <div class="form-group ml-4"><button id="btnHT" type="submit" name="upHT"  class="btn btn-primary btn-block">Update HT scores</button></div>
            </div>
        </div>

</form>
                                                <? }?>

                                            <? if ($fix_row['ht_hscore']< 0 && $fix_row['ht_ascore']<  0){

                                            }else if ($fix_row['ft_hscore']>=0 && $fix_row['ft_ascore']>=0) {

                                                    $sql = mysqli_query($conn, "UPDATE fixtures SET  status='2' where f_id='$gameid'");
                                                }else{?>
                                            <form class="form-inline mt-4" method="post" action="">

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="hidden" class="disabled" name="gameid" value="<? echo $gameid; ?>"
                                                            <label for="hteam"></label><input class="form-control py-2" value="<?= isset($_POST['ft_hscore']) ? $_POST['ft_hscore'] : $fix_row['ft_hscore']; ?>" id="hteam" name="ft_hscore" type="text" placeholder="FT Homescore" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">

                                                            <input class="form-control py-2" value="<?= isset($_POST['ft_ascore']) ? $_POST['ft_ascore'] : $fix_row['ft_ascore']; ?>" id="hteam" name="ft_ascore" type="text" placeholder="FT awayscore" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group ml-4"><button id="btnFT" type="submit" name="upFT"  class="btn btn-primary btn-block">Update FT scores</button></div>
                                                    </div>
                                                </div>

                                            </form>

<? }
                                            }?>



                                        </div>
                                    </div>
                                    <?php $i++;


                                    }?>


                                </div>
                            </div>


                        </div>
                    </div>




                </div>


        </main>
        <?php require_once '../navs/footer.php' ?>
    </div>
</div>
<? include '../public/dashboardscripts.php' ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#btnHT").click(function() {
// disable button
            $(this).prop("", true);
// add spinner to button
            $(this).html(
                '<i class="fas fa-futbol"></i>Updating HT Scores....'
            );
        });
        $("#btnFT").click(function() {
// disable button
            $(this).prop("", true);
// add spinner to button
            $(this).html(
                '<i class="fas fa-futbol"></i>Updating FT Scores....'
            );
        });
    });




</script>
</body>
</html>
