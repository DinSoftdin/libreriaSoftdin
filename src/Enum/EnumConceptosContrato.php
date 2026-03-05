<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumConceptosContrato
{
    const AREATRABAJO = 1;
    const CARGO = 2;
    const DIVISION = 3;
    const MODALIDADSERVICIO = 4;
    const SEDE = 5;
    const SUCURSAL = 6;
    const SUCURSALPILA = 7;
    const TIPOCONTRATO = 8;

    private static $descriptions = [
        ['id' => self::AREATRABAJO, 'code' => 'AREATRABAJO', 'description' => "Area de Trabajo"],
        ['id' => self::CARGO, 'codigo' => 'CARGO', 'description' => "Cargo"],
        ['id' => self::DIVISION, 'codigo' => 'DIVISION', 'description' => "División"],
        ['id' => self::MODALIDADSERVICIO, 'codigo' => 'MODALIDADSERVICIO', 'description' => "Modalidad de Servicio"],
        ['id' => self::SEDE, 'codigo' => 'SEDE', 'description' => "Sede"],
        ['id' => self::SUCURSAL, 'codigo' => 'SUCURSAL', 'description' => "Sucursal"],
        ['id' => self::SUCURSALPILA, 'codigo' => 'SUCURSALPILA', 'description' => "Sucursal PILA"],
        ['id' => self::TIPOCONTRATO, 'codigo' => 'TIPOCONTRATO', 'description' => "Tipo de Contrato"],
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
