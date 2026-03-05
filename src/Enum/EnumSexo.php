<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumSexo
{
    public const M = 1;
    public const F = 2;
    public const ND = 3;

    public const NDR = 4;

    private static $descriptions = [
        ['id' => self::M, 'code' => 'M', 'description' => 'Masculino'],
        ['id' => self::F, 'code' => 'F', 'description' => 'Femenino'],
        ['id' => self::ND, 'code' => 'ND', 'description' => 'No definido'],
        ['id' => self::NDR, 'code' => 'NDR', 'description' => 'No deseo responder'],    
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
