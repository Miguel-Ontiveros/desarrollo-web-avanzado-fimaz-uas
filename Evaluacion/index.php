<?php
    require_once(__DIR__ . "/controllers/torneosController.php");
    require_once(__DIR__ . "/views/admin/template/header.php");
    
    $page = isset($_GET['page']) ? basename($_GET['page']) : 'admin';
    $controller = new torneosController();

    if($page === 'deleteTorneo'){
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $controller->delete((int)$_GET['id']);
        }
        header("Location: index.php?page=readAllTorneos");
        exit();
    }
    //Ontiveros Valdez Miguel Angel

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    switch($page){
        case 'updateTorneo':
            if(isset($_POST['id'])){
                $controller->updateTorneo(
                    $_POST['id'],
                    $_POST['nombreTorneo'],
                    $_POST['organizador'],
                    $_POST['patrocinadores'],
                    $_POST['sede'],
                    $_POST['categoria'],
                    $_POST['premio1'],
                    $_POST['premio2'],
                    $_POST['premio3'],
                    $_POST['otroPremio'],
                    $_POST['usuario'],
                    $_POST['contrasena']
                );
            } else {
                header("Location: index.php?page=readAllTorneos");
                exit();
            }
            break;

            case 'saveTorneo':
                $campos = ['nombreTorneo','organizador','patrocinadores','sede','categoria',
                        'premio1','premio2','premio3','otroPremio','usuario','contrasena'];
                foreach($campos as $campo){
                    if(!isset($_POST[$campo])){
                        header("Location: index.php?page=frmTorneos&error=campos_vacios");
                        exit();
                    }
                }
                $controller->saveTorneo(
                    $_POST['nombreTorneo'], $_POST['organizador'], $_POST['patrocinadores'],
                    $_POST['sede'], $_POST['categoria'], $_POST['premio1'], $_POST['premio2'],
                    $_POST['premio3'], $_POST['otroPremio'], $_POST['usuario'], $_POST['contrasena']
                );
                break;
        }
    } else if($page === 'saveTorneo'){
        header("Location: index.php?page=frmTorneos");
        exit();
    }

    $allowed = [
        'admin'          => __DIR__ . '/views/admin/template/admin.php',
        'frmTorneos'     => __DIR__ . '/views/torneos/frmTorneos.php',
        'readAllTorneos' => __DIR__ . '/views/admin/template/readAllTorneos.php',
        'readOneTorneo'  => __DIR__ . '/views/admin/template/readOneTorneo.php',
        'updateTorneo'   => __DIR__ . '/views/admin/template/updateTorneo.php',
    ];

    if(array_key_exists($page, $allowed) && file_exists($allowed[$page])){
        require_once($allowed[$page]);
    } else {
        header("Location: index.php?page=admin");
        exit();
    }

    require_once(__DIR__ . "/views/admin/template/footer.php");
?>