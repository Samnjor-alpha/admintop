<?php include '../sessions/session.php';
include '../helpers/managemarkets-helper.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Market Stats</title>
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
                    <div class="row justify-content-start">


                        <? if(mysqli_num_rows($markets)>0){ ?>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card  mt-4">
                                    <div class="card-header ">
                                        <i class="fad fa-bookmark mr-4"></i>
                                        Main Markets
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered"  >
                                                <thead>
                                                <tr>
                                                    <th class="text-nowrap">Market Category</th>
                                                    <th class="text-nowrap">Total Markets</th>


                                                </tr>
                                                </thead>

                                                <tbody class="text-nowrap">
                                                <? while ($row_mrkt=$markets->fetch_assoc()){
                                                ?>
                                                <tr>
                                                    <td><?
                                                        echo $row_mrkt['mrkt_name']?></td>
                                                    <td><?
                                                        echo $row_mrkt['mrkt_count']
                                                        ?></td>

                                                </tr>

                                                </tbody>
                                                <? }?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <? }?>


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
        $("#btnadd").click(function() {
// disable button
            $(this).prop("", true);
// add spinner to button
            $(this).html(
                '<i class="fad fa-bookmark"></i> Adding Market....'
            );
        });
    });
</script>
</body>
</html>
