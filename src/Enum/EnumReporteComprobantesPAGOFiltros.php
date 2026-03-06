<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;



/**
 * Enumeración de valores predefinidos.
 */
class EnumReporteComprobantesPAGOFiltros
{
    public const CLIENTE = 1;
    public const MODALIDAD_CONTRATACION = 2;
    public const CONTRATACION = 3;
    public const CODIGO = 4;
    public const EMAIL = 5;

    private static $descriptions = [
        ['id' => self::CLIENTE, 'code' => 'CLIENTE', 'description' => 'Cliente'],
        ['id' => self::MODALIDAD_CONTRATACION, 'code' => 'MODALIDAD_CONTRATACION', 'description' => 'Modalidad de Contratación'],
        ['id' => self::CONTRATACION, 'code' => 'CONTRATACION', 'description' => 'Contratación'],
        ['id' => self::CODIGO, 'code' => 'CODIGO', 'description' => 'Código'],
        ['id' => self::EMAIL, 'code' => 'EMAIL', 'description' => 'Email'],
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
