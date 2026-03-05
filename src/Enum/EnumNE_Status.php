<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


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


    public static function getCollection()
    {
        return collect(self::$descriptions);
    }

    public static function getById($id)
    {
        return self::getCollection()->firstWhere('id', $id) ?? null;
    }

    public static function getAll()
    {
        return self::$descriptions;
    }

    public static function getByDescription($description)
    {
        return self::getCollection()->firstWhere('description', $description) ?? null;
    }

    public static function getColorName($campo, $valor)
    {
        $colors = self::getColors($campo);
        return array_search($valor, $colors);
    }

}
