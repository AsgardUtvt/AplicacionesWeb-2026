<?php
namespace App\Modules\Voluntario\Views;

$lista = $lista ?? [];
$editar = $editar ?? null;
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voluntariado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="py-4">
<div class="container">

    <div class="card mb-4">
        <div class="card-header">
            <h4 class="mb-0"><?= $editar ? "Editar Voluntariado" : "Nuevo Voluntariado" ?></h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <input type="hidden" name="accion" value="<?= $editar ? "actualizar" : "crear" ?>">
                <?php if ($editar): ?>
                    <input type="hidden" name="id_voluntariado" value="<?= (int)$editar['id_voluntariado'] ?>">
                <?php endif; ?>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="voluntariado_name" class="form-control" required
                               value="<?= htmlspecialchars($editar['voluntariado_name'] ?? '') ?>">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Objetivo</label>
                        <input type="text" name="voluntariado_objetivo" class="form-control" required
                               value="<?= htmlspecialchars($editar['voluntariado_objetivo'] ?? '') ?>">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Fecha inicio</label>
                        <input type="datetime-local" name="voluntariado_fecha_inicio" class="form-control" required
                               value="<?= htmlspecialchars(substr(str_replace(' ', 'T', $editar['voluntariado_fecha_inicio'] ?? ''), 0, 16)) ?>">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Fecha fin</label>
                        <input type="datetime-local" name="voluntariado_fecha_fin" class="form-control" required
                               value="<?= htmlspecialchars(substr(str_replace(' ', 'T', $editar['voluntariado_fecha_fin'] ?? ''), 0, 16)) ?>">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">ID Ubicación</label>
                        <input type="number" name="id_ubicacion" class="form-control" required
                               value="<?= htmlspecialchars((string)($editar['id_ubicacion'] ?? 1)) ?>">
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                            <input type="checkbox" name="voluntariado_propietario" value="1" class="form-check-input" id="propCheck"
                                   <?= !empty($editar['voluntariado_propietario']) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="propCheck">Propietario</label>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">
                        <?= $editar ? "Guardar cambios" : "Registrar" ?>
                    </button>
                    <?php if ($editar): ?>
                        <a href="?c=Voluntario&m=index" class="btn btn-secondary">Cancelar</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Lista</h4>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Objetivo</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Ubicación</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($lista as $row): ?>
                    <tr>
                        <td><?= (int)$row['id_voluntariado'] ?></td>
                        <td><?= htmlspecialchars($row['voluntariado_name']) ?></td>
                        <td><?= htmlspecialchars($row['voluntariado_objetivo']) ?></td>
                        <td><?= htmlspecialchars($row['voluntariado_fecha_inicio']) ?></td>
                        <td><?= htmlspecialchars($row['voluntariado_fecha_fin']) ?></td>
                        <td><?= (int)$row['id_ubicacion'] ?></td>
                        <td>
                            <a href="?c=Voluntario&m=index&editar=<?= (int)$row['id_voluntariado'] ?>" class="btn btn-sm btn-warning">Editar</a>
                            <form method="POST" class="d-inline">
                                <input type="hidden" name="accion" value="eliminar">
                                <input type="hidden" name="id_voluntariado" value="<?= (int)$row['id_voluntariado'] ?>">
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
</body>
</html>
