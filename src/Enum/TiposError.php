<?php

namespace softdin\servicio\Enum;

/**
 * Enumeración de tipos de error para expresiones.
 */
enum TiposError: int
{
    case NO_DEFINIDO = 0;
    case SINTAXIS = 1;
    case IDENTIFICADOR = 2;
    case PARENTESIS = 3;
    case DIVISION_POR_CERO = 4;
    case SIN_EXPRESION = 5;

    public function description(): string
    {
        return match($this) {
            self::NO_DEFINIDO => 'Error no definido',
            self::SINTAXIS => 'Error de sintaxis',
            self::IDENTIFICADOR => 'Error de identificador',
            self::PARENTESIS => 'Error de paréntesis',
            self::DIVISION_POR_CERO => 'Error de división por cero',
            self::SIN_EXPRESION => 'Error de expresión vacía',
        };
    }
}
