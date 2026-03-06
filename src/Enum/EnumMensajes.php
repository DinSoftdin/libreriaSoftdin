<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;


/**
 * Enumeración de valores predefinidos.
 */
class EnumMensajes
{
    const Ingresos = 1;
    const Terminos = 2;
    const Vacaciones = 3;
    const PeriodoPrueba = 4;
    const FinalizacionContrato = 5;
    const VencimientoEstudios = 6;

    private static $descriptions = [
        ['id' => self::Ingresos, 'code' => 'Ingresos', 'description' => 'Ingresos'],
        ['id' => self::Terminos, 'code' => 'Terminos', 'description' => 'Terminos'],
        ['id' => self::Vacaciones, 'code' => 'Vacaciones', 'description' => 'Vacaciones'],
        ['id' => self::PeriodoPrueba, 'code' => 'PeriodoPrueba', 'description' => 'Periodo de Prueba'],
        ['id' => self::FinalizacionContrato, 'code' => 'FinalizacionContrato', 'description' => 'Finalizacion de Contrato'],
        ['id' => self::VencimientoEstudios, 'code' => 'VencimientoEstudios', 'description' => 'Vencimiento de Estudios'],
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
