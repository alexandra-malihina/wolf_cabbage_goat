<?php

    class Play{
        protected $eat_rule;
        public function __construct(){

            session_start();
            if(  !isset(  $_SESSION['play']  )  ){

                $this->set_default();
            }
            $this->eat_rule=array(0=>array(0,2),1=>array(2,1));
        }
        public function set_default(){
            $_SESSION['play']  =  true;
            $_SESSION['data']=array(
                "objects"=>array(
                    0=>array(
                        "name"=>"wolf",
                        "layout"=>"ground",
                        "side"=>"right",
                        "type"=>"object",
                        "image"=>"wolf.png",
                        "sound"=>"wolf.mp3"

                    ),
                    1=>array(
                        "name"=>"cabbage",
                        "layout"=>"ground",
                        "side"=>"right",
                        "type"=>"object",
                        "image"=>"cabbage.png",
                        "sound"=>"cabbage.mp3"
                    ),
                    2=>array(
                        "name"=>"goat",
                        "layout"=>"ground",
                        "side"=>"right",
                        "type"=>"object",
                        "image"=>"goat.png",
                        "sound"=>"goat.mp3"
                    ),


                    3=>array(
                        "name"=>"man",
                        "layout"=>"boat",
                        "side"=>"right",
                        "type"=>"static"
                    ),
                    4=>array(
                        "name"=>"boat",
                        "layout"=>"water",
                        "side"=>"right",
                        "type"=>"layout"
                    ),
                ),
                "state"=>"start",
                "eat"=>array(
                    "predator"=>0,
                    "prey"=>0
                )
            );
        }
        public function change_side(int $object_id){
            if ($object_id!=4){
                $side=$_SESSION["data"]["objects"][$object_id]["side"];
                $_SESSION["data"]["objects"][$object_id]["side"]=$side=="right"?"left":"right";
            }
            $side=$_SESSION["data"]["objects"][4]["side"];
            $_SESSION["data"]["objects"][4]["side"]=$side=="right"?"left":"right";
        }

        public function step(int $object_id){
            $_SESSION['data']['state']="playing";
            $this->change_side($object_id);

            $object_to_side=array(
                "right"=>array(),
                "left"=>array()
            );

            foreach ($_SESSION['data']['objects'] as $key => $value) {
                if($value['layout']=="ground" && $value['side']=="right"){
                    array_push($object_to_side['right'], $key);
                }
                if($value['layout']=="ground" && $value['side']=="left"){
                    array_push($object_to_side['left'], $key);
                }
            }
            $key=$_SESSION["data"]["objects"][4]["side"]=="right"?"left":"right";

                if(count($object_to_side[$key])==2){
                    foreach ($this->eat_rule as $k => $v) {
                        $eat_count=0;
                        if($this->eat_rule[$k][0]==$object_to_side[$key][0] || $this->eat_rule[$k][0]==$object_to_side[$key][1]){
                            $eat_count++;
                        }
                        if($this->eat_rule[$k][1]==$object_to_side[$key][0] || $this->eat_rule[$k][1]==$object_to_side[$key][1]){
                            $eat_count++;
                        }
                        if($eat_count==2){
                            $_SESSION['data']['state']="lose";
                            $_SESSION['data']['eat']['predator']=$this->eat_rule[$k][0];
                            $_SESSION['data']['eat']['prey']=$this->eat_rule[$k][1];

                            break;
                        }
                    }

            }
            if(count($object_to_side["right"])==3){
                $_SESSION['data']['state']="lose";
                $_SESSION['data']['eat']['predator']=$this->eat_rule[$k][0];
                $_SESSION['data']['eat']['prey']=$this->eat_rule[$k][1];
            }

            if (count($object_to_side["left"])==3){
                $_SESSION['data']['state']="win";
            }

            $this->get_data();
        }
        public function get_data(){
            $result=array_merge($_SESSION['data'], array("rules"=>$this->eat_rule));
            echo json_encode($result);
        }
        public function session_destroy(){
            session_destroy();
        }
    }

    $play=new Play();
 ?>
