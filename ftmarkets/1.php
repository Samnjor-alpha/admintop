<?php
date_default_timezone_set("Africa/Nairobi");
$today=date('Y-m-d');
include '../sessions/session.php';
include '../helpers/dashboardhelper.php';
include '../helpers/1fthelper.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>
    <? include'../public/dashboardstyles.php' ?>
</head>
<body class="sb-nav-fixed">
<? include '../navs/topbar.php' ?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <? include '../navs/sidebar.php' ?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">

                <ol class="breadcrumb mt-4 mb-4">
                    <li class="breadcrumb-item active">(Home Team to win) Predictions</li>
                </ol>

                <? if (mysqli_num_rows($hometeamwintips)>0){
                    while ($tipsrow=$hometeamwintips->fetch_assoc()){
                        $game=mysqli_query($conn,"select * from fixtures where fix_code='".$tipsrow['game_id']."'");
                        $gamerow=$game->fetch_assoc();
                        checkmatch_winner($tipsrow['game_id'],$tipsrow['id'],$tipsrow['tip_id'])
                        ?>


                        <div class="row justify-content-lg-center">
                            <div class="col-xl-6 col-md-6 mb-1">
                                <div class="card  shadow h-100">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5">
                                                <strong class="float-left"><? echo geteamNameById($gamerow['h_team']) ?></strong>
                                            </div>
                                            <div class="col-2">
                                                <strong class="text-center">VS</strong>
                                            </div>
                                            <div class="col-5">
                                                <strong class="float-right"><? echo geteamNameById($gamerow['a_team']) ?></strong>
                                            </div>
                                        </div>
                                        <div class="details mt-2">
                                          <div class="row">
                                              <div class="col-12">
                                                  <h6 class="float-left"><a class="text-primary"><? echo gettipsterbyid($tipsrow['tipster_id'])?></a> tipped <strong><? echo gettipnamebyid($tipsrow['tip_id']) ?></strong></h6>
                                              </div>

                                          </div>
                                        </div>
                                        <div id="accordion">
            <?php $i= $tipsrow['id']; ?>
            <div class="">
                <div class="text-center mt-0 content">
                    <a class="btn btn-outline-info text-primary text-center"  data-toggle="collapse"
                       href="#collapse<?php echo $tipsrow['id']; ?>">
                        View Tip Result
                    </a></div>

                <div id="collapse<?php echo $tipsrow['id']; ?>" class="collapse" data-parent="#accordion">

                      <div class="details mt-2">
                        <div class="row">
                            <div class="col-6">
                                <h6 class="float-left">Goals(FT):</h6>
                            </div>
                            <div class="col-3">
                                <strong class="text-center"><? echo getawayscoreft($tipsrow['game_id']) ?></strong> :                                                <strong class="text-center"><? echo gethomescoreft($tipsrow['game_id']) ?></strong>

                            </div>
                        </div>
                        </div>

                  <div class="row">
                      <div class="col-6">
                          <h6 class="float-left">Status: <? echo tipstatusname(gettipresultbyid($tipsrow['id']))?></h6>
                      </div>

                  </div>
                </div>
              </div>
        </div>



                                    </div>
                                </div>
                            </div>

                        </div>

                    <? }}?>
                    <?php if ($total_no_of_pages>0){ ?>
                               <div class="">

                                       <div class="justify-content-center" style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
                                           <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
                                       </div>
                                   <div class="row">
                                       <div class="col-md-12">

                                           <? include 'pagination.php'?>
                                       </div><!-- end col -->
                                   </div><!-- end row -->
                               </div>
                           <?}?>
            </div>



        </main>
        <?php require_once '../navs/footer.php' ?>

    </div>
    <? include '../public/dashboardscripts.php' ?>
</body>
</html>
