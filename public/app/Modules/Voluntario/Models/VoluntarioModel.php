<?php
namespace App\Modules\Voluntario\Models;

use App\DataBase\MySqlDataBase;
use mysqli;

class VoluntariadoModel
{
    private MySqlDataBase $dbInstance;
    private mysqli $con;

    /* Atributos de ubicación */
    public $id_ubicacion;
    public $id_codigo_postal;
    public $ubicacion_calle_principal;
    public $ubicacion_calle_izquierda;
    public $ubicacion_calle_derecha;
    public $ubicacion_num_exterior;
    public $ubicacion_num_interior;

    /* Atributos de voluntariado */
    public $id_voluntariado;
    public $voluntariado_name;
    public $voluntariado_objetivo;
    public $voluntariado_fecha_inicio;
    public $voluntariado_fecha_fin;
    public $voluntariado_propietario;

    public function __construct()
    {
        $this->dbInstance = MySqlDataBase::getMySqlDataBaseInstance();
        $this->con = $this->dbInstance->conectar();
    }

    // CREATE inserta ubicación y luego el voluntariado
    public function insertar_voluntariado(): array
    {
        $this->con->begin_transaction();

        try {
            $sqlUbi = "INSERT INTO ubicacion (
                id_codigo_postal,
                ubicacion_calle_principal,
                ubicacion_calle_izquierda,
                ubicacion_calle_derecha,
                ubicacion_num_exterior,
                ubicacion_num_interior
            ) VALUES (?, ?, ?, ?, ?, ?)";

            $stmtUbi = $this->con->prepare($sqlUbi);
            if (!$stmtUbi) {
                throw new \Exception("Error al preparar ubicacion: " . $this->con->error);
            }

            $idCp = (int) $this->id_codigo_postal;
            $callePrincipal = trim((string) $this->ubicacion_calle_principal);
            $calleIzquierda = trim((string) ($this->ubicacion_calle_izquierda ?? 'N/A'));
            $calleDerecha = trim((string) ($this->ubicacion_calle_derecha ?? 'N/A'));
            $numExterior = trim((string) $this->ubicacion_num_exterior);
            $numInterior = trim((string) ($this->ubicacion_num_interior ?? 'S/N'));

            $stmtUbi->bind_param(
                "isssss",
                $idCp,
                $callePrincipal,
                $calleIzquierda,
                $calleDerecha,
                $numExterior,
                $numInterior
            );

            if (!$stmtUbi->execute()) {
                throw new \Exception("Error al insertar ubicacion: " . $stmtUbi->error);
            }

            $this->id_ubicacion = (int) $this->con->insert_id;
            $stmtUbi->close();

            $sqlVol = "INSERT INTO voluntariado (
                voluntariado_name,
                voluntariado_objetivo,
                voluntariado_fecha_inicio,
                voluntariado_fecha_fin,
                voluntariado_propietario,
                id_ubicacion
            ) VALUES (?, ?, ?, ?, ?, ?)";

            $stmtVol = $this->con->prepare($sqlVol);
            if (!$stmtVol) {
                throw new \Exception("Error al preparar voluntariado: " . $this->con->error);
            }

            $nombre = trim((string) $this->voluntariado_name);
            $objetivo = trim((string) $this->voluntariado_objetivo);
            $fechaInicio = trim((string) $this->voluntariado_fecha_inicio);
            $fechaFin = trim((string) $this->voluntariado_fecha_fin);
            $propietario = isset($this->voluntariado_propietario) ? (int) $this->voluntariado_propietario : 0;
            $idUbi = (int) $this->id_ubicacion;

            $stmtVol->bind_param(
                "ssssii",
                $nombre,
                $objetivo,
                $fechaInicio,
                $fechaFin,
                $propietario,
                $idUbi
            );

            $resultado = $stmtVol->execute();
            $lastId = (int) $this->con->insert_id;
            $stmtVol->close();

            if (!$resultado) {
                throw new \Exception("Error al insertar voluntariado");
            }

            $this->con->commit();
            return [
                "resultado" => true,
                "id_voluntariado" => $lastId,
                "id_ubicacion" => $idUbi
            ];
        } catch (\Throwable $e) {
            $this->con->rollback();
            error_log($e->getMessage());
            return [
                "resultado" => false,
                "id_voluntariado" => null,
                "id_ubicacion" => null
            ];
        }
    }

    // READ (todos)
    public function consultar_todos(): array
    {
        $sql = "SELECT
                    v.id_voluntariado,
                    v.voluntariado_name,
                    v.voluntariado_objetivo,
                    v.voluntariado_fecha_inicio,
                    v.voluntariado_fecha_fin,
                    v.voluntariado_propietario,
                    v.id_ubicacion,
                    u.ubicacion_calle_principal,
                    u.ubicacion_num_exterior,
                    cp.codigo_postal,
                    cp.colonia,
                    m.municipio,
                    m.latitud,
                    m.longitud,
                    e.estado
                FROM voluntariado v
                INNER JOIN ubicacion u ON v.id_ubicacion = u.id_ubicacion
                INNER JOIN codigo_postal cp ON u.id_codigo_postal = cp.id_codigo_postal
                INNER JOIN municipio m ON cp.id_municipio = m.id_municipio
                INNER JOIN estado e ON m.id_estado = e.id_estado
                ORDER BY v.id_voluntariado DESC";

        $resultado = $this->con->query($sql);
        if (!$resultado) {
            return [];
        }

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // READ uno por ID
    public function consultar_datos(int $id_voluntariado): array
    {
        $sql = "SELECT
                    v.id_voluntariado,
                    v.voluntariado_name,
                    v.voluntariado_objetivo,
                    v.voluntariado_fecha_inicio,
                    v.voluntariado_fecha_fin,
                    v.voluntariado_propietario,
                    v.id_ubicacion,
                    u.id_codigo_postal,
                    u.ubicacion_calle_principal,
                    u.ubicacion_calle_izquierda,
                    u.ubicacion_calle_derecha,
                    u.ubicacion_num_exterior,
                    u.ubicacion_num_interior
                FROM voluntariado v
                INNER JOIN ubicacion u ON v.id_ubicacion = u.id_ubicacion
                WHERE v.id_voluntariado = ?
                LIMIT 1";

        $stmt = $this->con->prepare($sql);
        if (!$stmt) {
            return [];
        }

        $stmt->bind_param("i", $id_voluntariado);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $fila = $resultado ? $resultado->fetch_assoc() : [];
        $stmt->close();

        return $fila ?: [];
    }

    // UPDAT actualiza voluntariado y su ubicación asociada
    public function actualizar_voluntariado(int $id_voluntariado): bool
    {
        $actual = $this->consultar_datos($id_voluntariado);
        if (empty($actual)) {
            return false;
        }

        $idUbi = (int) $actual['id_ubicacion'];
        $this->con->begin_transaction();

        try {
            $sqlUbi = "UPDATE ubicacion
                       SET id_codigo_postal = ?,
                           ubicacion_calle_principal = ?,
                           ubicacion_calle_izquierda = ?,
                           ubicacion_calle_derecha = ?,
                           ubicacion_num_exterior = ?,
                           ubicacion_num_interior = ?
                       WHERE id_ubicacion = ?";

            $stmtUbi = $this->con->prepare($sqlUbi);
            if (!$stmtUbi) {
                throw new \Exception("Error al preparar update ubicacion: " . $this->con->error);
            }

            $idCp = (int) $this->id_codigo_postal;
            $callePrincipal = trim((string) $this->ubicacion_calle_principal);
            $calleIzquierda = trim((string) ($this->ubicacion_calle_izquierda ?? 'N/A'));
            $calleDerecha = trim((string) ($this->ubicacion_calle_derecha ?? 'N/A'));
            $numExterior = trim((string) $this->ubicacion_num_exterior);
            $numInterior = trim((string) ($this->ubicacion_num_interior ?? 'S/N'));

            $stmtUbi->bind_param(
                "isssssi",
                $idCp,
                $callePrincipal,
                $calleIzquierda,
                $calleDerecha,
                $numExterior,
                $numInterior,
                $idUbi
            );

            if (!$stmtUbi->execute()) {
                throw new \Exception("Error al actualizar ubicacion: " . $stmtUbi->error);
            }
            $stmtUbi->close();

            $sqlVol = "UPDATE voluntariado
                       SET voluntariado_name = ?,
                           voluntariado_objetivo = ?,
                           voluntariado_fecha_inicio = ?,
                           voluntariado_fecha_fin = ?,
                           voluntariado_propietario = ?
                       WHERE id_voluntariado = ?";

            $stmtVol = $this->con->prepare($sqlVol);
            if (!$stmtVol) {
                throw new \Exception("Error al preparar update voluntariado: " . $this->con->error);
            }

            $nombre = trim((string) $this->voluntariado_name);
            $objetivo = trim((string) $this->voluntariado_objetivo);
            $fechaInicio = trim((string) $this->voluntariado_fecha_inicio);
            $fechaFin = trim((string) $this->voluntariado_fecha_fin);
            $propietario = isset($this->voluntariado_propietario) ? (int) $this->voluntariado_propietario : 0;

            $stmtVol->bind_param(
                "ssssii",
                $nombre,
                $objetivo,
                $fechaInicio,
                $fechaFin,
                $propietario,
                $id_voluntariado
            );

            if (!$stmtVol->execute()) {
                throw new \Exception("Error al actualizar voluntariado: " . $stmtVol->error);
            }
            $stmtVol->close();

            $this->con->commit();
            return true;
        } catch (\Throwable $e) {
            $this->con->rollback();
            error_log($e->getMessage());
            return false;
        }
    }

    // DELETE eliminar por ID
    public function eliminar_voluntariado(int $id_voluntariado): bool
    {
        $sql = "DELETE FROM voluntariado WHERE id_voluntariado = ?";
        $stmt = $this->con->prepare($sql);
        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("i", $id_voluntariado);
        $ok = $stmt->execute();
        $stmt->close();

        return $ok;
    }
}
