<?php

namespace softdin\servicio\Enum;

/**
 * Clases de riesgo de la actividad económica (ARL / Decreto 1072 de 2015).
 * Tarifas de cotización sobre el IBC.
 */
enum EnumClaseRiesgoActividad: int
{
    case CLASE_I = 1;
    case CLASE_II = 2;
    case CLASE_III = 3;
    case CLASE_IV = 4;
    case CLASE_V = 5;

    public function description(): string
    {
        return match ($this) {
            self::CLASE_I => 'Clase I - Riesgo mínimo',
            self::CLASE_II => 'Clase II - Riesgo bajo',
            self::CLASE_III => 'Clase III - Riesgo medio',
            self::CLASE_IV => 'Clase IV - Riesgo alto',
            self::CLASE_V => 'Clase V - Riesgo máximo',
        };
    }

    /**
     * Porcentaje de cotización ARL sobre el IBC.
     */
    public function porcentaje(): float
    {
        return match ($this) {
            self::CLASE_I => 0.522,
            self::CLASE_II => 1.044,
            self::CLASE_III => 2.436,
            self::CLASE_IV => 4.350,
            self::CLASE_V => 6.960,
        };
    }

    public static function getAll(): array
    {
        return array_map(fn (self $case) => [
            'id' => $case->value,
            'code' => $case->name,
            'description' => $case->description(),
            'porcentaje' => $case->porcentaje(),
        ], self::cases());
    }

    public static function getById(int $id): ?array
    {
        $case = self::tryFrom($id);

        return $case === null ? null : [
            'id' => $case->value,
            'code' => $case->name,
            'description' => $case->description(),
            'porcentaje' => $case->porcentaje(),
        ];
    }

    public static function getByPorcentaje(float $porcentaje): ?array
    {
        foreach (self::cases() as $case) {
            if (abs($case->porcentaje() - $porcentaje) < 0.0001) {
                return self::getById($case->value);
            }
        }

        return null;
    }

    public static function getByDescription(string $description): ?array
    {
        foreach (self::getAll() as $item) {
            if ($item['description'] === $description) {
                return $item;
            }
        }

        return null;
    }
}
