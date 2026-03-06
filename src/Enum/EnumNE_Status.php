<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;



/**
 * Enumeración de valores predefinidos.
 */
class EnumNE_Status
{
    public const Validas = 1;
    public const Pendientes = 2;
    public const Erroneas = 3;
    public const Rechazadas = 4;
    public const Aceptadas = 5;

    private static $descriptions = [
        ['id' => self::Validas, 'code' => 'VAL', 'description' => 'Válidas', 'descriptionIngles' => 'Valid'],
        ['id' => self::Pendientes, 'code' => 'PEN', 'description' => 'Pendientes', 'descriptionIngles' => 'Pending'],
        ['id' => self::Erroneas, 'code' => 'ERR', 'description' => 'Erróneas', 'descriptionIngles' => 'Erroneous'],
        ['id' => self::Rechazadas, 'code' => 'REC', 'description' => 'Rechazadas', 'descriptionIngles' => 'Rejected'],
        ['id' => self::Aceptadas, 'code' => 'ACE', 'description' => 'Aceptadas', 'descriptionIngles' => 'Accepted'],
    ];

    private static $colorMapping = [
        'primary' => self::Validas,
        'warning' => self::Pendientes,
        'success' => self::Aceptadas,
        'danger' => self::Rechazadas,
        'lime' => self::Erroneas, // Default color for unknown states
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
