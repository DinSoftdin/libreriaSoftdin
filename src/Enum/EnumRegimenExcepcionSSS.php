<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


class EnumRegimenExcepcionSSS
{
    public const No_Aplica = 0;
    public const Decreto_1828_Artc_7 = 1;

    private static $descriptions = [
        ['id' => self::No_Aplica, 'code' => 'No_Aplica', 'description' => 'No Aplica'],
        ['id' => self::Decreto_1828_Artc_7, 'code' => 'Decreto_1828_Artc_7', 'description' => 'Decreto 1828 Artículo 7'],
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
