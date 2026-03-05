<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


class EnumTipoIdentificacion
{
    const CC = 1;
    const TI = 2;
    const RC = 3;
    const CE = 4;
    const PA = 5;
    const NI = 6;
    const CD = 7;
    const SC = 8;
    const NIO = 9;

    private static $descriptions = [
        ['id' => self::CC, 'code' => 'CC', 'description' => "Cedula de Ciudadania"],
        ['id' => self::TI, 'code' => 'TI', 'description' => "Tarjeta de Identidad"],
        ['id' => self::RC, 'code' => 'RC', 'description' => "Registro Civil"],
        ['id' => self::CE, 'code' => 'CE', 'description' => "Cedula de Extranjería"],
        ['id' => self::PA, 'code' => 'PA', 'description' => "Pasaporte"],
        ['id' => self::NI, 'code' => 'NI', 'description' => "Numero de Identificación Tributaria NIT"],
        ['id' => self::CD, 'code' => 'CD', 'description' => "Carnet Diplomático"],
        ['id' => self::SC, 'code' => 'SC', 'description' => "Salvoconducto de permanencia"],
        ['id' => self::NIO, 'code' => 'NIO', 'description' => "Numero de Identificación Tributaria NIT Entidad Oficial"]
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
