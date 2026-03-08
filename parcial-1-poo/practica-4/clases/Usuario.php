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
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("El correo electrónico no tiene un formato válido.");
        }
        $this->correo = $correo;
    }
}
?>