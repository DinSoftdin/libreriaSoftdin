<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;


/**
 * Enumeración de valores predefinidos.
 */
class EnumEstadoCalendario
{
    const NORMAL = 1;
    const FERIADO = 2;

    private static $descriptions = [
        ['id' => self::NORMAL, 'code' => 'NORMAL', 'description' => 'Normal', 'descriptionIngles' => 'Normal'],
        ['id' => self::FERIADO, 'code' => 'FERIADO', 'description' => 'Feriado', 'descriptionIngles' => 'Holiday'],
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

    private static $colorMapping = [
        'primary' => self::NORMAL,
        'danger' => self::FERIADO, // Default color for unknown states
    ];

    /**
     * Retorna el mapeo de colores por campo (description, descriptionIngles, etc.).
     *
     * @param string $campo Nombre del campo a mapear.
     * @return array Arreglo asociativo color => valor del campo.
     */
    public static function getColors($campo): array
    {
        $colorArray = [];

        foreach (self::$colorMapping as $color => $description) {
            $descriptionEntry = array_filter(self::$descriptions, fn($item) => $item['id'] === $description);
            if (!empty($descriptionEntry)) {
                $colorArray[$color] = array_shift($descriptionEntry)[$campo];
            } else {
                $colorArray[$color] = null; // Manejar el caso en que el campo no exista
            }
        }
        return $colorArray;
    }

    /**
     * Busca el nombre del color asociado a un valor de campo.
     *
     * @param string $campo Nombre del campo.
     * @param mixed  $valor Valor a buscar.
     * @return string|false Nombre del color o false si no se encuentra.
     */
    public static function getColorName($campo, $valor)
    {
        $colors = self::getColors($campo);
        return array_search($valor, $colors);
    }



}
