<?php include '../sessions/session.php';
include '../helpers/previousfixtures-helper.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Previous Fixtures</title>
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


                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div  id="s" class="card rounded-top mt-4">
                                <div class="card-header">
                                    <i class="fas fa-futbol mr-1"></i>
                                   Previous Fixtures
                                </div>
                                <div class="mt-4 mb-2 mr-1 text-right">
<!--                                    <form method="post" action="">-->
<!---->
<!--                                        <div class="row ml-2">-->
<!---->
<!---->
<!--                                            <div class="form-group col-4">-->
<!---->
<!---->
<!--                                                <label for="dt2"><input type="date" id="dt2" name="d2" class="form-control"></label>-->
<!--                                                </div>-->
<!---->
<!---->
<!--                                            <div class="col-4">-->
<!--                                                <button type="submit" name="v_pg" class=" btn  btn-primary"> View Previous Games</button>-->
<!---->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </form>-->
                                </div>
                                <div class="card-body">
                                    <div class="text-capitalize text-center text-muted">

                                            <p>Viewing Finished fixtures </p>

                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>

                                                <th>Date</th>
                                                <th>kick off</th>
                                                <th>Competition</th>
                                                <th>Home Team</th>
                                                <th>Away Team</th>
                                                <th>HT Scores</th>
                                                <th>FT Scores</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>

                                            <tbody class="text-nowrap">
                                            <? while ($rowfix=$allfixtures->fetch_assoc()){
                                            ?>
                                            <tr>

                                                <td class="text-capitalize"><?
                                                    $dat=$rowfix['kick_off'];
                                                    $date2 = new DateTime("$dat");
                                                    echo $dt2=$date2->format("D d, M Y");
                                                    ?></td>
                                                <td class="text-capitalize"><?      $dy=$rowfix['kick_off'];
                                                    $date2 = new DateTime("$dy");
                                                    echo $dt2=$date2->format("H:i"); ?></td>
                                                <td class="text-capitalize"><?
                                                    echo getCompnameById($rowfix['c_id'])
                                                    ?></td>
                                                <td class="text-capitalize"><? echo geteamNameById($rowfix['h_team'])?></td>
                                                <td class="text-capitalize"><? echo geteamNameById($rowfix['a_team'])?></td>

                                                <td class="text-capitalize"><? echo $rowfix['ht_hscore'].' : '.$rowfix['ht_ascore'] ?></td>
                                                <td class="text-capitalize"><? echo $rowfix['ft_hscore'].' : '.$rowfix['ft_ascore'] ?></td>
                                                <td><?
                                                    $statfix=$rowfix['status'];
                                                    if($statfix==0){
                                                        $status='Not started';
                                                        $statusclass='text-danger';
                                                    }elseif ($statfix==1){
                                                        $status='started';
                                                        $statusclass='text-warning';
                                                    }else{
                                                        $status='Finished';
                                                        $statusclass='text-success';
                                                    }
                                                    ?>
                                                    <p class="<? echo $statusclass?>"><? echo $status?></p></td>

                                            </tr>

                                            </tbody>
                                            <? }?>
                                        </table>
                                    </div>
                                </div>

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



</body>
</html>
