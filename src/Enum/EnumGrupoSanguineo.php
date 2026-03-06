<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;



/**
 * Enumeración de valores predefinidos.
 */
class EnumGrupoSanguineo
{
    public const Amas = 1;
    public const Amenos = 2;
    public const ABmas = 3;
    public const ABmenos = 4;
    public const Bmas = 5;
    public const Bmenos = 6;
    public const Omas = 7;
    public const Omenos = 8;
    public const noDefinido = 0;

    private static $descriptions = [
        ['id' => self::Amas, 'code' => 'Amas', 'description' => 'A+'],
        ['id' => self::Amenos, 'code' => 'Amenos', 'description' => 'A-'],
        ['id' => self::ABmas, 'code' => 'ABmas', 'description' => 'AB+'],
        ['id' => self::ABmenos, 'code' => 'ABmenos', 'description' => 'AB-'],
        ['id' => self::Bmas, 'code' => 'Bmas', 'description' => 'B+'],
        ['id' => self::Bmenos, 'code' => 'Bmenos', 'description' => 'B-'],
        ['id' => self::Omas, 'code' => 'Omas', 'description' => 'O+'],
        ['id' => self::Omenos, 'code' => 'Omenos', 'description' => 'O-'],
        ['id' => self::noDefinido, 'code' => 'noDefinido', 'description' => 'NO DEFINIDO'],
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

