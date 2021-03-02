<?php
    include 'model/objects.php';
    class Play{
        protected $wolf;
        protected $cabbage;
        protected $goat;
        protected $boat;
        protected $man;
        public function __construct(){
            $this->wolf=new Object("wolf","wolf");
            $this->cabbage=new Object("cabbage","cabbage");
            $this->goat=new Object("goat","goat");

            $this->boat=new Object("boat","boat");
            $this->man=new Object("man","man");
            session_start();
            if(  !isset(  $_SESSION['play']  )  ){
                $_SESSION['play']  =  true;
                $_SESSION['data']=array(
                    "layout"=>array(
                        "ground"=>array(
                            "left"=>null,
                            "right"=>array(
                                2=>$this->wolf->get_data(),
                                0=>$this->cabbage->get_data(),
                                1=>$this->goat->get_data(),
                            ),
                        ),
                        "water"=>array(
                            "left"=>null,
                            "right"=>$this->boat->get_data(),
                        ),
                        "boat"=>array(
                            "left"=>null,
                            "right"=>$this->man->get_data(),
                        ),

                    ),
                );

            }
        }
        public function right(){

        }
        public function get_data(){
            echo json_encode($_SESSION['data']);
        }
        public function session_destroy(){
            session_destroy();
        }
    }

    $play=new Play();
 ?>
