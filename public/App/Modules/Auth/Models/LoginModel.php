<?php
namespace App\Modules\Auth\Models;

class LoginModel {
    public function verificacionUsuario(string $usuario, string $password){

        return $usuario == 'admin' && $password == 'admin';
    }
}
?>
