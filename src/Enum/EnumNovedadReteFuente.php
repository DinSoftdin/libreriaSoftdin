<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumNovedadReteFuente
{
    public const Intereses_Vivienda = 1;
    public const SaludVoluntaria = 2;
    public const Salud_Obligatoria = 3;
    public const Ahorro_AFC = 4;
    public const Dependiente = 5;
    public const DeclaranteRF = 6;
    public const Procedimiento_Dos = 7;
    public const Alimentacion = 8;

    private static $descriptions = [
        ['id' => self::Intereses_Vivienda, 'code' => 'Intereses_Vivienda', 'description' => 'Intereses de Vivienda'],
        ['id' => self::SaludVoluntaria, 'code' => 'SaludVoluntaria', 'description' => 'Salud Voluntaria'],
        ['id' => self::Salud_Obligatoria, 'code' => 'Salud_Obligatoria', 'description' => 'Salud Obligatoria'],
        ['id' => self::Ahorro_AFC, 'code' => 'Ahorro_AFC', 'description' => 'Ahorro AFC'],
        ['id' => self::Dependiente, 'code' => 'Dependiente', 'description' => 'Dependiente'],
        ['id' => self::DeclaranteRF, 'code' => 'DeclaranteRF', 'description' => 'Declarante RF'],
        ['id' => self::Procedimiento_Dos, 'code' => 'Procedimiento_Dos', 'description' => 'Procedimiento Dos'],
        ['id' => self::Alimentacion, 'code' => 'Alimentacion', 'description' => 'Alimentación'],
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
