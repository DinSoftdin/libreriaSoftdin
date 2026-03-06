<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;



/**
 * Enumeración de valores predefinidos.
 */
class EnumTipoIdentificacion
{
    const CC = 1;
    const TI = 2;
    const RC = 3;
    const CE = 4;
    const PA = 5;
    const NI = 6;
    const CD = 7;
    const SC = 8;
    const NIO = 9;

    private static $descriptions = [
        ['id' => self::CC, 'code' => 'CC', 'description' => "Cedula de Ciudadania"],
        ['id' => self::TI, 'code' => 'TI', 'description' => "Tarjeta de Identidad"],
        ['id' => self::RC, 'code' => 'RC', 'description' => "Registro Civil"],
        ['id' => self::CE, 'code' => 'CE', 'description' => "Cedula de Extranjería"],
        ['id' => self::PA, 'code' => 'PA', 'description' => "Pasaporte"],
        ['id' => self::NI, 'code' => 'NI', 'description' => "Numero de Identificación Tributaria NIT"],
        ['id' => self::CD, 'code' => 'CD', 'description' => "Carnet Diplomático"],
        ['id' => self::SC, 'code' => 'SC', 'description' => "Salvoconducto de permanencia"],
        ['id' => self::NIO, 'code' => 'NIO', 'description' => "Numero de Identificación Tributaria NIT Entidad Oficial"]
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
