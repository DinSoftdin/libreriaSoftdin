<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumTipoTurno
{
    const PRIMER_TURNO = 1;
    const SEGUNDO_TURNO = 2;
    const TERCER_TURNO = 3;

    private static $descriptions = [
        ['id' => self::PRIMER_TURNO, 'code' => 'PRIMER_TURNO', 'description' => "Turno 1"],
        ['id' => self::SEGUNDO_TURNO, 'code' => 'SEGUNDO_TURNO', 'description' => "Turno 2"],
        ['id' => self::TERCER_TURNO, 'code' => 'TERCER_TURNO', 'description' => "Turno 3"]
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
