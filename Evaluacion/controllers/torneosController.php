<?php
    require_once(__DIR__ . "/../model/torneoModel.php");
    class torneosController {
        private $model;
        //Ontiveros Valdez Miguel Angel
        public function __construct(){
            $this->model = new torneoModel();
        }
        
        public function saveTorneo($nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2, $premio3, $otroPremio, $usuario, $contrasena){
            $id = $this->model->insert($nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2, $premio3, $otroPremio, $usuario, $contrasena);
            if($id != false){
                header("Location: index.php?page=readAllTorneos");
            } else {
                header("Location: index.php?page=frmTorneos&error=1");
            }
            exit();
        }
        
        public function readTorneo(){
            $result = $this->model->read();
            return $result ? $result : false;
        }
        
        public function readOneTorneo($id){
            $result = $this->model->readOne($id);
            if(!$result){
                header("Location: index.php?page=admin");
                exit();
            }
            return $result;
        }
        
        public function updateTorneo($id, $nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2, $premio3, $otroPremio, $usuario, $contrasena){
            $result = $this->model->update($id, $nombreTorneo, $organizador, $patrocinadores, $sede, $categoria, $premio1, $premio2, $premio3, $otroPremio, $usuario, $contrasena);
            if($result){
                header("Location: index.php?page=readOneTorneo&id=" . $id);
            } else {
                header("Location: index.php?page=readAllTorneos");
            }
            exit();
        }
        
        public function delete($id){
            $result = $this->model->delete($id);
            if($result){
                header("Location: index.php?page=readAllTorneos");
            } else {
                header("Location: index.php?page=readOneTorneo&id=" . $id);
            }
            exit();
        }
    }
?>