<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;



/**
 * Enumeración de valores predefinidos.
 */
class EnumContinente
{
    public const ASIA = 1;
    public const AFRICA = 2;
    public const EUROPA = 3;
    public const AMERICA_NORTE = 4;
    public const AMERICA_SUR = 5;
    public const OCEANIA = 6;

    private static $descriptions = [
        ['id' => self::ASIA, 'code' => 'ASIA', 'description' => 'Asia'],
        ['id' => self::AFRICA, 'code' => 'AFRICA', 'description' => 'Africa'],
        ['id' => self::EUROPA, 'code' => 'EUROPA', 'description' => 'Europa'],
        ['id' => self::AMERICA_NORTE, 'code' => 'AMERICA_NORTE', 'description' => 'América del Norte'],
        ['id' => self::AMERICA_SUR, 'code' => 'AMERICA_SUR', 'description' => 'América del Sur'],
        ['id' => self::OCEANIA, 'code' => 'OCEANIA', 'description' => 'Oceanía'],
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
