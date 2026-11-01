<?php
namespace App\Modules\Usuario\Models;

use mysqli;
class UsuarioModel {



    /*Atributos usuario*/
    public    $usuario_name ;
    public    $usuario_paterno ;
    public    $usuario_materno ;
    public    $usuario_correo ;
    public    $usuario_password ;
    public    $usuario_localidad ;
    public    $usuario_colonia ;
    public    $usuario_cp ;
    public    $usuario_municipio ;
    public    $usuario_calle_principal ;
    public    $usuario_calle_izquierda ;
    public    $usuario_calle_derecha ;
    public    $usuario_num_exterior ;
    public    $usuario_num_interior ;
    public    $id_estado;
    public    $id_tipo_usuario;

    private $con;
    public function __construct() {
        $this->con = new mysqli(
            "db",                       
            "asgard",
            "admin",                     
            "un_grano_de_mostaza",       
            3306
        );

        if ($this->con->connect_error) {
            throw new \Exception("Error de conexión: " . $this->con->connect_error);
        }
    }
    public function insertarusuario() {
        $sql = "INSERT INTO usuario (
            usuario_name, usuario_paterno, usuario_materno, usuario_correo, usuario_password,
            usuario_localidad, usuario_colonia, usuario_cp, usuario_municipio,
            usuario_calle_principal, usuario_calle_izquierda, usuario_calle_derecha,
            usuario_num_exterior, usuario_num_interior, id_estado, id_tipo_usuario
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->con->prepare($sql);


        $v1 = $this->usuario_name;
        $v2 = $this->usuario_paterno;
        $v3 = $this->usuario_materno;
        $v4 = $this->usuario_correo;
        $v5 = $this->usuario_password;
        $v6 = $this->usuario_localidad;
        $v7 = $this->usuario_colonia;
        $v8 = $this->usuario_cp;
        $v9 = $this->usuario_municipio;
        $v10 = $this->usuario_calle_principal;
        $v11 = $this->usuario_calle_izquierda; 
        $v12 = $this->usuario_calle_derecha;
        $v13 = $this->usuario_num_exterior; 
        $v14 = $this->usuario_num_interior;
        $v15 = $this->id_estado;
        $v16 = $this->id_tipo_usuario;

        $stmt->bind_param("ssssssssssssssii", 
            $v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $v9, 
            $v10, $v11, $v12, $v13, $v14, $v15, $v16
        );

        $resultado = $stmt->execute();
        $last_id = $this->con->insert_id;
        $stmt->close();

        return ["resultado" => $resultado, "id_usuario" => $last_id ];
    }

    public function consultar_datos(int $number_id): array{
        $usuarioModel = new UsuarioModel();
        $sql="SELECT 
            u.usuario_name,
            u.usuario_paterno,
            u.usuario_materno,
            u.usuario_correo,
            u.usuario_localidad,
            u.usuario_colonia,
            u.usuario_cp,
            u.usuario_municipio,
            u.usuario_calle_principal,
            u.usuario_calle_izquierda,
            u.usuario_calle_derecha,
            u.usuario_num_exterior,
            u.usuario_num_interior
            FROM usuario u
            WHERE u.id_usuario = ?;";
        $stmt = $this->con->prepare($sql);
        if($stmt){
            $stmt->bind_param("i", $number_id);
            $stmt->execute();
            $stmt->bind_result(
                $usuarioModel->usuario_name,
                $usuarioModel->usuario_paterno,
                $usuarioModel->usuario_materno,
                $usuarioModel->usuario_correo,
                $usuarioModel->usuario_localidad,
                $usuarioModel->usuario_colonia,
                $usuarioModel->usuario_cp,
                $usuarioModel->usuario_municipio,
                $usuarioModel->usuario_calle_principal,
                $usuarioModel->usuario_calle_izquierda, 
                $usuarioModel->usuario_calle_derecha,
                $usuarioModel->usuario_num_exterior, 
                $usuarioModel->usuario_num_interior,
            );
            $resultado = $stmt->get_result();
            $usuario_array = $resultado->fetch_assoc();
            $stmt->close();

            return $usuario_array;
        }else{
            return [];
        }
    }
}

?>
