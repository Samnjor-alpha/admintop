<?php include '../sessions/session.php';
include '../helpers/addclub-helper.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Manage Club</title>
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
                    <li class="breadcrumb-item active">Manage Club</li>
                </ol>
                <div class="container">
                    <div class="row justify-content-start">


                        <? if(mysqli_num_rows($teams)>0){ ?>
                            <div class="col-lg-12">
                                <div class="card mt-4">
                                    <div class="card-header">
                                        <i class="fal fa-trophy-alt mr-4"></i>
                                        Clubs
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Icon</th>
                                                    <th>Region</th>
                                                    <th>Club</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>

                                                <tbody>
                                                <? while ($rowteam=$teams->fetch_assoc()){?>
                                                <tr>
                                                    <td class="text-center"><img src="<? echo $rowteam['team_logo']?>" style="border-radius:50%;height: 50px; width:50px;"  alt="logo"></td>
                                                    <td><? echo $rowteam['team_region']?></td>
                                                    <td><? echo $rowteam['team_name']?></td>
                                                    <td><a href="editclub.php?clubid=<? echo $rowteam['team_id']?>"><i class="text-success fal fa-edit"></i></a>| <a href="../helpers/deleteclub.php?clubid=<? echo $rowteam['team_id']?>"><i class="text-danger fal fa-trash"></i></a></td>
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
                '<i class="fal fa-project-diagram"></i> Adding Club....'
            );
        });
    });
</script>
</body>
</html>
