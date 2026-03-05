<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumModulosNovedades
{
    const APORTE_VOLUNTARIO_SEGURIDAD_SOCIAL = 1;
    const BENEFICIO_PERSONAL = 2;
    const EMBARGOS = 3;
    const FONDOS_AHORRO_PAGO = 4;
    const FONDOS_AHORRO_REGISTROS = 5;
    const HORAS_EXTRAS = 6;
    const INGRESOS_DESCUENTOS_CONSECUTIVOS = 7;
    const NOVEDADES_CARGOS = 8;
    const NOVEDADES_RETE_FUENTE = 9;
    const NOVEDADES_SEGURIDAD_SOCIAL = 10;
    const OTROS_INGRESOS_DESCUENTOS = 11;
    const PAGOS_EXTERNOS = 12;
    const PAGO_LABOR = 13;
    const PAGO_PRODUCCION = 14;
    const PRESTAMOS = 15;

    private static $descriptions = [
        ['id' => self::APORTE_VOLUNTARIO_SEGURIDAD_SOCIAL, 'code' => 6, 'description' => "Aporte Voluntario Seguridad Social"],
        ['id' => self::BENEFICIO_PERSONAL, 'code' => 104, 'description' => "Beneficio Personal"],
        ['id' => self::EMBARGOS, 'code' => 36, 'description' => "Embargos"],
        ['id' => self::FONDOS_AHORRO_REGISTROS, 'code' => 42, 'description' => "Fondos Ahorro Registros"],
        ['id' => self::FONDOS_AHORRO_PAGO, 'code' => 43, 'description' => "Fondos Ahorro Pago"],
        ['id' => self::HORAS_EXTRAS, 'code' => 45, 'description' => "Horas Extras"],
        ['id' => self::INGRESOS_DESCUENTOS_CONSECUTIVOS, 'code' => 48, 'description' => "Ingresos Descuentos Consecutivos"],
        ['id' => self::NOVEDADES_CARGOS, 'code' => 103, 'description' => "Novedades Cargos"],
        ['id' => self::NOVEDADES_SEGURIDAD_SOCIAL, 'code' => 56, 'description' => "Novedades Seguridad Social"],
        ['id' => self::NOVEDADES_RETE_FUENTE, 'code' => 32, 'description' => "Novedades Rete Fuente"],
        ['id' => self::OTROS_INGRESOS_DESCUENTOS, 'code' => 57, 'description' => "Otros Ingresos Descuentos"],
        ['id' => self::PAGOS_EXTERNOS, 'code' => 130, 'description' => "Pagos Externos"],
        ['id' => self::PAGO_LABOR, 'code' => 89, 'description' => "Pago Labor"],
        ['id' => self::PAGO_PRODUCCION, 'code' => 59, 'description' => "Pago Producción"],
        ['id' => self::PRESTAMOS, 'code' => 34, 'description' => "Préstamos"],
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
