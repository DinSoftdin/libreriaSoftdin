<?php

namespace softdin\servicio\Enum;

/**
 * Enumeración de tipos de token para expresiones.
 */
enum TipoToken: int
{
    case NULO = 0;
    case DELIMITADOR = 1;
    case IDENTIFICADOR = 2;
    case NUMERO = 3;
}
