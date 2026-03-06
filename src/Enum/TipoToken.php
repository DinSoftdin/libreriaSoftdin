<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;


/**
 * Enumeración de valores predefinidos.
 */
class TipoToken
{
    const NULO = 0;
    const DELIMITADOR = 1;
    const IDENTIFICADOR = 2;
    const NUMERO = 3;

    private static $descriptions = [
        ['id' => self::NULO, 'code' => 'NULO', 'description' => "NULO"],
        ['id' => self::DELIMITADOR, 'code' => 'DELIMITADOR', 'description' => "DELIMITADOR"],
        ['id' => self::IDENTIFICADOR, 'code' => 'IDENTIFICADOR', 'description' => "IDENTIFICADOR"],
        ['id' => self::NUMERO, 'code' => 'NUMERO', 'description' => "NUMERO"]
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
