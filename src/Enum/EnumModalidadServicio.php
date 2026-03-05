<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumModalidadServicio
{
    public const NORMAL = 1;
    public const PPD = 2;
    public const LABOR = 3;

    private static $descriptions = [
        ['id' => self::NORMAL, 'code' => 'NORMAL', 'description' => 'Normal'],
        ['id' => self::PPD, 'code' => 'PPD', 'description' => 'PPD'],
        ['id' => self::LABOR, 'code' => 'LABOR', 'description' => 'Labor'],
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
