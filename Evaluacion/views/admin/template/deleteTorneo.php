<?php
    require_once("../../controllers/torneosController.php");
    $objController = new torneosController();
    $objController->delete($_GET['id']);
    //Ontiveros Valdez Miguel Angel
?>