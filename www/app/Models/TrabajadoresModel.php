<?php

declare(strict_types=1);

namespace Com\Daw2\Models;

use Com\Daw2\Core\BaseDbModel;

class TrabajadoresModel extends BaseDbModel
{
    private const QUERY_FROM = 'FROM trabajadores t
                                LEFT JOIN aux_countries c ON t.id_country = c.id
                                LEFT JOIN aux_rol_trabajador rol ON t.id_rol = rol.id_rol ';
    private const SELECT = 'SELECT t.*,rol.nombre_rol,c.country_name ' . self::QUERY_FROM;

    public function getAll(): array
    {
        $sql = self::SELECT;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getByFilters($filters): array
    {
        $sql = self::SELECT;
        $where = $this->getWhere($filters);
        $condiciones = $where['condiciones'];
        $valores = $where['valores'];
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    private function getWhere($filters): array
    {
        $condiciones = [];
        $valores = [];
        if (!empty($filters['username'])) {
            $condiciones[] = 't.username LIKE :username';
            $valores['username'] = '%' . $filters['username'] . '%';
        }
        return ['condiciones' =>$condiciones, 'valores' => $valores];
    }
}
