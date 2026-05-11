<?php
    require_once(__DIR__ . '/header.php');
    $rows = $controller->readTorneo();
?>
<div class="card text-center">
    <div class="card-header">
        Lista de Torneos
    </div>//Ontiveros Valdez Miguel Angel
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Torneo</th>
                    <th>Organizador</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if($rows): ?>
                    <?php foreach($rows as $row): ?>
                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['nombreTorneo']; ?></td>
                            <td><?= $row['organizador']; ?></td>
                            <td>
                                <a href="index.php?page=readOneTorneo&id=<?= $row['id']; ?>" class="btn btn-primary">Consultar</a>
                                <a href="index.php?page=updateTorneo&id=<?= $row['id']; ?>" class="btn btn-warning">Editar</a>
                                <button type="button" class="btn btn-danger" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#idModal<?= $row['id']; ?>">Eliminar</button>
                                <div class="modal fade" id="idModal<?= $row['id']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">¿Confirmar eliminación?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Eliminar el torneo <strong><?= $row['nombreTorneo']; ?></strong>? No se podrá deshacer.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <a href="index.php?page=deleteTorneo&id=<?= $row['id']; ?>" class="btn btn-danger">Confirmar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No hay torneos registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once(__DIR__ . '/footer.php'); ?>