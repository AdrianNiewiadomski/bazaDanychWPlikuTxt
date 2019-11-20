<?php
    class Osoba {
        public $id;
        public $imie;
        public $nazwisko;
        public $zawod;
        public $pensja;

        function __construct($id, $imie, $nazwisko, $zawod, $pensja){
            $this->id        = $id;
            $this->imie      = $imie;
            $this->nazwisko  = $nazwisko;
            $this->zawod     = $zawod;
            $this->pensja    = trim($pensja);
        }

        public static function utworzOsobe($linia){
            $rekord = explode(" ", $linia);

            $nowaOsoba = new Osoba($rekord[0], $rekord[1], $rekord[2], $rekord[3], $rekord[4]);
            return $nowaOsoba;
        }

        function get_id() {
            return $this->id;
        }

        function get_imie() {
            return $this->imie;
        }

        function get_nazwisko() {
            return $this->nazwisko;
        }

        function get_zawod() {
            return $this->zawod;
        }

        function get_pensja() {
            return $this->pensja;
        }

        function toString(){
            $linia = $this->id . " ";
            $linia .= $this->imie . " ";
            $linia .= $this->nazwisko . " ";
            $linia .= $this->zawod . " ";
            $linia .= $this->pensja . "\n";
            return $linia;
        }
    }
?>
