<?php
    class Osoba {
        private $id;
        private $imie;
        private $nazwisko;
        private $zawod;
        private $pensja;

        public function __construct($id, $imie, $nazwisko, $zawod, $pensja){
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

        public function get_id() {
            return $this->id;
        }

        public function set_id($id) {
            $this->id = $id;
        }

        public function get_imie() {
            return $this->imie;
        }

        public function get_nazwisko() {
            return $this->nazwisko;
        }

        public function get_zawod() {
            return $this->zawod;
        }

        public function get_pensja() {
            return $this->pensja;
        }

        public function toString(){
            $linia = $this->id . " ";
            $linia .= $this->imie . " ";
            $linia .= $this->nazwisko . " ";
            $linia .= $this->zawod . " ";
            $linia .= $this->pensja . "\n";
            return $linia;
        }

        public function setOsoba($wiersz){
            $rekord = explode(" ", $wiersz);
            $this->imie = $rekord[1];
            $this->nazwisko = $rekord[2];
            $this->zawod = $rekord[3];
            $this->pensja = $rekord[4];
        }
    }
?>
