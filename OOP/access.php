<?php

    class Hayvan{
        private $tur;

        public function __construct($tur)
        {
            $this->tur = $tur;
        }

        private function displayAnimal(){
            echo "Tür: ".$this->tur. "<br>";
        }
    }

    $hayvan1 = new Hayvan("Kedi");
    $hayvan1->displayAnimal(); // HATA

?>