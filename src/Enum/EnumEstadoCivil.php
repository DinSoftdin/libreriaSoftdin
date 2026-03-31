<?php

namespace softdin\servicio\Enum;

/**
 * Enumeración de estados civiles.
 */
enum EnumEstadoCivil: int
{
    case NO_DEFINIDO = 0;
    case SOLTERO = 1;
    case CASADO = 2;
    case DIVORCIADO = 3;
    case SEPARADO = 4;
    case VIUDO = 5;
    case UNION_LIBRE = 6;

    public function description(): string
    {
        return match($this) {
            self::NO_DEFINIDO => 'NO Definido',
            self::SOLTERO => 'Soltero(A)',
            self::CASADO => 'Casado(A)',
            self::DIVORCIADO => 'Divorciado(A)',
            self::SEPARADO => 'Separado(A)',
            self::VIUDO => 'Viudo(A)',
            self::UNION_LIBRE => 'Union Libre',
        };
    }

    public function descriptionIngles(): string
    {
        return match($this) {
            self::NO_DEFINIDO => 'Not Defined',
            self::SOLTERO => 'Single',
            self::CASADO => 'Married',
            self::DIVORCIADO => 'Divorced',
            self::SEPARADO => 'Separated',
            self::VIUDO => 'Widowed',
            self::UNION_LIBRE => 'Common-law',
        };
    }

    public function color(): string
    {
        return match($this) {
            self::SOLTERO => 'primary',
            self::CASADO => 'warning',
            self::DIVORCIADO => 'success',
            self::SEPARADO => 'indigo',
            self::VIUDO => 'fuchsia',
            self::UNION_LIBRE => 'emerald',
            self::NO_DEFINIDO => 'danger',
        };
    }

    public static function getAll(): array
    {
        return array_map(fn($case) => [
            'id' => $case->value,
            'code' => $case->name,
            'description' => $case->description(),
            'descriptionIngles' => $case->descriptionIngles(),
            'color' => $case->color(),
        ], self::cases());
    }
}
