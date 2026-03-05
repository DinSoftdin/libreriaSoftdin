<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumClaseEmpresa
{
    const EMPRESA = 1;
    const COOPERATIVA = 2;
    const BANCO = 3;
    const PILA = 4;

    private static $descriptions = [
        ['id' => self::EMPRESA, 'code' => 'EMP', 'description' => 'EMPRESA'],
        ['id' => self::COOPERATIVA, 'code' => 'COP', 'description' => 'COOPERATIVA'],
        ['id' => self::BANCO, 'code' => 'BAN', 'description' => 'BANCO'],
        ['id' => self::PILA, 'code' => 'PIL', 'description' => 'PILA'],
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
