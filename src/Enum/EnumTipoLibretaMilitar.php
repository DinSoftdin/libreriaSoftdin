<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;


/**
 * Enumeración de valores predefinidos.
 */
class EnumTipoLibretaMilitar
{
    const PRIMERA = 1;
    const SEGUNDA = 2;
    const NO_APLICA = 3;
    const NO_DEFINIDO = 0;

    private static $descriptions = [
        ['id' => self::PRIMERA, 'code' => 'PRIMERA', 'description' => "Primera"],
        ['id' => self::SEGUNDA, 'code' => 'SEGUNDA', 'description' => "Segunda"],
        ['id' => self::NO_APLICA, 'code' => 'NO_APLICA', 'description' => "No Aplica"],
        ['id' => self::NO_DEFINIDO, 'code' => 'NO_DEFINIDO', 'description' => "No Definido"]
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
