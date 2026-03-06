<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;



/**
 * Enumeración de valores predefinidos.
 */
class EnumReporteComprobantesPAGO
{
    public const GENERAL = 1;
    public const DETALLADO_INGRESOS = 2;
    public const DETALLADO_MODALIDAD = 3;
    public const DETALLADO_PRESTAMOS = 4;
    public const RESUMEN = 5;

    private static $descriptions = [
        ['id' => self::GENERAL, 'code' => 'GENERAL', 'description' => 'General'],
        ['id' => self::DETALLADO_INGRESOS, 'code' => 'DETALLADO_INGRESOS', 'description' => 'Detallado de Ingresos'],
        ['id' => self::DETALLADO_MODALIDAD, 'code' => 'DETALLADO_MODALIDAD', 'description' => 'Detallado Modalidad'],
        ['id' => self::DETALLADO_PRESTAMOS, 'code' => 'DETALLADO_PRESTAMOS', 'description' => 'Detallado Prestamos'],
        ['id' => self::RESUMEN, 'code' => 'RESUMEN', 'description' => 'Resumen'],
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
