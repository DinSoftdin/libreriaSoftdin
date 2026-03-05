<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumModulosWeb
{
    public const SOLICITUDES = 1;
    public const INCAPACIDAD = 2;
    // public const TIEMPO = 3;

    private static $descriptions = [
        ['id' => self::SOLICITUDES, 'code' => 'SOLICITUDES', 'description' => 'Solicitud de Permiso, Licencias, Vacaciones'],
        ['id' => self::INCAPACIDAD, 'code' => 'INCAPACIDAD', 'description' => 'Registro de Incapacidad'],
        // ['id' => self::TIEMPO, 'code' => 'TIEMPO', 'description' => 'Registro de Tiempo Suplementario'],
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
