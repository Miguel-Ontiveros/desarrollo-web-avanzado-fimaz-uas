<?php
    //Ontiveros Valdez Miguel Angel
    $listTorneo = $controller->readOneTorneo($_GET['id']);
?>
<div class="card">
    <div class="card-header">
        Editar torneo.
    </div>
    <div class="card-body">
        <form action="index.php?page=updateTorneo" method="POST">
            <input type="hidden" name="id" value="<?= $listTorneo['id'] ?>">
            <div class="mb-3">
                <label class="form-label">Nombre del Torneo</label>
                <input type="text" class="form-control" name="nombreTorneo" value="<?= $listTorneo['nombreTorneo'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Organizador</label>
                <input type="text" class="form-control" name="organizador" value="<?= $listTorneo['organizador'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Patrocinadores</label>
                <textarea class="form-control" name="patrocinadores" rows="2"><?= $listTorneo['patrocinadores'] ?></textarea>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <label class="form-label">Sede (cancha)</label>
                    <input type="text" class="form-control" name="sede" value="<?= $listTorneo['sede'] ?>" required>
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label">Categoria</label>
                    <input type="text" class="form-control" name="categoria" value="<?= $listTorneo['categoria'] ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Premio 1er. Lugar</label>
                    <input type="text" class="form-control" name="premio1" value="<?= $listTorneo['premio1'] ?>" required>
                </div>
                <div class="col mb-3">
                    <label class="form-label">Premio 2do. Lugar</label>
                    <input type="text" class="form-control" name="premio2" value="<?= $listTorneo['premio2'] ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Premio 3er. Lugar</label>
                    <input type="text" class="form-control" name="premio3" value="<?= $listTorneo['premio3'] ?>" required>
                </div>
                <div class="col mb-3">
                    <label class="form-label">Otro premio</label>
                    <input type="text" class="form-control" name="otroPremio" value="<?= $listTorneo['otroPremio'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="usuario" value="<?= $listTorneo['usuario'] ?>" required>
                </div>
                <div class="col mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="contrasena" placeholder="Nueva contraseña" required>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="index.php?page=readAllTorneos" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
    <div class="card-footer text-body-secondary">
        Editar torneo.
    </div>
    //Ontiveros Valdez Miguel Angel
</div>