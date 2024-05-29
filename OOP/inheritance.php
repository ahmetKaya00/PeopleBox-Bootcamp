<?php

    class Hayvan{
        public $tur;

        public function __construct($tur)
        {
            $this->tur =$tur;
        }

        public function displayAnimal(){
            echo "Tür: " .$this->tur ."<br>";
        }
    }

    class Kopek extends Hayvan{
        public $cins;

        public function __construct($tur,$cins)
        {
            parent::__construct($tur);
            $this->cins = $cins;
        }

        public function dialogInfo(){
            echo "Tür: ".$this->tur. "<br>";
            echo "Cins: ".$this->cins. "<br>";
        }
    }

    $kopek1 = new Kopek("Köpek","Golden");
    $kopek1->dialogInfo();



?>