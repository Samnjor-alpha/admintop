<?php include '../sessions/session.php';
include '../helpers/dashboardhelper.php'
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

                <div class="row">
                    <div class="col">
                        <h3 class="mt-4">Dashboard </h3>
                    </div>




                </div>
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-1">
                        <div class="card  shadow h-100" data-toggle="tooltip" title="Total users">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary  mb-1">Total Users</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><? echo countusers(); ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-3x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-1">
                        <div class="card border-left-primary shadow h-100  " data-toggle="tooltip" title="Total Tipsters-Premium & Free Tipstars">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary  mb-1">Total Tipsters</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><? echo counttipsters(); ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fad fa-users-crown fa-3x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-1">
                        <div class="card border-left-primary shadow h-100  " data-toggle="tooltip" title="All Competitions">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary  mb-1">Leagues & Tournament</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><? echo countcompetitions() ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fal fa-trophy-alt fa-3x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-1">
                        <div class="card border-left-primary shadow h-100  " data-toggle="tooltip" title="Total Games tipped">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary  mb-1">Total Tips</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><? echo countpredictions();?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fal fa-futbol fa-3x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-1">
                        <div class="card border-left-primary shadow h-100  " data-toggle="tooltip" title="Available popular markets">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary  mb-1">Betting Markets</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><? echo countbetting() ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fad fa-bookmark fa-3x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            </div>
            <div class="container-fluid">

                <div class="row">
                    <div class="col">
                        <h3 class="mt-4">News & Articles </h3>
                    </div>

                    <div class="mt-4 mb-2 text-right">

                        <a class="btn btn-outline-success" href="blog.php">Add article</a>

                    </div>


                </div>
                <div class="row">
                    <div class="col-xl-4 col-md-6 mb-1">
                        <div class="card  shadow h-100" data-toggle="tooltip" title="Total articles">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary  mb-1">Total Articles</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><? echo countblogs(); ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fal fa-newspaper fa-3x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 mb-1">
                        <div class="card border-left-primary shadow h-100  " data-toggle="tooltip" title="All Competitions">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary  mb-1">Views</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><? echo countblogviews() ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fal fa-eye fa-3x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 mb-1">
                        <div class="card border-left-primary shadow h-100  " data-toggle="tooltip" title="All Competitions">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary  mb-1">Website Visits</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><? echo countvisits() ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fal fa-mouse-pointer fa-3x text-gray-300"></i>
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
