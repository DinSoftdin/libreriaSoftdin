<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


class EnumTipoRegistro
{
    const IMPORTACION = 1;
    const REGISTRO = 2;
    const WEB = 3;

    private static $descriptions = [
        ['id' => self::IMPORTACION, 'code' => 'IMPORTACION', 'description' => "Importación"],
        ['id' => self::REGISTRO, 'code' => 'REGISTRO', 'description' => "Registro"],
        ['id' => self::WEB, 'code' => 'WEB', 'description' => "Web"]
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
