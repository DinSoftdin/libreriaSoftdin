<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;


/**
 * Enumeración de valores predefinidos.
 */
class EnumTipoNovedadSeguridadSocial
{
    public const I = 1;
    public const R = 2;
    public const N = 3;
    public const NOR = 4;
    public const SLN = 5;
    public const IGE = 6;
    public const LMA = 7;
    public const VAC = 8;
    public const IRL = 9;
    public const LRM = 10;

    private static $descriptions = [
        ['id' => self::I, 'code' => 'I', 'description' => 'I'],
        ['id' => self::R, 'code' => 'R', 'description' => 'R'],
        ['id' => self::N, 'code' => 'N', 'description' => 'N'],
        ['id' => self::NOR, 'code' => 'NOR', 'description' => 'NOR'],
        ['id' => self::SLN, 'code' => 'SLN', 'description' => 'SLN'],
        ['id' => self::IGE, 'code' => 'IGE', 'description' => 'IGE'],
        ['id' => self::LMA, 'code' => 'LMA', 'description' => 'LMA'],
        ['id' => self::VAC, 'code' => 'VAC', 'description' => 'VAC'],
        ['id' => self::IRL, 'code' => 'IRL', 'description' => 'IRL'],
        ['id' => self::LRM, 'code' => 'LRM', 'description' => 'LRM'],
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
