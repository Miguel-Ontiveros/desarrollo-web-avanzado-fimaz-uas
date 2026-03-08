<?php
    class Alumno{
        private $matricula;
        public function __construct($matricula) {
        
        $this->matricula = $matricula;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function getRol() {
        return "Alumno";
    }
}

?>