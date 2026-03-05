<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumTipoRegistroConceptoNovedadEmpresa
{
    const ASIGCON = 1;
    const EMPRESA = 2;

    private static $descriptions = [
        ['id' => self::ASIGCON, 'code' => 'ASIGCON', 'description' => "Asignación Contable"],
        ['id' => self::EMPRESA, 'code' => 'EMPRESA', 'description' => "Asignación por Empresa"]
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
