<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumTipoPlanilla
{
    const E = 1;
    const Y = 2;
    const A = 3;
    const I = 4;
    const S = 5;
    const M = 6;
    const N = 7;
    const H = 8;
    const T = 9;
    const F = 10;
    const J = 11;
    const X = 12;
    const U = 13;
    const K = 14;

    private static $descriptions = [
        ['id' => self::E, 'code' => 'E', 'description' => 'Empleados Empresas'],
        ['id' => self::Y, 'code' => 'Y', 'description' => 'Independientes Empresa'],
        ['id' => self::A, 'code' => 'A', 'description' => 'Empleados Adicionales'],
        ['id' => self::I, 'code' => 'I', 'description' => 'Independientes'],
        ['id' => self::S, 'code' => 'S', 'description' => 'Empleados de Servicio Domestico'],
        ['id' => self::M, 'code' => 'M', 'description' => 'Mora'],
        ['id' => self::N, 'code' => 'N', 'description' => 'Correcciones'],
        ['id' => self::H, 'code' => 'H', 'description' => 'Madres Sustitutas'],
        ['id' => self::T, 'code' => 'T', 'description' => 'Empleados Entidad Beneficiaria SGP'],
        ['id' => self::F, 'code' => 'F', 'description' => 'Pago Aporte Patronal Faltante SGP'],
        ['id' => self::J, 'code' => 'J', 'description' => 'Pago Seguridad Social Cump. Sentencia Judicial'],
        ['id' => self::X, 'code' => 'X', 'description' => 'Pago Empresa Liquidada'],
        ['id' => self::U, 'code' => 'U', 'description' => 'Uso UGPP pago por tercero'],
        ['id' => self::K, 'code' => 'K', 'description' => 'Estudiantes']
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
