<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumEstadoCalendario
{
    const NORMAL = 1;
    const FERIADO = 2;

    private static $descriptions = [
        ['id' => self::NORMAL, 'code' => 'NORMAL', 'description' => 'Normal', 'descriptionIngles' => 'Normal'],
        ['id' => self::FERIADO, 'code' => 'FERIADO', 'description' => 'Feriado', 'descriptionIngles' => 'Holiday'],
    ];

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

    private static $colorMapping = [
        'primary' => self::NORMAL,
        'danger' => self::FERIADO, // Default color for unknown states
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

    public static function getColorName($campo, $valor)
    {
        $colors = self::getColors($campo);
        return array_search($valor, $colors);
    }



}
