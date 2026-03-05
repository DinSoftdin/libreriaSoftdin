<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class TipoToken
{
    const NULO = 0;
    const DELIMITADOR = 1;
    const IDENTIFICADOR = 2;
    const NUMERO = 3;

    private static $descriptions = [
        ['id' => self::NULO, 'code' => 'NULO', 'description' => "NULO"],
        ['id' => self::DELIMITADOR, 'code' => 'DELIMITADOR', 'description' => "DELIMITADOR"],
        ['id' => self::IDENTIFICADOR, 'code' => 'IDENTIFICADOR', 'description' => "IDENTIFICADOR"],
        ['id' => self::NUMERO, 'code' => 'NUMERO', 'description' => "NUMERO"]
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
