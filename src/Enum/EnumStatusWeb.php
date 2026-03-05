<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumStatusWeb
{
    public const INICIO = 1;
    public const PROCESO = 2;
    public const APROBADO = 3;
    public const ANULADO = 4;

    private static $descriptions = [
        ['id' => self::INICIO, 'code' => 'INICIO', 'description' => 'Inicio', 'descriptionIngles' => 'Star'],
        ['id' => self::PROCESO, 'code' => 'PROCESO', 'description' => 'Proceso', 'descriptionIngles' => 'Process'],
        ['id' => self::APROBADO, 'code' => 'APROBADO', 'description' => 'Aprobado', 'descriptionIngles' => 'Approved'],
        ['id' => self::ANULADO, 'code' => 'ANULADO', 'description' => 'Anulado', 'descriptionIngles' => 'Annulled'],
    ];


    public static function getCollection()
    {
        return collect(self::$descriptions);
    }

    public static function getById($id)
    {
        return self::getCollection()->firstWhere('id', $id) ?? null;
    }

    private static $colorMapping = [
        'primary' => self::INICIO,
        'warning' => self::PROCESO,
        'success' => self::APROBADO,
        'danger' => self::ANULADO, // Default color for unknown states
    ];

    public static function getColors($campo):array
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
