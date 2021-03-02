<?php
    class Object{
        protected  $name;
        protected  $image;
        public function __construct(string $name, string $image_name){
            //position: left-1 right-0
            //layout: ground-1 water-0
            $this->name=$name;
            $this->image=$image_name;
        }

        public function get_data(){
            return json_encode(array("name"=>$this->name,"image"=>$this->image));
        }
    }

 ?>
