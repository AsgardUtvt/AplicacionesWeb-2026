<?php
namespace App\Modules\Auth\Controllers;

use App\Core\Controller;
use App\Modules\Auth\Models\LoginModel;

class LoginController extends Controller {
    public function index(){
        $this->view('LoginView', ['titulo' => 'Iniciar Sesión']);
    }

    public function procesar() {
        $user = $_POST['nombre'];
        $password = $_POST['password'];

        $model = new LoginModel();

        if ($model->verificacionUsuario($user, $password)){
            echo "Login exitoso";

        }else {
            $this->view('LoginView', [
                'titulo'=> 'Iniciar sesión',
                'error' => 'Usuario no encontrado'
            ]);
        }
    }
}

?>
