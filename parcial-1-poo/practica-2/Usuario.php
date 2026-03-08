<?php
    class Usuario {
    private $nombre;
    private $correo;

    public function __construct($nombre, $correo) {
        $this->setNombre($nombre);
        $this->setCorreo($correo);
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCorreo() {
        return $this->correo;
    }

    private function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    private function setCorreo($correo) {
        $this->correo = $correo;
    }
    
}
?>