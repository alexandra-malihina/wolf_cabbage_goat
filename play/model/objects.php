<?php
    class Object{
        protected string $name;
        protected string $position;
        protected string $layout;
        protected string $image;
        public function __construct(string $name, string $image_name,string $position="right",string $layout="ground"){
            //position: left-1 right-0
            //layout: ground-1 water-0
            $this->name=$name;
            $this->position=$position;
            $this->layout=$layout;
            $this->image=$image_name;
        }
        set_position(int $position){
            $this->position=$position;
        }
        set_layout(int $layout){
            $this->layout=$layout;
        }




    }

 ?>
