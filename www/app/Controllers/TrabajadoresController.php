<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;
use Com\Daw2\Models\AuxCountryModel;
use Com\Daw2\Models\AuxRolModel;
use Com\Daw2\Models\TrabajadoresModel;

class TrabajadoresController extends BaseController
{
    public function getTrabajadores()
    {
        $model = new TrabajadoresModel();
        $trabajadores = $model->getByFilters($_GET);
        $auxRol = new AuxRolModel();
        $roles = $auxRol->getRoles();
        $auxCountry = new AuxCountryModel();
        $countries = $auxCountry->getCountries();
        $data = array(
            'titulo' => 'Tabla de trabajadores',
            'breadcrumb' => ['Inicio','Trabajadores'],
            'seccion' => '/Trabajadores',
            'trabajadores' => $trabajadores,
            'paises' => $countries,
            'roles' => $roles,
        );
        $this->view->showViews(
            array
            (
                'templates/header.view.php',
                'trabajadores.view.php',
                'templates/footer.view.php'
            ),
            $data
        );
    }
}
