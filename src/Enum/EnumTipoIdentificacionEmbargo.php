<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumTipoIdentificacionEmbargo
{
    const CC = EnumTipoIdentificacion::CC;
    const CE = EnumTipoIdentificacion::CE;
    const NIT_P = EnumTipoIdentificacion::NI;
    const PA = EnumTipoIdentificacion::PA;
    const TI = EnumTipoIdentificacion::TI;
    const NIT_O = EnumTipoIdentificacion::NIO;

    private static $descriptions = [
        ['id' => self::CC, 'code' => 'CC', 'description' => "Cedula de Ciudadanía"],
        ['id' => self::CE, 'code' => 'CE', 'description' => "Cedula de Extranjería"],
        ['id' => self::NIT_P, 'code' => 'NIT_P', 'description' => "NIT Entidad Privada"],
        ['id' => self::PA, 'code' => 'PA', 'description' => "Pasaporte"],
        ['id' => self::TI, 'code' => 'TI', 'description' => "Tarjeta de Identificación"],
        ['id' => self::NIT_O, 'code' => 'NIT_O', 'description' => "NIT Entidad Oficial"]
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
