<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;

/**
 * Enumeración de estados civiles.
 *
 * Clase con constantes y no `enum`, como el resto del directorio y como su
 * espejo en `softdinlibreriajs`. `EnumEstadoCivil::CASADO` es el entero 2 y se
 * guarda tal cual en la columna.
 *
 * Cada elemento lleva **cinco** campos y no tres: además de `description`, la
 * traducción al inglés y el color con el que se pinta la etiqueta en pantalla.
 * Los tres venían de métodos de instancia (`description()`,
 * `descriptionIngles()`, `color()`) y aquí viven en la misma fila, que es como
 * lo hace el resto de la librería: quien pinta un selector recibe todo de una
 * sola llamada.
 */
class EnumEstadoCivil
{
    const NO_DEFINIDO = 0;
    const SOLTERO = 1;
    const CASADO = 2;
    const DIVORCIADO = 3;
    const SEPARADO = 4;
    const VIUDO = 5;
    const UNION_LIBRE = 6;

    private static $descriptions = [
        ['id' => self::NO_DEFINIDO, 'code' => 'NO_DEFINIDO', 'description' => "NO Definido", 'descriptionIngles' => "Not Defined", 'color' => 'danger'],
        ['id' => self::SOLTERO, 'code' => 'SOLTERO', 'description' => "Soltero(A)", 'descriptionIngles' => "Single", 'color' => 'primary'],
        ['id' => self::CASADO, 'code' => 'CASADO', 'description' => "Casado(A)", 'descriptionIngles' => "Married", 'color' => 'warning'],
        ['id' => self::DIVORCIADO, 'code' => 'DIVORCIADO', 'description' => "Divorciado(A)", 'descriptionIngles' => "Divorced", 'color' => 'success'],
        ['id' => self::SEPARADO, 'code' => 'SEPARADO', 'description' => "Separado(A)", 'descriptionIngles' => "Separated", 'color' => 'indigo'],
        ['id' => self::VIUDO, 'code' => 'VIUDO', 'description' => "Viudo(A)", 'descriptionIngles' => "Widowed", 'color' => 'fuchsia'],
        ['id' => self::UNION_LIBRE, 'code' => 'UNION_LIBRE', 'description' => "Union Libre", 'descriptionIngles' => "Common-law", 'color' => 'emerald'],
    ];

    /**
     * Retorna la colección de elementos del Enum.
     *
     * @return \Illuminate\Support\Collection Colección con id, code, description, descriptionIngles y color.
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
}
