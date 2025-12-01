<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;
use Com\Daw2\Models\ConsultasModel;

class TrabajadoresController extends BaseController
{
    public function getAllTrabajadores()
    {
        $model = new ConsultasModel();
    }
}
