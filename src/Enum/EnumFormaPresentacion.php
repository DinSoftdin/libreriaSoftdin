<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;



/**
 * Enumeración de valores predefinidos.
 */
class EnumFormaPresentacion
{
    public const UNICO = 1;
    public const CONSOLIDADO = 2;
    public const SUCURSAL = 3;
    public const DEPENDENCIA = 4;

    private static $descriptions = [
        ['id' => self::UNICO, 'code' => 'UNICO', 'description' => 'Único'],
        ['id' => self::CONSOLIDADO, 'code' => 'CONSOLIDADO', 'description' => 'Consolidado'],
        ['id' => self::SUCURSAL, 'code' => 'SUCURSAL', 'description' => 'Sucursal'],
        ['id' => self::DEPENDENCIA, 'code' => 'DEPENDENCIA', 'description' => 'Dependencia'],
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
