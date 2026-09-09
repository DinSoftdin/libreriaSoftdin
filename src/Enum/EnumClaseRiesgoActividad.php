<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;

/**
 * Clases de riesgo de la actividad económica (ARL / Decreto 1072 de 2015).
 * Tarifas de cotización sobre el IBC.
 *
 * Clase con constantes y no `enum`, como el resto del directorio y como su
 * espejo en `softdinlibreriajs`. `EnumClaseRiesgoActividad::CLASE_I` es el
 * entero 1.
 *
 * Cada elemento lleva `porcentaje` además de la descripción, porque es el dato
 * por el que se consulta: quien registra un contrato elige la clase y lo que
 * necesita es la tarifa. `getByPorcentaje()` hace el camino inverso —de la
 * tarifa a la clase— y existe para los contratos que ya tienen el porcentaje
 * guardado y no la clase.
 */
class EnumClaseRiesgoActividad
{
    const CLASE_I = 1;
    const CLASE_II = 2;
    const CLASE_III = 3;
    const CLASE_IV = 4;
    const CLASE_V = 5;

    private static $descriptions = [
        ['id' => self::CLASE_I, 'code' => 'CLASE_I', 'description' => "Clase I - Riesgo mínimo", 'porcentaje' => 0.522],
        ['id' => self::CLASE_II, 'code' => 'CLASE_II', 'description' => "Clase II - Riesgo bajo", 'porcentaje' => 1.044],
        ['id' => self::CLASE_III, 'code' => 'CLASE_III', 'description' => "Clase III - Riesgo medio", 'porcentaje' => 2.436],
        ['id' => self::CLASE_IV, 'code' => 'CLASE_IV', 'description' => "Clase IV - Riesgo alto", 'porcentaje' => 4.350],
        ['id' => self::CLASE_V, 'code' => 'CLASE_V', 'description' => "Clase V - Riesgo máximo", 'porcentaje' => 6.960],
    ];

    /**
     * Retorna la colección de elementos del Enum.
     *
     * @return \Illuminate\Support\Collection Colección con id, code, description y porcentaje.
     */
    public static function getCollection()
    {
        return collect(self::$descriptions);
    }

    /**
     * Busca un elemento por su ID.
     *
     * @param  mixed  $id  Identificador del elemento.
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
     * @param  string  $description  Descripción del elemento.
     * @return array|null Elemento encontrado o null.
     */
    public static function getByDescription($description)
    {
        return self::getCollection()->firstWhere('description', $description) ?? null;
    }

    /**
     * Busca la clase por su tarifa.
     *
     * Compara con tolerancia y no con `===`: las tarifas son decimales y un
     * `4.35` leído de la base de datos no siempre es idéntico bit a bit al
     * `4.350` de aquí.
     *
     * @param  float  $porcentaje  Tarifa de cotización sobre el IBC.
     * @return array|null Elemento encontrado o null.
     */
    public static function getByPorcentaje($porcentaje)
    {
        foreach (self::$descriptions as $item) {
            if (abs($item['porcentaje'] - (float) $porcentaje) < 0.0001) {
                return $item;
            }
        }

        return null;
    }

    /**
     * Tarifa de cotización de una clase, o null si la clase no existe.
     *
     * @param  mixed  $id  Identificador de la clase.
     */
    public static function getPorcentaje($id): ?float
    {
        $item = self::getById($id);

        return $item === null ? null : (float) $item['porcentaje'];
    }
}
