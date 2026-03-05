<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


class EnumRutas
{
    public const ARCHIVOPLANOPILA = 1;
    public const ARCHIVOPLANOTB = 2;
    public const EXPORTACION_EXCELL = 3;
    public const BACKUP = 4;
    public const NOMINAELECTRONICA = 5;

    private static $descriptions = [
        ['id' => self::ARCHIVOPLANOPILA, 'code' => 'ARCHIVOPLANOPILA', 'description' => 'Archivo Plano PILA'],
        ['id' => self::ARCHIVOPLANOTB, 'code' => 'ARCHIVOPLANOTB', 'description' => 'Archivo Plano TB'],
        ['id' => self::EXPORTACION_EXCELL, 'code' => 'EXPORTACION_EXCELL', 'description' => 'Exportación Excel'],
        ['id' => self::BACKUP, 'code' => 'BACKUP', 'description' => 'Backup'],
        ['id' => self::NOMINAELECTRONICA, 'code' => 'NOMINAELECTRONICA', 'description' => 'Nomina Electrónica'],
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
