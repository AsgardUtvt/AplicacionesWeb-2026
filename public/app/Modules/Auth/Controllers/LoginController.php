<?php
namespace App\Modules\Auth\Controllers;

use App\Core\Controller;
use App\Modules\Auth\Models\LoginModel;

const RECUPERAR = "LoginRecuperarCuentaView";
const LOGIN = "LoginView";
const GENERAR = "LoginGenerarCuentaView";

const VACIO = [ "nada" => null];
class LoginController extends Controller {

    public function index(){
        $this->view(LOGIN, ['titulo' => 'Iniciar Sesión']);
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

    public function recuperarCuenta(){
        $this->view( RECUPERAR, ['nada' => null]);
    }

    public function generarCuenta(){
        $this->view( GENERAR, VACIO);
    }
}

?>
