<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumTipoServicioSeguridadSocial
{
    const EPS = 1;
    const AFP = 2;
    const ARL = 3;
    const CCF = 4;
    const SENA = 5;
    const ICBF = 6;
    const ESAP = 7;
    const MEN = 8;
    const FONDO_CESANTIAS = 9;

    private static $descriptions = [
        ['id' => self::EPS, 'code' => 'EPS', 'description' => "EPS"],
        ['id' => self::AFP, 'code' => 'AFP', 'description' => "AFP"],
        ['id' => self::ARL, 'code' => 'ARL', 'description' => "ARL"],
        ['id' => self::CCF, 'code' => 'CCF', 'description' => "CCF"],
        ['id' => self::SENA, 'code' => 'SENA', 'description' => "SENA"],
        ['id' => self::ICBF, 'code' => 'ICBF', 'description' => "ICBF"],
        ['id' => self::ESAP, 'code' => 'ESAP', 'description' => "ESAP"],
        ['id' => self::MEN, 'code' => 'MEN', 'description' => "Ministerio de Educación"],
        ['id' => self::FONDO_CESANTIAS, 'code' => 'FONDO_CESANTIAS', 'description' => "Fondo de Cesantías"]
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
