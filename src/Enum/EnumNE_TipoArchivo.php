<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;



/**
 * Enumeración de valores predefinidos.
 */
class EnumNE_TipoArchivo
{
    public const N = 1;
    public const E = 2;
    public const A = 3;

    private static $descriptions = [
        ['id' => self::N, 'code' => 'N', 'description' => 'Tipo N'],
        ['id' => self::E, 'code' => 'E', 'description' => 'Tipo E'],
        ['id' => self::A, 'code' => 'A', 'description' => 'Tipo A'],
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
