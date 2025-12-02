<?php

declare(strict_types=1);

namespace Com\Daw2\Models;

use Com\Daw2\Core\BaseDbModel;

class AuxCountryModel extends BaseDbModel
{
    public function getCountries(): array
    {
        $sql = "SELECT id,country_name FROM aux_countries";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getCountryById(int $id): array | false
    {
        $sql = "SELECT country_name FROM aux_countries WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
}
