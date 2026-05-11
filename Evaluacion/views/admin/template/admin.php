<?php
    require_once(__DIR__ . '/../../../views/admin/template/header.php');
?>
//Ontiveros Valdez Miguel Angel
<div class="card text-center">
  <div class="card-header">
    Menu
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <div class="row mb-3">
        <div class="col">
            <div class="card text-center">
                <div class="card-header">
                    Crear Torneo
                </div>
                <div class="card-body">
                    <a href="index.php?page=frmTorneos" class="btn btn-primary">
                        <img src="../img/torneo.png" alt="Crear Torneo" width="180" height="180">
                    </a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-center">
            <div class="card-header">
                Listar Torneos
            </div>
            <div class="card-body">
                
<a href="index.php?page=readAllTorneos" class="btn btn-primary">
                    <img src="../img/listar.png" alt="Listar Torneos" width="180" height="180">
                </a>
            </div>
        </div>
    </div>
  </div>

  <div class="row">
    <div class="col">
        <div class="card text-center">
            <div class="card-header">
                ESTADISTICAS
            </div>
            <div class="card-body">
            
        
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card text-center">
            <div class="card-header">
                ANUNCIOS
            </div>
            <div class="card-body">
            
        
            </div>
        </div>
  </div>
  <div class="card-footer text-body-secondary">
    Configuracion de torneos. Web App Basketball
  </div>
</div>

<?php
    require_once(__DIR__ . '/../../../views/admin/template/footer.php');
?>