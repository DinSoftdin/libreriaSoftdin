<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumTipoLibretaMilitar
{
    const PRIMERA = 1;
    const SEGUNDA = 2;
    const NO_APLICA = 3;
    const NO_DEFINIDO = 0;

    private static $descriptions = [
        ['id' => self::PRIMERA, 'code' => 'PRIMERA', 'description' => "Primera"],
        ['id' => self::SEGUNDA, 'code' => 'SEGUNDA', 'description' => "Segunda"],
        ['id' => self::NO_APLICA, 'code' => 'NO_APLICA', 'description' => "No Aplica"],
        ['id' => self::NO_DEFINIDO, 'code' => 'NO_DEFINIDO', 'description' => "No Definido"]
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
