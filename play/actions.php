<?php
    include_once './play.php';
    if($_GET['action']=='session_destroy'){
        session_destroy();
    }
    if($_GET['action']=='get_data'){
        $play->get_data();
    }
    if($_GET['action']=='step'){
        $play->step($_GET['object_id']);
    }
    if($_GET['action']=='restart'){
        $play->set_default();
        $play->get_data();
    }
 ?>
