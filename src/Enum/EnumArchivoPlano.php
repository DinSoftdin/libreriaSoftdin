<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;


/**
 * Enumeración de valores predefinidos.
 */
class EnumArchivoPlano
{
    const BANCO_BOGOTA = 1;
    const BANCOLOMBIA = 2;
    const BANCO_GRANAHORRAR = 3;
    const BANCO_BBVA = 4;
    const JURISCOL = 5;

    private static $descriptions = [
        ['id' => self::BANCO_BOGOTA, 'code' => 'BANCO_BOGOTA', 'description' => 'BANCO DE BOGOTA'],
        ['id' => self::BANCOLOMBIA, 'code' => 'BANCOLOMBIA', 'description' => 'BANCOLOMBIA'],
        ['id' => self::BANCO_GRANAHORRAR, 'code' => 'BANCO_GRANAHORRAR', 'description' => 'BANCO DE GRANAHORRAR'],
        ['id' => self::BANCO_BBVA, 'code' => 'BANCO_BBVA', 'description' => 'BANCO BBVA'],
        ['id' => self::JURISCOL, 'code' => 'JURISCOL', 'description' => 'JURISCOL'],
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
