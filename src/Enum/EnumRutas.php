<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;



/**
 * Enumeración de valores predefinidos.
 */
class EnumRutas
{
    public const ARCHIVOPLANOPILA = 1;
    public const ARCHIVOPLANOTB = 2;
    public const EXPORTACION_EXCELL = 3;
    public const BACKUP = 4;
    public const NOMINAELECTRONICA = 5;

    private static $descriptions = [
        ['id' => self::ARCHIVOPLANOPILA, 'code' => 'ARCHIVOPLANOPILA', 'description' => 'Archivo Plano PILA'],
        ['id' => self::ARCHIVOPLANOTB, 'code' => 'ARCHIVOPLANOTB', 'description' => 'Archivo Plano TB'],
        ['id' => self::EXPORTACION_EXCELL, 'code' => 'EXPORTACION_EXCELL', 'description' => 'Exportación Excel'],
        ['id' => self::BACKUP, 'code' => 'BACKUP', 'description' => 'Backup'],
        ['id' => self::NOMINAELECTRONICA, 'code' => 'NOMINAELECTRONICA', 'description' => 'Nomina Electrónica'],
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
