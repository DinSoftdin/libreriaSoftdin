<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;

/**
 * Enumeración de sexos.
 *
 * Clase con constantes y no `enum`, como los otros 83 archivos de este
 * directorio y como su espejo en `softdinlibreriajs`. Los ids son los del
 * catálogo, así que `EnumSexo::M` es el entero 1 y se puede guardar en la
 * columna directamente.
 *
 * Hubo un paso intermedio en el que quedó declarado `enum` con `const` en vez
 * de `case`, y conviene saber por qué no servía: un enum sin casos hace que
 * `cases()` devuelva vacío, así que `getAll()` devolvía **una lista vacía sin
 * error** —lo peor, porque un selector se queda en blanco y nadie sabe por qué—
 * y `description()`, que era un método de instancia, quedaba inalcanzable
 * porque ya no podía existir ninguna instancia.
 */
class EnumSexo
{
    const M = 1;
    const F = 2;
    const ND = 3;
    const NDR = 4;

    private static $descriptions = [
        ['id' => self::M, 'code' => 'M', 'description' => "Masculino"],
        ['id' => self::F, 'code' => 'F', 'description' => "Femenino"],
        ['id' => self::ND, 'code' => 'ND', 'description' => "No definido"],
        ['id' => self::NDR, 'code' => 'NDR', 'description' => "No deseo responder"],
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
