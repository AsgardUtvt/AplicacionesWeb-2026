<?php
namespace App\Modules\Auth\Controllers;

use App\Core\Controller;
use App\Modules\Auth\Models\LoginModel;
use App\Modules\Usuario\Models\UsuarioModel;
const RECUPERAR = "LoginRecuperarCuentaView";
const LOGIN = "LoginView";
const GENERAR = "LoginGenerarCuentaView";
const USUARIO = "UsuarioView";

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
    public function usuarioview(){

        $usuarioModel = new UsuarioModel();
        $usuarioModel->usuario_name = $_GET['nombre'];
        $usuarioModel->usuario_paterno = $_GET['paterno'];
        $usuarioModel->usuario_materno = $_GET['materno'];
        $usuarioModel->usuario_correo = $_GET['email'];
        $usuarioModel->usuario_password = $_GET['password'];
        $usuarioModel->usuario_localidad = $_GET['localidad'];
        $usuarioModel->usuario_colonia = $_GET['colonia'];
        $usuarioModel->usuario_cp = $_GET['codigoPostal'];
        $usuarioModel->usuario_municipio = $_GET['municipio'];
        $usuarioModel->usuario_calle_principal = $_GET['callePrincipal'];
        $usuarioModel->usuario_calle_izquierda = $_GET['calleUno'];
        $usuarioModel->usuario_calle_derecha = $_GET['calleDos'];
        $usuarioModel->usuario_num_exterior = $_GET['numEx'];
        $usuarioModel->usuario_num_interior = $_GET['numInt'];
        $usuarioModel->id_estado= 1;
        $usuarioModel->id_tipo_usuario = 1;

        if($usuarioModel->insertarusuario()){
            $this->view(USUARIO, ['nada' => null]);
        }
        else{
            $this->index();
        }
    }

}

?>
