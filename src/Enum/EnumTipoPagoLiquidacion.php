<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;


/**
 * Enumeración de valores predefinidos.
 */
class EnumTipoPagoLiquidacion
{
    const NOMINA = 1;
    const TESORERIA = 2;
    const FONDO = 3;
    const AHORRO = 4;

    private static $descriptions = [
        ['id' => self::NOMINA, 'code' => 'NOMINA', 'description' => "Nómina"],
        ['id' => self::TESORERIA, 'code' => 'TESORERIA', 'description' => "Tesorería"],
        ['id' => self::FONDO, 'code' => 'FONDO', 'description' => "Fondo"],
        ['id' => self::AHORRO, 'code' => 'AHORRO', 'description' => "Ahorro"]
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
