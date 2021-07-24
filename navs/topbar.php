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
              <a class="nav-link dropdown-toggle"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">1X2</a>
              <div class="dropdown-menu dropdown-menu-right" >
                  <a class="dropdown-item" href="<? echo BASE_URL?>/ftmarkets/1.php">Home Team to win</a>
                  <a class="dropdown-item" href="<? echo BASE_URL?>/ftmarkets/x.php">Draw</a>
                  <a class="dropdown-item" href="<? echo BASE_URL?>/ftmarkets/2.php">Away Team Win</a>
              </div>
          </li>
      </ul>
      <ul class="navbar-nav">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Double Chance</a>
              <div class="dropdown-menu dropdown-menu-right" >

                  <a class="dropdown-item"  href="<? echo BASE_URL?>/ftmarkets/1x.php">1X</a>
                  <a class="dropdown-item" href="<? echo BASE_URL?>/ftmarkets/1or2.php">1 or 2</a>
                  <a class="dropdown-item" href="<? echo BASE_URL?>/ftmarkets/x2.php">X2</a>

              </div>
          </li>
      </ul>
      <ul class="navbar-nav">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Over/Unders</a>
              <div class="dropdown-menu dropdown-menu-right" >

                  <a class="dropdown-item" href="<? echo BASE_URL?>/ftmarkets/over15.php">over 1.5</a>
                  <a class="dropdown-item" href="<? echo BASE_URL?>/ftmarkets/under15.php">Under 1.5</a>
                  <a class="dropdown-item" href="<? echo BASE_URL?>/ftmarkets/over25.php">over 2.5</a>
                  <a class="dropdown-item" href="<? echo BASE_URL?>/ftmarkets/Under25.php">under 2.5</a>
                  <a class="dropdown-item" href="<? echo BASE_URL?>/ftmarkets/over35.php">Over 3.5</a>
                  <a class="dropdown-item" href="<? echo BASE_URL?>/ftmarkets/under35.php">Under 3.5</a>
                  <a class="dropdown-item" href="<? echo BASE_URL?>/ftmarkets/over45.php">over 4.5</a>
                  <a class="dropdown-item" href="<? echo BASE_URL?>/ftmarkets/under45.php">Under 4.5</a>
              </div>
          </li>
      </ul>
      <ul class="navbar-nav">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">BTTS</a>
              <div class="dropdown-menu dropdown-menu-right" >

                  <a class="dropdown-item" href="<? echo BASE_URL?>/ftmarkets/ggy.php">GG (Yes)</a>
                  <a class="dropdown-item" href="<? echo BASE_URL?>/ftmarkets/ggn.php">GG (No)</a>

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
