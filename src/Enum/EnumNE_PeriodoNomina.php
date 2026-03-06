<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;


/**
 * Enumeración de valores predefinidos.
 */
class EnumNE_PeriodoNomina
{
    const Semanal = 1;
    const Decenal = 2;
    const Catorcenal = 3;
    const Quincenal = 4;
    const Mensual = 5;
    const Otro = 6;

    private static $descriptions = [
        ['id' => self::Semanal, 'code' => 'Semanal', 'description' => "Semanal"],
        ['id' => self::Decenal, 'code' => 'Decenal', 'description' => "Decenal"],
        ['id' => self::Catorcenal, 'code' => 'Catorcenal', 'description' => "Catorcenal"],
        ['id' => self::Quincenal, 'code' => 'Quincenal', 'description' => "Quincenal"],
        ['id' => self::Mensual, 'code' => 'Mensual', 'description' => "Mensual"],
        ['id' => self::Otro, 'code' => 'Otro', 'description' => "Otro"]
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
