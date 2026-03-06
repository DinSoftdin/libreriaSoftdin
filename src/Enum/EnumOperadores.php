<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;



/**
 * Enumeración de valores predefinidos.
 */
class EnumOperadores
{
    public const CORCHETE_A = 1;
    public const CORCHETE_C = 2;
    public const PARENTESIS_A = 3;
    public const PARENTESIS_C = 4;
    public const SUMA = 5;
    public const RESTA = 6;
    public const MULTIPLICACION = 7;
    public const DIVISION = 8;

    private static $descriptions = [
        ['id' => self::CORCHETE_A, 'code' => '[', 'description' => 'Corchete Abierto'],
        ['id' => self::CORCHETE_C, 'code' => ']', 'description' => 'Corchete Cerrado'],
        ['id' => self::PARENTESIS_A, 'code' => '(', 'description' => 'Paréntesis Abierto'],
        ['id' => self::PARENTESIS_C, 'code' => ')', 'description' => 'Paréntesis Cerrado'],
        ['id' => self::SUMA, 'code' => '+', 'description' => 'Suma'],
        ['id' => self::RESTA, 'code' => '-', 'description' => 'Resta'],
        ['id' => self::MULTIPLICACION, 'code' => '*', 'description' => 'Multiplicación'],
        ['id' => self::DIVISION, 'code' => '/', 'description' => 'División'],
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
