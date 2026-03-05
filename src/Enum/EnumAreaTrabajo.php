<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumAreaTrabajo
{
    const ADMINISTRATIVO = 1;
    const OPERATIVO = 2;

    private static $descriptions = [
        ['id' => self::ADMINISTRATIVO, 'code' => 'ADMINISTRATIVO', 'description' => 'Administrativo'],
        ['id' => self::OPERATIVO, 'code' => 'OPERATIVO', 'description' => 'Operativo'],
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
