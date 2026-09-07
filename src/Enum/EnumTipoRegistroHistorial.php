<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;



/**
 * Enumeración de valores predefinidos.
 */
class EnumTipoRegistroHistorial
{
    const CONTRATACION = 1;
    const PRORROGA = 2;
    const TERMINO = 3;
    const NOVEDADPILA = 4;

    /**
     * Conversion de tipo de contrato: desde esta fecha el contrato cambia de
     * naturaleza juridica.
     *
     * Existe porque una conversion **no es una prorroga**. Una prorroga extiende
     * un plazo, y el caso que la motiva es el paso de termino fijo a indefinido,
     * que precisamente deja de tener plazo: el movimiento queda con
     * `fechatermino` nula. Registrarla como prorroga habria hecho imposible
     * distinguir en el historial un contrato renovado de uno convertido.
     *
     * El tramo anterior se cierra el dia antes, y su `fechahistorial` conserva
     * la fecha que estaba pactada — asi la conversion anticipada no borra el
     * rastro de hasta cuando iba el contrato original.
     */
    const CONVERSION = 5;

    private static $descriptions = [
        ['id' => self::CONTRATACION, 'code' => 'CONTRATACION', 'description' => "Contratación"],
        ['id' => self::PRORROGA, 'code' => 'PRORROGA', 'description' => "Prorroga"],
        ['id' => self::TERMINO, 'code' => 'TERMINO', 'description' => "Termino"],
        ['id' => self::NOVEDADPILA, 'code' => 'NOVEDADPILA', 'description' => "Novedades de PILA"],
        ['id' => self::CONVERSION, 'code' => 'CONVERSION', 'description' => "Conversion de tipo"]
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
