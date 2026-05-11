<?php
    require_once(__DIR__ . '/../../views/admin/template/header.php');
?>

<div class="card">
    <div class="card-header">
        Capturar la información del Torneo
    </div>
    <div class="card-body">
        <form action="index.php?page=saveTorneo" method="POST">
            <div class="mb-3">
                <label for="nombreTorneo" class="form-label">Nombre del Torneo</label>
                <input type="text" class="form-control" name="nombreTorneo" id="nombreTorneo" required>
            </div>
            <div class="mb-3">
                <label for="organizador" class="form-label">Organizador</label>
                <input type="text" class="form-control" name="organizador" id="organizador" required>
            </div>
            <div class="mb-3">
                <label for="patrocinadores" class="form-label">Patrocinadores</label>
                <textarea class="form-control" name="patrocinadores" id="patrocinadores" rows="2"></textarea>
                <span class="form-text">Ingrese los patrocinadores separados por comas.</span>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="sede" class="form-label">Sede (cancha)</label>
                    <input type="text" class="form-control" name="sede" id="sede" required>
                </div>
                <div class="col-12 mb-3">
                    <label for="categoria" class="form-label">Categoría</label>
                    <input type="text" class="form-control" name="categoria" id="categoria" list="lstCategoria" required>
                    <datalist id="lstCategoria">
                        <option value="1ra. fuerza">
                        <option value="2da. fuerza">
                        <option value="Veteranos">
                        <option value="Libre">
                        <option value="Juvenil">
                        <option value="Femenil">
                        <option value="Empresarial">
                        <option value="Infantil">
                        <option value="Minibasket">
                    </datalist>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="premio1" class="form-label">Premio 1er. Lugar</label>
                    <input type="text" class="form-control" name="premio1" id="premio1" required>
                </div>
                <div class="col mb-3">
                    <label for="premio2" class="form-label">Premio 2do. Lugar</label>
                    <input type="text" class="form-control" name="premio2" id="premio2" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="premio3" class="form-label">Premio 3er. Lugar</label>
                    <input type="text" class="form-control" name="premio3" id="premio3" required>
                </div>
                <div class="col mb-3">
                    <label for="otroPremio" class="form-label">Otro premio</label>
                    <input type="text" class="form-control" name="otroPremio" id="otroPremio">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="usuario" id="usuario" required>
                </div>
                <div class="col mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="contrasena" id="contrasena" required>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="index.php?page=admin" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
    <div class="card-footer text-body-secondary">
        Formulario para registrar torneo.
    </div>
</div>

<?php
//Ontiveros Valdez Miguel Angel
    require_once(__DIR__ . '/../../views/admin/template/footer.php');
?>