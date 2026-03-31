<?php

namespace softdin\servicio\Enum;

/**
 * Enumeración de sexos.
 */
enum EnumSexo: int
{
    case M = 1;
    case F = 2;
    case ND = 3;
    case NDR = 4;

    public function description(): string
    {
        return match($this) {
            self::M => 'Masculino',
            self::F => 'Femenino',
            self::ND => 'No definido',
            self::NDR => 'No deseo responder',
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
