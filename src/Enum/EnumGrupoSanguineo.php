<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


class EnumGrupoSanguineo
{
    public const Amas = 1;
    public const Amenos = 2;
    public const ABmas = 3;
    public const ABmenos = 4;
    public const Bmas = 5;
    public const Bmenos = 6;
    public const Omas = 7;
    public const Omenos = 8;
    public const noDefinido = 0;

    private static $descriptions = [
        ['id' => self::Amas, 'code' => 'Amas', 'description' => 'A+'],
        ['id' => self::Amenos, 'code' => 'Amenos', 'description' => 'A-'],
        ['id' => self::ABmas, 'code' => 'ABmas', 'description' => 'AB+'],
        ['id' => self::ABmenos, 'code' => 'ABmenos', 'description' => 'AB-'],
        ['id' => self::Bmas, 'code' => 'Bmas', 'description' => 'B+'],
        ['id' => self::Bmenos, 'code' => 'Bmenos', 'description' => 'B-'],
        ['id' => self::Omas, 'code' => 'Omas', 'description' => 'O+'],
        ['id' => self::Omenos, 'code' => 'Omenos', 'description' => 'O-'],
        ['id' => self::noDefinido, 'code' => 'noDefinido', 'description' => 'NO DEFINIDO'],
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

