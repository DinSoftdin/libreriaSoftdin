<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;


/**
 * Enumeración de valores predefinidos.
 */
class TiposError
{
    const NoDefinido = 0;
    const Sintaxis = 1;
    const Identificador = 2;
    const Parentesis = 3;
    const DivisionPorCero = 4;
    const SinExpresion = 5;

    private static $descriptions = [
        ['id' => self::NoDefinido, 'code' => 'NoDefinido', 'description' => 'Error no definido'],
        ['id' => self::Sintaxis, 'code' => 'Sintaxis', 'description' => 'Error de sintaxis'],
        ['id' => self::Identificador, 'code' => 'Identificador', 'description' => 'Error de identificador'],
        ['id' => self::Parentesis, 'code' => 'Parentesis', 'description' => 'Error de paréntesis'],
        ['id' => self::DivisionPorCero, 'code' => 'DivisionPorCero', 'description' => 'Error de división por cero'],
        ['id' => self::SinExpresion, 'code' => 'SinExpresion', 'description' => 'Error de expresión vacía']
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
