
<?php
include '../config/config.php';
session_start();



        if (!isset($_SESSION['adm_username'])) {




            session_unset();
            session_destroy();



            $logout= BASE_URL. '/auth/login.php';
            header( "location:$logout" );




        }else {
            $time = $_SERVER['REQUEST_TIME'];

            /**
             * for a 10 minute timeout, specified in seconds
             */
            $timeout_duration = 3600;

            /**
             * Here we look for the user's LAST_ACTIVITY timestamp. If
             * it's set and indicates our $timeout_duration has passed,
             * blow away any previous $_SESSION data and start a new one.
             */
            if (isset($_SESSION['LAST_ACTIVITY']) &&
                ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {




                session_unset();
                session_destroy();

                $logout= BASE_URL. '/auth/login.php';
                header( "location:$logout" );

                }


        }
        /**
         * Finally, update LAST_ACTIVITY so that our timeout
         * is based on it and not the user's login time.
         */
        $_SESSION['LAST_ACTIVITY'] = $time;



//echo $_SERVER['PHP_SELF'];


