<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumAplicacionConceptoNovedadEmpresal
{
    const INDIVIDUAL = 1;
    const TODOS = 2;
    const AGRUPAR = 3;

    private static $descriptions = [
        ['id' => self::INDIVIDUAL, 'code' => 'INDIVIDUAL', 'description' => 'Individual'],
        ['id' => self::TODOS, 'code' => 'TODOS', 'description' => 'Todos'],
        ['id' => self::AGRUPAR, 'code' => 'AGRUPAR', 'description' => 'Agrupar'],
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
