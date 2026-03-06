<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;


/**
 * Enumeración de valores predefinidos.
 */
class EnumTipoNovedad
{
    public const INGRESO = 1;
    public const DEDUCCION = 2;
    public const HORAS_EXTRA = 3;
    public const PROV_PREST = 4;
    public const PROV_SEGSOC = 5;
    public const PLANILLA_UNICA = 6;
    public const LIQUIDACION = 7;
    public const AGRUPAR = 10;
    public const FORMULA = 11;

    private static $descriptions = [
        ['id' => self::INGRESO, 'code' => 'INGRESO', 'description' => 'Ingreso'],
        ['id' => self::DEDUCCION, 'code' => 'DEDUCCION', 'description' => 'Deducción'],
        ['id' => self::HORAS_EXTRA, 'code' => 'HORAS_EXTRA', 'description' => 'Horas Extra'],
        ['id' => self::PROV_PREST, 'code' => 'PROV_PREST', 'description' => 'Provisión Prestaciones'],
        ['id' => self::PROV_SEGSOC, 'code' => 'PROV_SEGSOC', 'description' => 'Provisión Seguridad Social'],
        ['id' => self::PLANILLA_UNICA, 'code' => 'PLANILLA_UNICA', 'description' => 'Planilla Única'],
        ['id' => self::LIQUIDACION, 'code' => 'LIQUIDACION', 'description' => 'Liquidación'],
        ['id' => self::AGRUPAR, 'code' => 'AGRUPAR', 'description' => 'Agrupar'],
        ['id' => self::FORMULA, 'code' => 'FORMULA', 'description' => 'Fórmula'],
    ];


    /**
     * Retorna la colección de elementos del Enum.
     *
     * @return \Illuminate\Support\Collection Colección con id, code y description.
     */
    public static function getCollection()
    {
        return collect(self::$descriptions);
    }


    /**
     * Busca un elemento por su ID.
     *
     * @param mixed $id Identificador del elemento.
     * @return array|null Elemento encontrado o null.
     */
    public static function getById($id)
    {
        return self::getCollection()->firstWhere('id', $id) ?? null;
    }


    /**
     * Retorna todos los elementos del Enum.
     *
     * @return array Arreglo con todos los elementos.
     */
    public static function getAll()
    {
        return self::$descriptions;
    }


    /**
     * Busca un elemento por su descripción.
     *
     * @param string $description Descripción del elemento.
     * @return array|null Elemento encontrado o null.
     */
    public static function getByDescription($description)
    {
        return self::getCollection()->firstWhere('description', $description) ?? null;
    }

}
