<?php

declare(strict_types=1);

namespace softdin\servicio;

use Carbon\Carbon;
use DateTime;
use softdin\servicio\Enum\EnumTipoPago;

/**
 * Clase de utilidades con métodos estáticos para operaciones matemáticas,
 * manejo de cadenas, fechas, validaciones y formateo de datos.
 */
final readonly class Libreria
{
    /**
     * Retorna el mensaje de bienvenida de la empresa.
     */
    public static function myEmpresa(): string
    {
        return 'Bienvenidos a Softdin';
    }

    /**
     * Verifica si la cadena contiene al menos uno de los caracteres del arreglo.
     *
     * @param string $cadena Cadena a buscar.
     * @param array<string> $arreglo Arreglo de caracteres o subcadenas a verificar.
     */
    public static function existeCaracter(string $cadena, array $arreglo): bool
    {
        foreach ($arreglo as $cad) {
            if (str_contains($cadena, $cad)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Verifica que los paréntesis en la cadena estén correctamente balanceados.
     */
    public static function verificarParentesis(string $cadena): bool
    {
        $parentesis = "";
        $num = 0;

        for ($i = 0; $i < strlen($cadena); $i++) {
            $letra = $cadena[$i];
            if ($letra === "(" || $letra === ")") {
                if ($letra === "(") {
                    $num++;
                    $parentesis .= "(";
                }
                if ($letra === ")") {
                    if ($num === 0) {
                        return false;
                    }
                    if (str_ends_with($parentesis, "(")) {
                        $num--;
                        $parentesis = substr($parentesis, 0, -1);
                    } else {
                        return false;
                    }
                }
            }
        }

        return $num === 0;
    }

    /**
     * Verifica que los corchetes en la cadena estén correctamente balanceados.
     */
    public static function verificarCorchete(string $cadena): bool
    {
        $corchete = "";
        $num = 0;

        for ($i = 0; $i < strlen($cadena); $i++) {
            $letra = $cadena[$i];
            if ($letra === "[" || $letra === "]") {
                if ($letra === "[") {
                    $num++;
                    $corchete .= "[";
                }
                if ($letra === "]") {
                    if ($num === 0) {
                        return false;
                    }
                    if (str_ends_with($corchete, "[")) {
                        $num--;
                        $corchete = substr($corchete, 0, -1);
                    } else {
                        return false;
                    }
                }
            }
        }

        return $num === 0;
    }

    /**
     * Verifica si el valor es un número entero.
     */
    public static function esNumeroEntero(mixed $numero): bool
    {
        if (!is_numeric($numero)) {
            return false;
        }
        return (int)$numero == $numero;
    }

    /**
     * Redondea el número al entero más próximo, redondeando hacia arriba si hay decimales.
     */
    public static function redondearAlProximoNumero(float|int $num): int
    {
        $trun = (int) round((float) $num, 0, PHP_ROUND_HALF_UP);

        if ($num - $trun > 0.0) {
            return ++$trun;
        }

        return $trun;
    }

    /**
     * Verifica si el carácter es un operador (+, -, *, /, %, ^, =, paréntesis o corchetes).
     */
    public static function esUnOperador(string $operador): bool
    {
        $delimitadores = "+-*/%^=()[]";
        return str_contains($delimitadores, $operador);
    }

    /**
     * Verifica si el carácter es un operador matemático básico (+, -, *, /).
     */
    public static function esUnOperadorMatematico(string $operador): bool
    {
        $delimitadores = "+-*/";
        return str_contains($delimitadores, $operador);
    }

    /**
     * Verifica si el número es par.
     */
    public static function esPar(int $n): bool
    {
        return ($n % 2) === 0;
    }

    /**
     * Verifica si dos operadores pueden estar adyacentes en una expresión.
     */
    public static function esUnOperador2(string $opr1, string $opr2): string
    {
        $operadores = [
            "(" => ["(", "+", "-", "*", "/", "[", "NU", "CN"],
            ")" => [")", "+", "-", "*", "/", "]", "NU", "CN"],
            "+" => ["(", "+", "NU", "CN"],
            "-" => ["(", "-", "NU", "CN"],
            "*" => ["(", "*", "NU", "CN"],
            "/" => ["(", "/", "NU", "CN"],
            "[" => ["[", "[", "NU", "CN"],
            "]" => ["]", "]", "NU", "CN"],
            "NU" => ["+", "-", "*", "/", ")", "NU", ","],
            "CN" => ["+", "-", "*", "/", ")", "CN"],
            "," => ["NU", ","]
        ];

        if (isset($operadores[$opr1]) && in_array($opr2, $operadores[$opr1], true)) {
            return "true";
        }

        return "";
    }

    /**
     * Elimina espacios múltiples consecutivos de la cadena.
     */
    public static function limpiarCadena(?string $cadena): ?string
    {
        if ($cadena === null) {
            return null;
        }
        return preg_replace('/\s+/', ' ', trim($cadena));
    }

    /**
     * Recorre la fecha según el período de cuota y número de cuotas.
     */
    public static function recorreFecha(Carbon $fecha, string $periodocuota, int $numerocuotas): Carbon
    {
        $fechaRecorrida = Carbon::today();

        if ($periodocuota === 'MENSUAL') {
            $fechaRecorrida = $fecha->addMonths($numerocuotas - 1)->endOfMonth();
        }

        if ($periodocuota === 'QUINCENAL') {
            $dias = abs(($numerocuotas - 1) * 15);
            $fecha = $fecha->addDays($dias + 5);

            if ($fecha->day >= 15) {
                $fechaRecorrida = $fecha->endOfMonth();
            } else {
                $fechaRecorrida = $fecha->endOfMonth()->startOfMonth();
            }
        }

        return $fechaRecorrida;
    }

    /**
     * Obtiene el primer día del mes de la fecha dada.
     */
    public static function inicioMes(mixed $fecha): Carbon
    {
        return Carbon::parse($fecha)->firstOfMonth();
    }

    /**
     * Obtiene el último día del mes de la fecha dada.
     */
    public static function finMes(mixed $fecha): Carbon
    {
        return Carbon::parse($fecha)->endOfMonth();
    }

    /**
     * Obtiene la fecha del fin de la primera quincena (día 15 del mes).
     */
    public static function finPrimeraQuincena(DateTime $fecha): DateTime
    {
        return DateTime::createFromFormat('d/m/Y', '15/' . $fecha->format('m/Y'));
    }

    /**
     * Calcula la fecha de inicio del análisis según los rangos de corte y movimiento.
     */
    public static function fechaInicioAnalisis(DateTime $fechaingresoCorte, DateTime $fechaterminoCorte, DateTime $fechaingresoMV, DateTime $fechaterminoMV): DateTime
    {
        if ($fechaterminoMV >= $fechaingresoCorte && $fechaingresoMV <= $fechaterminoCorte) {
            if ($fechaingresoMV >= $fechaingresoCorte) {
                return $fechaingresoMV;
            } else {
                return $fechaingresoCorte;
            }
        }
        return $fechaingresoMV;
    }

    /**
     * Calcula la fecha de término del análisis según los rangos de corte y movimiento.
     */
    public static function fechaTerminoAnalisis(DateTime $fechaingresoCorte, DateTime $fechaterminoCorte, DateTime $fechaingresoMV, DateTime $fechaterminoMV): DateTime
    {
        if ($fechaterminoMV >= $fechaingresoCorte && $fechaingresoMV <= $fechaterminoCorte) {
            return $fechaterminoMV < $fechaterminoCorte ? $fechaterminoMV : $fechaterminoCorte;
        }
        return $fechaterminoMV;
    }

    /**
     * Obtiene el número de días del mes de la fecha dada.
     */
    public static function diasEnMes(string|DateTime $fecha): string
    {
        $dt = $fecha instanceof DateTime ? $fecha : new DateTime($fecha);
        return $dt->format('t');
    }

    /**
     * Calcula el total de días entre dos fechas (inclusive).
     */
    public static function totalDias(DateTime $fechaini, DateTime $fechafin): int
    {
        return (int) $fechafin->diff($fechaini)->format('%a') + 1;
    }

    /**
     * Calcula los días contables entre dos fechas según reglas contables.
     */
    public static function completarDiasContable(DateTime $fechaini, DateTime $fechafin): int
    {
        $diatotal = 0;
        $current = clone $fechaini;
        while ($current <= $fechafin) {
            $fechaFinMes = self::finMes($current);
            if ($current <= $fechaFinMes && $fechafin >= $fechaFinMes) {
                $diatotal += self::totalDias($current, $fechafin);
                if ($fechaFinMes->format('d') === '31') {
                    $diatotal -= 1;
                } else {
                    $d = (int)$fechaFinMes->format('d');
                    if ($d < 30) {
                        $diatotal += 30 - $d;
                    }
                }
            } elseif ($current <= $fechafin && $fechaFinMes > $fechafin) {
                $diatotal += self::totalDias($current, $fechafin);
            }
            $current->modify('+1 month');
        }
        return $diatotal;
    }

    /**
     * Calcula la edad en años a partir de la fecha de nacimiento.
     */
    public static function laEdad(DateTime $fechanacimiento): int
    {
        return (new DateTime())->diff($fechanacimiento)->y;
    }

    /**
     * Cuenta los días laborables entre fechas según el tipo de pago.
     */
    public static function contarDias(DateTime $fechaingresoCorte, DateTime $fechaterminoCorte, DateTime $fechaingresoMV, DateTime $fechaterminoMV, EnumTipoPago|int $tipopago): int
    {
        $dias = 0;
        if ($fechaterminoMV >= $fechaingresoCorte && $fechaingresoMV <= $fechaterminoCorte) {
            $fechainicio = $fechaingresoMV >= $fechaingresoCorte ? $fechaingresoMV : $fechaingresoCorte;
            $fechatermino = $fechaterminoMV < $fechaterminoCorte ? $fechaterminoMV : $fechaterminoCorte;

            $dias = self::totalDias($fechainicio, $fechatermino);
            
            $isComercial = $tipopago instanceof EnumTipoPago 
                ? $tipopago === EnumTipoPago::COMERCIAL 
                : $tipopago === EnumTipoPago::COMERCIAL->value;

            if ($isComercial) {
                $dias = self::completarDiasContable($fechainicio, $fechatermino);
            }
        }
        return (int)$dias;
    }

    /**
     * Calcula la fecha término sumando días a la fecha de ingreso según el tipo de pago.
     */
    public static function contarDiasTP(DateTime $fechaingresoMV, int $dias, EnumTipoPago|int $tipopago): DateTime
    {
        $current = clone $fechaingresoMV;
        $fechatermino = clone $fechaingresoMV;
        
        $isComercial = $tipopago instanceof EnumTipoPago 
            ? $tipopago === EnumTipoPago::COMERCIAL 
            : $tipopago === EnumTipoPago::COMERCIAL->value;

        while ($current <= $fechatermino->modify("+$dias days")) {
            if ($isComercial) {
                $dias += self::completarDiasContable($current, $current);
            }
            $current->modify("+1 day");
        }
        return $fechatermino->modify("-1 day");
    }

    /**
     * Reemplaza las comas por puntos en la cadena (formato numérico).
     */
    public static function cambiarComaPunto(string $cadena): string
    {
        return !empty($cadena) ? str_replace(",", ".", $cadena) : "0";
    }

    /**
     * Redondea el valor al múltiplo más cercano.
     */
    public static function multiplos(float|int $valor, float|int $multiplo): float|int
    {
        return round($valor / $multiplo) * $multiplo;
    }

    /**
     * Calcula múltiplos para PILA según si el salario es igual al SMLV.
     */
    public static function multiplosPilaSmlv(float|int $valor, float|int $multiplo, bool $salarioBasicoEsIgualAlSMLV): float|int
    {
        if ($salarioBasicoEsIgualAlSMLV) {
            return $valor;
        }
        
        $valorMul = $valor / $multiplo;
        $entero = floor($valorMul);
        return ($valorMul - $entero) > 0 ? ($entero + 1) * $multiplo : $entero * $multiplo;
    }

    /**
     * Calcula múltiplos PILA para novedades según salario, SMLV y días.
     */
    public static function multiplosPilaNovedad(float|int $valor, float|int $salario, float|int $SMLV, int $dias, int $noNovedades): float|int
    {
        $VSMLV = round(($SMLV / 30.0) * $dias);
        $VSalario = round(($salario / 30.0) * $dias);

        if ($VSalario <= $VSMLV || $noNovedades > 1) {
            if ($VSMLV > $valor) {
                return $VSMLV;
            }
            if ($valor > $VSalario) {
                return $valor;
            }
            $dif = $valor - $VSalario;
            return ($dif > 1 || $dif < -1) ? $valor : $VSalario;
        }

        $valor = round($valor);
        $Vdeci = $valor / 1000;
        $Vent = floor($Vdeci);
        $Vdeci = $Vdeci - $Vent;

        $valor = $Vdeci > 0 ? ($Vent + 1) * 1000 : $Vent * 1000;

        $dif = $valor - $VSalario;
        return ($dif > 1000 || $dif < -1) ? $valor : $VSalario;
    }

    /**
     * Redondea el valor hacia arriba al múltiplo más cercano (PILA).
     */
    public static function multiplosPila(float|int $valor, float|int $multiplo): float|int
    {
        $valorMul = (float) $valor / (float) $multiplo;
        $entero = floor($valorMul);
        return ($valorMul - $entero) > 0 ? ($entero + 1) * $multiplo : $entero * $multiplo;
    }

    /**
     * Busca la posición de la primera ocurrencia de una palabra en la cadena.
     */
    public static function buscandoPosicionPalabraCadena(string $cadena, string $palabra): int
    {
        $pos = strpos($cadena, $palabra);
        return $pos !== false ? $pos : -1;
    }

    /**
     * Busca la posición de la primera ocurrencia de un carácter en la cadena.
     */
    public static function buscandoPosicionCaracterCadena(string $cadena, string $caracter): int
    {
        $pos = strpos($cadena, $caracter);
        return $pos !== false ? $pos : -1;
    }

    /**
     * Busca la posición de la n-ésima ocurrencia de un carácter en la cadena.
     */
    public static function buscandoPosicionCaracterCadenaPosicion(string $cadena, string $caracter, int $posicion): int
    {
        $pos = -1;
        for ($i = 0; $i < $posicion; $i++) {
            $pos = strpos($cadena, $caracter, $pos + 1);
            if ($pos === false) {
                return -1;
            }
        }
        return $pos;
    }

    /**
     * Verifica si la palabra existe en la cadena.
     */
    public static function existePalabraCadena(string $cadena, string $palabra): bool
    {
        return str_contains($cadena, $palabra);
    }

    /**
     * Cuenta cuántas veces aparece un carácter en la cadena.
     */
    public static function cuantosCaracterCadena(string $cadena, string $caracter): int
    {
        return substr_count($cadena, $caracter);
    }

    /**
     * Elimina la primera ocurrencia de una palabra de la cadena.
     */
    public static function eliminarPalabraCadena(string $cadena, string $palabra): string
    {
        $pos = strpos($cadena, $palabra);
        if ($pos !== false) {
            return substr_replace($cadena, '', $pos, strlen($palabra));
        }
        return $cadena;
    }

    /**
     * Rellena la cadena con espacios a la izquierda hasta alcanzar la longitud especificada.
     */
    public static function rellenarEspaciosIzquierda(string|int|float $cadena, int $longitud): string
    {
        return str_pad((string)$cadena, $longitud, ' ', STR_PAD_LEFT);
    }

    /**
     * Rellena la cadena con espacios a la derecha hasta alcanzar la longitud especificada.
     */
    public static function rellenarEspaciosDerecha(string|int|float $cadena, int $longitud): string
    {
        return str_pad((string)$cadena, $longitud, ' ', STR_PAD_RIGHT);
    }

    /**
     * Rellena la cadena repitiendo la variable hasta alcanzar la longitud especificada.
     */
    public static function rellenarEspaciosVariable(string $variable, int $longitud): string
    {
        if ($variable === "") {
            return str_repeat(' ', $longitud);
        }
        return substr(str_repeat($variable, (int)ceil($longitud / strlen($variable))), 0, $longitud);
    }

    /**
     * Rellena el número con ceros a la izquierda hasta alcanzar la longitud especificada.
     */
    public static function rellenarCerrosIzquierda(string|int|float $numero, int $longitud): string
    {
        return str_pad((string)$numero, $longitud, '0', STR_PAD_LEFT);
    }

    /**
     * Rellena el número con ceros a la derecha hasta alcanzar la longitud especificada.
     */
    public static function rellenarCerrosDerecha(string|int|float $numero, int $longitud): string
    {
        return str_pad((string)$numero, $longitud, '0', STR_PAD_RIGHT);
    }

    /**
     * Rellena la cadena con ceros a la izquierda para formato IRP (Planilla Integrada).
     */
    public static function rellenarIrp(?string $cadena, int $longitud): string
    {
        return str_pad((string)($cadena ?? ''), $longitud, '0', STR_PAD_LEFT);
    }

    /**
     * Trunca o retorna la cadena limitada a la longitud especificada.
     */
    public static function cadenaLongitud(string $cadena, int $longitud): string
    {
        return strlen($cadena) > $longitud ? substr($cadena, 0, $longitud) : $cadena;
    }

    /**
     * Formatea la fecha como AAAA-MM (año-mes).
     */
    public static function fechaAaaaMm(DateTime $fecha): string
    {
        return $fecha->format('Y-m');
    }

    /**
     * Formatea la fecha como AAAAMM (añomes sin separador).
     */
    public static function fechaAaaamm(DateTime $fecha): string
    {
        return $fecha->format('Ym');
    }

    /**
     * Formatea la fecha como AAAA-MM-DD (año-mes-día).
     */
    public static function fechaAaaaMmDd(DateTime $fecha): string
    {
        return $fecha->format('Y-m-d');
    }

    /**
     * Formatea la fecha como AAAA-MM-DD HH:MM:SS (fecha y hora completa).
     */
    public static function fechaAaaaMmDdHhMmSs(DateTime $fecha): string
    {
        return $fecha->format('Y-m-d H:i:s');
    }

    /**
     * Formatea la fecha como AAMMDD (año de 2 dígitos, mes, día).
     */
    public static function fechaAammdd(DateTime $fecha): string
    {
        return $fecha->format('ymd');
    }

    /**
     * Formatea la fecha como AAAAMMDD (año, mes y día sin separadores).
     */
    public static function fechaAaaammdd(DateTime $fecha): string
    {
        return $fecha->format('Ymd');
    }

    /**
     * Convierte un arreglo o matriz en una cadena separada por comas.
     *
     * @param array<mixed> $matriz Arreglo de valores a unir.
     */
    public static function convertiMatrizString(array $matriz): string
    {
        return implode(',', $matriz);
    }

    /**
     * Convierte una imagen GD en bytes (contenido binario JPEG).
     *
     * @param \GdImage|null $img Recurso de imagen GD.
     * @return string|false Bytes de la imagen en formato JPEG, o false si falla.
     */
    public static function image(?\GdImage $img): string|false
    {
        if ($img === null) {
            return false;
        }

        ob_start();
        imagejpeg($img);
        $bytes = ob_get_clean();
        
        return $bytes;
    }

    /**
     * Elimina todos los espacios en blanco de la cadena.
     */
    public static function quitarEspaciosBlancos(string $cadena): string
    {
        return str_replace(' ', '', $cadena);
    }
}
