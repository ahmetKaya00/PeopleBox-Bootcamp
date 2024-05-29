<?php

    class Araba{
        public $marka;
        public $model;
        
        public function __construct($marka,$model)
        {
            $this->marka = $marka;
            $this->model = $model;
        }

        public function displayCarInfo(){
            echo "Marka: ".$this->marka. "<br>";
            echo "Model: ".$this->model. "<br>";
        }
    }


    $araba1 = new Araba("Ford","Focus");
    $araba1->displayCarInfo();



?>