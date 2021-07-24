<?php
function active($currect_page){
    $url_array =  explode('/', $_SERVER['PHP_SELF']) ;
    $url = end($url_array);
    if($currect_page == $url){
        echo 'active'; //class name in css
    }
}
?>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="<? echo BASE_URL?>/dashboard/index.php">Top Bet Admin</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>


    <ul class="navbar-nav ">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Articles</a>
            <div class="dropdown-menu dropdown-menu-right" >
                <a class="dropdown-item" href="<? echo BASE_URL?>/dashboard/blog.php">New Article</a>
                <a class="dropdown-item" >Previous Articles</a>

            </div>
        </li>
    </ul>
   <ul class="navbar-nav ">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage Articles</a>
        <div class="dropdown-menu dropdown-menu-right" >
            <a class="dropdown-item" >Delete Articles</a>


        </div>
    </li>
    </ul>


    <form class="  form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

    </form>
    <ul class="navbar-nav ml-sm-auto ml-md-auto ml-lg-auto ml-auto d-none d-sm-none d-md-inline-block d-lg-inline-block d-xl-inline-block ml-sm-0 ml-lg-0 ml-xl-0 ml-md-0 align-right">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                <a class="dropdown-item" href="../sessions/logout.php">Logout</a>
            </div>
        </li>
    </ul>



</nav>
