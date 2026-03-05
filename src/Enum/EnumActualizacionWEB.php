<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumActualizacionWEB
{
    const REGISTRADO = 1;
    const NO_REGISTRADO = 3;
    const ESPERANDO_GUARDAR = 2;
    const ACTUALIZADO = 4;
    const DESACTUALIZADO = 5;
    const NO_SUBIDO_WEB = 6;
    const ACTIVO = 7;
    const INACTIVO = 8;

    private static $descriptions = [
        ['id' => self::REGISTRADO, 'code' => 'REGISTRADO', 'description' => "Registrado"],
        ['id' => self::NO_REGISTRADO, 'code' => 'NO_REGISTRADO', 'description' => "No Registrado"],
        ['id' => self::ESPERANDO_GUARDAR, 'code' => 'ESPERANDO_GUARDAR', 'description' => "Esperando Guardar"],
        ['id' => self::ACTUALIZADO, 'code' => 'ACTUALIZADO', 'description' => "Actualizado"],
        ['id' => self::DESACTUALIZADO, 'code' => 'DESACTUALIZADO', 'description' => "Desactualizado"],
        ['id' => self::NO_SUBIDO_WEB, 'code' => 'NO_SUBIDO_WEB', 'description' => "No Subido a la Web"],
        ['id' => self::ACTIVO, 'code' => 'ACTIVO', 'description' => "Activo"],
        ['id' => self::INACTIVO, 'code' => 'INACTIVO', 'description' => "Inactivo"]
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
