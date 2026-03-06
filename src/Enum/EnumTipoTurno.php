<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;


/**
 * Enumeración de valores predefinidos.
 */
class EnumTipoTurno
{
    const PRIMER_TURNO = 1;
    const SEGUNDO_TURNO = 2;
    const TERCER_TURNO = 3;

    private static $descriptions = [
        ['id' => self::PRIMER_TURNO, 'code' => 'PRIMER_TURNO', 'description' => "Turno 1"],
        ['id' => self::SEGUNDO_TURNO, 'code' => 'SEGUNDO_TURNO', 'description' => "Turno 2"],
        ['id' => self::TERCER_TURNO, 'code' => 'TERCER_TURNO', 'description' => "Turno 3"]
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
