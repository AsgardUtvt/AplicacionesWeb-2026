<?php	
namespace App\Modules\Voluntario\Controller;

use App\Core\Controller;


const RESTARUACION = "RestaruacionView"; 

class VoluntarioController extends Controller {
    public function index( ){
        $this->view(RESTARUACION, ["nada" => null]);
    }

}
?>
