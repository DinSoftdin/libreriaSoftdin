<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;


/**
 * Enumeración de valores predefinidos.
 */
class EnumModalidadEjecucionNomina
{
    public const INGRESO = 1;
    public const DEDUCCION = 2;
    public const PROV_SEG = 3;
    public const PROV_PRF = 4;
    public const PROV_ARL = 5;
    public const PROV_PRS = 6;
    public const VACACIONES = 7;

    private static $descriptions = [
        ['id' => self::INGRESO, 'code' => 'INGRESO', 'description' => 'Ingreso'],
        ['id' => self::DEDUCCION, 'code' => 'DEDUCCION', 'description' => 'Deducción'],
        ['id' => self::PROV_SEG, 'code' => 'PROV_SEG', 'description' => 'Provisión Seguridad Social'],
        ['id' => self::PROV_PRF, 'code' => 'PROV_PRF', 'description' => 'Provisión Parafiscales'],
        ['id' => self::PROV_ARL, 'code' => 'PROV_ARL', 'description' => 'Provisión Riesgos Laborales'],
        ['id' => self::PROV_PRS, 'code' => 'PROV_PRS', 'description' => 'Provisión Prestaciones Sociales'],
        ['id' => self::VACACIONES, 'code' => 'VACACIONES', 'description' => 'Vacaciones'],
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
