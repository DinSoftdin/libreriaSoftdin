<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;


/**
 * Enumeración de valores predefinidos.
 */
class EnumTipoIdentificacionEmbargo
{
    const CC = EnumTipoIdentificacion::CC;
    const CE = EnumTipoIdentificacion::CE;
    const NIT_P = EnumTipoIdentificacion::NI;
    const PA = EnumTipoIdentificacion::PA;
    const TI = EnumTipoIdentificacion::TI;
    const NIT_O = EnumTipoIdentificacion::NIO;

    private static $descriptions = [
        ['id' => self::CC, 'code' => 'CC', 'description' => "Cedula de Ciudadanía"],
        ['id' => self::CE, 'code' => 'CE', 'description' => "Cedula de Extranjería"],
        ['id' => self::NIT_P, 'code' => 'NIT_P', 'description' => "NIT Entidad Privada"],
        ['id' => self::PA, 'code' => 'PA', 'description' => "Pasaporte"],
        ['id' => self::TI, 'code' => 'TI', 'description' => "Tarjeta de Identificación"],
        ['id' => self::NIT_O, 'code' => 'NIT_O', 'description' => "NIT Entidad Oficial"]
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
