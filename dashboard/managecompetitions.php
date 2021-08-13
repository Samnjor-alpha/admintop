<?php include '../sessions/session.php';
include '../helpers/addcompetition-helper.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Manage Competitions</title>
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
                    <li class="breadcrumb-item active">Manage Competition</li>
                </ol>
                <div class="container-fluid">
                    <div class="row justify-content-center">

                        <? if(mysqli_num_rows($competitions)>0){ ?>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card mt-4">
                                    <div class="card-header">
                                        <i class="fal fa-trophy-alt mr-4"></i>
                                        Competitions
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered"  >
                                                <thead>
                                                <tr>
                                                    <th>Icon</th>
                                                    <th>Region</th>
                                                    <th>Competition</th>
                                                    <th>Fixtures</th>
                                                    <th class="list-group-item-action">Actions</th>
                                                </tr>
                                                </thead>

                                                <tbody class="text-nowrap">
                                                <? while ($rowcomp=$competitions->fetch_assoc()){
                          ?>
                                                <tr>
                                                    <td><img src="<? echo $rowcomp['comp_logo']?>" style="border-radius:50%;height: 40px"  alt="logo"></td>
                                                    <td><? echo $rowcomp['comp_region']?></td>
                                                    <td><? echo $rowcomp['comp_name']?></td>
                                                    <td><? echo $rowcomp['comp_fixtures_no'] ?></td>
                                                    <th><i class="fa fa-edit text-success"></i> |<a href="<? echo BASE_URL?>/helpers/deletecompetition.php?compid=<? echo $rowcomp['comp_id']?>"><i class="fa fa-trash text-danger"></i> </a> </th>
                                                </tr>

                                                </tbody>
                                                <? }?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                        <? }else{?>
                        <div class="row justify-content-center">

                                <div class="card mt-4">
                                    <div class="card-header">
                                        <i class="fal fa-trophy-alt mr-4"></i>
                                        Alert
                                    </div>
                                    <div class="card-body ">
                                        <div>No Competitions found.Click here <a href="<? echo BASE_URL?>/dashboard/addcompetition.php"><i class="fa fa-plus"></i></a> to  add a competititon</div>
                                    </div>
                                </div>

                        </div>
                        <? }?>


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
                '<i class="fal fa-trophy-alt"></i> Adding Tournament....'
            );
        });
    });
</script>
</body>
</html>
