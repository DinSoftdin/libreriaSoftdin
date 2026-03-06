<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;


/**
 * Enumeración de valores predefinidos.
 */
class EnumSexo
{
    public const M = 1;
    public const F = 2;
    public const ND = 3;

    public const NDR = 4;

    private static $descriptions = [
        ['id' => self::M, 'code' => 'M', 'description' => 'Masculino'],
        ['id' => self::F, 'code' => 'F', 'description' => 'Femenino'],
        ['id' => self::ND, 'code' => 'ND', 'description' => 'No definido'],
        ['id' => self::NDR, 'code' => 'NDR', 'description' => 'No deseo responder'],    
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
