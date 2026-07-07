<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;

/**
 * Acciones de permiso sobre un formulario / pantalla.
 */
class EnumPermisosFormulario
{
    public const CONSULTAR = 1;
    public const CREAR = 2;
    public const MODIFICAR = 3;
    public const ELIMINAR = 4;

    private static $descriptions = [
        ['id' => self::CONSULTAR, 'code' => 'CONSULTAR', 'description' => 'Consultar'],
        ['id' => self::CREAR, 'code' => 'CREAR', 'description' => 'Crear'],
        ['id' => self::MODIFICAR, 'code' => 'MODIFICAR', 'description' => 'Modificar'],
        ['id' => self::ELIMINAR, 'code' => 'ELIMINAR', 'description' => 'Eliminar'],
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
