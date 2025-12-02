<?php

declare(strict_types=1);

namespace Com\Daw2\Models;

use Com\Daw2\Core\BaseDbModel;

class AuxRolModel extends BaseDbModel
{
    public function getRoles()
    {
        $sql = "SELECT id_rol, nombre_rol FROM aux_rol_trabajador";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getRolById(int $id): array|false
    {
        $sql = "SELECT nombre_rol FROM `aux_rol_trabajador` WHERE `id_rol` = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
}
