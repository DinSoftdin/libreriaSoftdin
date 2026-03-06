<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;


/**
 * Enumeración de valores predefinidos.
 */
class EnumDiasSemana
{
    const LUNES = 1;
    const MARTES = 2;
    const MIERCOLES = 3;
    const JUEVES = 4;
    const VIERNES = 5;
    const SABADO = 6;
    const DOMINGO = 7;

    private static $descriptions = [
        ['id' => self::LUNES, 'code' => 'LUNES', 'description' => 'Lunes'],
        ['id' => self::MARTES, 'code' => 'MARTES', 'description' => 'Martes'],
        ['id' => self::MIERCOLES, 'code' => 'MIERCOLES', 'description' => 'Miercoles'],
        ['id' => self::JUEVES, 'code' => 'JUEVES', 'description' => 'Jueves'],
        ['id' => self::VIERNES, 'code' => 'VIERNES', 'description' => 'Viernes'],
        ['id' => self::SABADO, 'code' => 'SABADO', 'description' => 'Sabado'],
        ['id' => self::DOMINGO, 'code' => 'DOMINGO', 'description' => 'Domingo'],
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
