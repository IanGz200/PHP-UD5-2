<?php

declare(strict_types=1);

namespace Com\Daw2\Models;

use Com\Daw2\Core\BaseDbModel;

class ConsultasModel extends BaseDbModel
{
    public function getAll(): array
    {
        $sql = "SELECT * FROM trabajadores";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->fetchAll();
    }
}
