<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;


/**
 * Enumeración de valores predefinidos.
 */
class EnumTipoCentroCosto
{
    public const UNICO = 1;
    public const TIEMPO = 2;
    public const PORCENTAJE = 3;
    public const PORCENTAJE_TIEMPO = 4;

    private static $descriptions = [
        ['id' => self::UNICO, 'code' => 'UNICO', 'description' => 'Unico'],
        ['id' => self::TIEMPO, 'code' => 'TIEMPO', 'description' => 'Tiempo'],
        ['id' => self::PORCENTAJE, 'code' => 'PORCENTAJE', 'description' => 'Porcentaje'],
        ['id' => self::PORCENTAJE_TIEMPO, 'code' => 'PORCENTAJE_TIEMPO', 'description' => 'Porcentaje y Tiempo'],
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
