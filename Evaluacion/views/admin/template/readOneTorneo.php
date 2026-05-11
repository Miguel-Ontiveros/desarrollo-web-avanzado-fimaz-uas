<?php
    $listTorneo = $controller->readOneTorneo($_GET['id']); 
    //Ontiveros Valdez Miguel Angel
?>
<div class="card">
    <div class="card-header">
        Informacion del torneo.
    </div>
    <div class="card-body">
        <form>
            <div class="mb-3">
                <label class="form-label">Nombre del Torneo (ID: <?= $listTorneo['id'] ?>)</label>
                <input type="text" class="form-control" value="<?= $listTorneo['nombreTorneo'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Organizador</label>
                <input type="text" class="form-control" value="<?= $listTorneo['organizador'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Patrocinadores</label>
                <textarea class="form-control" rows="2" readonly><?= $listTorneo['patrocinadores'] ?></textarea>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <label class="form-label">Sede (cancha)</label>
                    <input type="text" class="form-control" value="<?= $listTorneo['sede'] ?>" readonly>
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label">Categoria</label>
                    <input type="text" class="form-control" value="<?= $listTorneo['categoria'] ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Premio 1er. Lugar</label>
                    <input type="text" class="form-control" value="<?= $listTorneo['premio1'] ?>" readonly>
                </div>
                <div class="col mb-3">
                    <label class="form-label">Premio 2do. Lugar</label>
                    <input type="text" class="form-control" value="<?= $listTorneo['premio2'] ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Premio 3er. Lugar</label>
                    <input type="text" class="form-control" value="<?= $listTorneo['premio3'] ?>" readonly>
                </div>
                <div class="col mb-3">
                    <label class="form-label">Otro premio</label>
                    <input type="text" class="form-control" value="<?= $listTorneo['otroPremio'] ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Usuario</label>
                    <input type="text" class="form-control" value="<?= $listTorneo['usuario'] ?>" readonly>
                </div>
            </div>
            <div class="mb-3">
                <a href="index.php?page=readAllTorneos" class="btn btn-danger">Volver</a>
            </div>
        </form>
    </div>
    <div class="card-footer text-body-secondary">
        Detalle de torneo.
    </div>
</div>