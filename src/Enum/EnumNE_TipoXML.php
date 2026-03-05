<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumNE_TipoXML
{
    const NominaIndividual = 102;
    const NominaIndividualDeAjuste = 103;

    private static $descriptions = [
        ['id' => self::NominaIndividual, 'code' => 'NominaIndividual', 'description' => "Nomina Individual"],
        ['id' => self::NominaIndividualDeAjuste, 'code' => 'NominaIndividualDeAjuste', 'description' => "Nomina Individual de Ajuste"]
    ];

    public static function getCollection()
    {
        return collect(self::$descriptions);
    }

    public static function getById($id)
    {
        return self::getCollection()->firstWhere('id', $id) ?? null;
    }

    public static function getAll()
    {
        return self::$descriptions;
    }

    public static function getByDescription($description)
    {
        return self::getCollection()->firstWhere('description', $description) ?? null;
    }

}
