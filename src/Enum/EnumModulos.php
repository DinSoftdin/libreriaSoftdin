<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;


/**
 * Enumeración de valores predefinidos.
 */
class EnumModulos
{
    public const CONTRATACION = 1;
    public const LIQ_NOMINA = 2;
    public const LIQ_VACACIONES = 3;
    public const LIQ_PRESTSOCIALES = 4;
    public const LIQ_CONTRATO = 5;
    public const PRESTAMO = 6;

    private static $descriptions = [
        ['id' => self::CONTRATACION, 'code' => 'CONTRATACION', 'description' => 'Contratacion'],
        ['id' => self::LIQ_NOMINA, 'code' => 'LIQ_NOMINA', 'description' => 'Liquidación de Nómina'],
        ['id' => self::LIQ_VACACIONES, 'code' => 'LIQ_VACACIONES', 'description' => 'Liquidación de Vacaciones'],
        ['id' => self::LIQ_PRESTSOCIALES, 'code' => 'LIQ_PRESTSOCIALES', 'description' => 'Liquidación de Prestaciones Sociales'],
        ['id' => self::LIQ_CONTRATO, 'code' => 'LIQ_CONTRATO', 'description' => 'Liquidación de Contrato'],
        ['id' => self::PRESTAMO, 'code' => 'PRESTAMO', 'description' => 'Préstamo'],
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
