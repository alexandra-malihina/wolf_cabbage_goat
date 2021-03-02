<?php
    include_once './play.php';
    if($_GET['action']=='session_destroy'){
        session_destroy();
    }
    if($_GET['action']=='get_data'){
        $play->get_data();
    }
 ?>
