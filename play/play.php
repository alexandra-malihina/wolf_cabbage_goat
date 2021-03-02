<?php
    include './model/objects.php';
    if(  !isset(  $_SESSION['play']  )  ){
        $_SESSION['play']  =  true;
        $_SESSION['data']=array(
            "layout"=>array(
                "ground"=>array(
                    "left"=>1,
                    "right"=>,
                ),
                "water"=>array(
                    "left"=>3,
                    "right"=>4,
                )
            ),
        );

    }

    echo json_encode($_SESSION['data']);
 ?>
