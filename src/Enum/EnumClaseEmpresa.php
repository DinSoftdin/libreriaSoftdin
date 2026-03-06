<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;


/**
 * Enumeración de valores predefinidos.
 */
class EnumClaseEmpresa
{
    const EMPRESA = 1;
    const COOPERATIVA = 2;
    const BANCO = 3;
    const PILA = 4;

    private static $descriptions = [
        ['id' => self::EMPRESA, 'code' => 'EMP', 'description' => 'EMPRESA'],
        ['id' => self::COOPERATIVA, 'code' => 'COP', 'description' => 'COOPERATIVA'],
        ['id' => self::BANCO, 'code' => 'BAN', 'description' => 'BANCO'],
        ['id' => self::PILA, 'code' => 'PIL', 'description' => 'PILA'],
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
