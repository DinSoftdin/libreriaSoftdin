<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


class EnumReporteComprobantesPAGOFiltros
{
    public const CLIENTE = 1;
    public const MODALIDAD_CONTRATACION = 2;
    public const CONTRATACION = 3;
    public const CODIGO = 4;
    public const EMAIL = 5;

    private static $descriptions = [
        ['id' => self::CLIENTE, 'code' => 'CLIENTE', 'description' => 'Cliente'],
        ['id' => self::MODALIDAD_CONTRATACION, 'code' => 'MODALIDAD_CONTRATACION', 'description' => 'Modalidad de Contratación'],
        ['id' => self::CONTRATACION, 'code' => 'CONTRATACION', 'description' => 'Contratación'],
        ['id' => self::CODIGO, 'code' => 'CODIGO', 'description' => 'Código'],
        ['id' => self::EMAIL, 'code' => 'EMAIL', 'description' => 'Email'],
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
