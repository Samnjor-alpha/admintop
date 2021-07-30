<?php


$time_zone = getTimeZoneFromIpAddress();

try {
    $date = new DateTime("now", new DateTimeZone('America/New_York'));
} catch (Exception $e) {
}
$date->format('Y-m-d H:i:s');



if(isset($_POST['addarticle'])) {


    if (empty($_POST['title'])  || empty($_POST['article']) || empty($_POST['urlimg'])) {
        echo "<script type='text/javascript'>
  					alert( 'Inputs cannot be empty!!');
</script>";

    }else{




            $author=$_SESSION['adm_id'];
            $title=filter_var(stripslashes($_POST['title']), FILTER_SANITIZE_STRING);
            $excerpt=filter_var(stripslashes($_POST['excerpt']), FILTER_SANITIZE_STRING);
            $article=filter_var(stripslashes( htmlentities($_POST['article'])), FILTER_SANITIZE_STRING);





            function create_slug($string)
            {

                $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);

                return $slug;

            }

            $slug=create_slug($title);
            $external_link = $_POST['urlimg'];
            if (!@getimagesize($external_link)) {
                echo "<script type='text/javascript'>
  					alert( 'Invalid image url!!');
</script>";
            } else {



                $sql_e = "SELECT * FROM articles WHERE slug='$slug'";

                $res_e = mysqli_query($conn, $sql_e);

                if (mysqli_num_rows($res_e) > 0) {
                    echo "<script type='text/javascript'>
  					alert( 'Article already exists!!');
</script>";

                } else {

                    if (empty($error)) {
                        $sql = "INSERT INTO articles SET slug='" . $slug . "',
excerpt='" . $excerpt . "', img='" . $external_link . "', 
author='" . $author . "', tittle='" . $title . "',article='" . $article . "',posted_at='".$date."'";

                        if (mysqli_query($conn, $sql)) {

                            echo "<script type='text/javascript'>
  					alert( 'Article created successfully!!!', 'success');
</script>";

                        } else {
                            echo "<script type='text/javascript'>
  					alert( 'error in the database!!!');
</script>";
                        }
                    } else {
                        echo "<script type='text/javascript'>
  					alert( 'Error when uploading file!!!');
</script>";
                    }

                }






































        }


    }

}


//     $pbbannername = $title.'-' . $_FILES["imbanner"]["name"];
//        // For image upload
//        $target_dir = "../dist/blogimages/";
//
//   // VALIDATION
//
//        $target_file = $target_dir . basename($pbbannername);
//        // validate image size. Size is calculated in Bytes
//        if ($_FILES['imbanner']['size'] > 200000) {
//            echo "<script type='text/javascript'>
//  					alert( 'file is greater than 2mb!!!');
//</script>";
//        }elseif  (file_exists($target_file)) {
//            echo "<script type='text/javascript'>
//  					alert( 'file exists!!!');
//</script>";
//        }