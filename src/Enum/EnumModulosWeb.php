<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;


/**
 * Enumeración de valores predefinidos.
 */
class EnumModulosWeb
{
    public const SOLICITUDES = 1;
    public const INCAPACIDAD = 2;
    // public const TIEMPO = 3;

    private static $descriptions = [
        ['id' => self::SOLICITUDES, 'code' => 'SOLICITUDES', 'description' => 'Solicitud de Permiso, Licencias, Vacaciones'],
        ['id' => self::INCAPACIDAD, 'code' => 'INCAPACIDAD', 'description' => 'Registro de Incapacidad'],
        // ['id' => self::TIEMPO, 'code' => 'TIEMPO', 'description' => 'Registro de Tiempo Suplementario'],
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
