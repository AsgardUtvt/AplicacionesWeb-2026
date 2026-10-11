<?php 
namespace services;

class GeneralServices{

    function PasswordHash(string $password): string
    {
        /*
         Fucnio para retornar una contraseña encriptada.
         */
        $passrowdHash = password_hash($password, PASSWORD_ARGON2I);
        return $passrowdHash;
    }

    function VerificatePasswordHash(string $password, string $dbPassword): bool 
    {
        /*
         Funcion que retorna un bool cuando se verifica la contraseña
         */
        return password_verify($password, $dbPassword) ? true :  false;
    }
}
?>
