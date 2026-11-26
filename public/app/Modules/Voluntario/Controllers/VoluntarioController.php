<?php
namespace App\Modules\Voluntario\Controllers;

use App\Core\Controller;
use App\Modules\Voluntario\Models\VoluntariadoModel;

require_once __DIR__ . '/../Models/VoluntariadoModel.php';

class VoluntarioController extends Controller
{
    private VoluntariadoModel $model;

    public function __construct()
    {
        $this->model = new VoluntariadoModel();
    }

    public function index(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accion = $_POST['accion'] ?? 'crear';
            $datos = [
                'voluntariado_name' => $_POST['voluntariado_name'] ?? '',
                'voluntariado_objetivo' => $_POST['voluntariado_objetivo'] ?? '',
                'voluntariado_fecha_inicio' => str_replace('T', ' ', $_POST['voluntariado_fecha_inicio'] ?? ''),
                'voluntariado_fecha_fin' => str_replace('T', ' ', $_POST['voluntariado_fecha_fin'] ?? ''),
                'voluntariado_propietario' => isset($_POST['voluntariado_propietario']) ? 1 : 0,
                'id_ubicacion' => (int) ($_POST['id_ubicacion'] ?? 1),
            ];

            if ($accion === 'crear') {
                $this->model->crear($datos);
            } elseif ($accion === 'actualizar' && !empty($_POST['id_voluntariado'])) {
                $this->model->actualizar((int) $_POST['id_voluntariado'], $datos);
            } elseif ($accion === 'eliminar' && !empty($_POST['id_voluntariado'])) {
                $this->model->eliminar((int) $_POST['id_voluntariado']);
            }
        }

        $editar = !empty($_GET['editar']) ? $this->model->obtener((int) $_GET['editar']) : null;
        $lista = $this->model->listar();

        $this->view("VoluntariadoView", [
            "lista" => $lista,
            "editar" => $editar
        ]);
    }
}
