<?php

namespace softdin\servicio\Enum;

/**
 * Enumeración de tipos de pago.
 */
enum EnumTipoPago: int
{
    case COMERCIAL = 1;
    case CALENDARIO = 2;

    public function description(): string
    {
        return match($this) {
            self::COMERCIAL => 'Comercial',
            self::CALENDARIO => 'Calendario',
        };
    }

    public static function getAll(): array
    {
        return array_map(fn($case) => [
            'id' => $case->value,
            'code' => $case->name,
            'description' => $case->description()
        ], self::cases());
    }
}
