<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;



/**
 * Enumeración de valores predefinidos.
 */
class EnumTipoActividad
{
    const COMERCIAL = 1;
    const SERVICIO = 2;
    const INDUSTRIAL = 3;

    private static $descriptions = [
        ['id' => self::COMERCIAL, 'code' => 'COM', 'description' => "Comercial"],
        ['id' => self::SERVICIO, 'code' => 'SER', 'description' => "Servicio"],
        ['id' => self::INDUSTRIAL, 'code' => 'IND', 'description' => "Industrial"]
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
