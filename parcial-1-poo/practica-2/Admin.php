<?php
    class Admin {
    private $rol;

    public function __construct($rol) {
        $this->rol = $rol;
    }

    public function getRol() {
        return $this->rol;
    }
    
}
?>