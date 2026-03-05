<?php
 
namespace softdin\servicio;

use Exception;
use Carbon\Carbon;
use DateTime;
use softdin\servicio\Enum\EnumTipoPago;

class libreria
{

    public static function myEmpresa()
    {
        return 'Bienvenidos a Softdin';
    }

    public static function existeCaracter($cadena, $arreglo)
    {
        foreach ($arreglo as $cad) {
            if (strpos($cadena, $cad) !== false) {
                return true;
            }
        }
        return false;
    }

    public static function verificarParentesis($cadena)
    {
        try {
            $parentesis = "";
            $num = 0;

            for ($i = 0; $i < strlen($cadena); $i++) {
                $letra = $cadena[$i];
                if ($letra == "(" || $letra == ")") {
                    if ($letra == "(") {
                        $num++;
                        $parentesis .= "(";
                    }
                    if ($letra == ")") {
                        if ($num == 0)
                            return false;
                        if (substr($parentesis, -1) == "(") {
                            $num--;
                            $parentesis = substr($parentesis, 0, -1);
                        } else {
                            return false;
                        }
                    }
                }
            }

            return $num == 0;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function verificarCorchete($cadena)
    {
        try {
            $corchete = "";
            $num = 0;

            for ($i = 0; $i < strlen($cadena); $i++) {
                $letra = $cadena[$i];
                if ($letra == "[" || $letra == "]") {
                    if ($letra == "[") {
                        $num++;
                        $corchete .= "[";
                    }
                    if ($letra == "]") {
                        if ($num == 0)
                            return false;
                        if (substr($corchete, -1) == "[") {
                            $num--;
                            $corchete = substr($corchete, 0, -1);
                        } else {
                            return false;
                        }
                    }
                }
            }

            return $num == 0;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function esNumeroEntero($numero)
    {
        $isNum = is_numeric($numero);
        if ($isNum) {
            $isInt = intval($numero) == $numero;
            return $isInt;
        }
        return $isNum;
    }

    public static function redondearAlProximoNumero($num): int
    {
        $trun = (int) round((float) $num, 0, PHP_ROUND_HALF_UP);

        if ($num - $trun > 0.0) {
            return ++$trun;
        }

        return $trun;
    }

    public static function esUnOperador($operador)
    {
        $delimitadores = "+-*/%^=()[]";
        if (stripos($delimitadores, $operador) !== false) {
            return true;
        }
        return false;
    }

    public static function esUnOperadorMatematico($operador)
    {
        $delimitadores = "+-*/";
        if (stripos($delimitadores, $operador) !== false) {
            return true;
        }
        return false;
    }

    public static function esPar($n)
    {
        return ($n % 2) === 0;
    }

    public static function esUnOperador2($opr1, $opr2)
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

        if (isset($operadores[$opr1]) && in_array($opr2, $operadores[$opr1])) {
            return "true";
        }

        return "";
    }

    public static function limpiarCadena($cadena)
    {
        try {
            if ($cadena != null) {
                while (strpos($cadena, "  ") !== false) {
                    $cadena = str_replace("  ", " ", $cadena);
                }
            }
            return $cadena;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function recorreFecha($fecha, $periodocuota, $numerocuotas)
    {
        try {
            $dias = 0;
            $fechaRecorrida = Carbon::today(); // Obtener la fecha de hoy usando Carbon

            if ($periodocuota == 'MENSUAL') {
                $fechaRecorrida = $fecha->addMonths($numerocuotas - 1)->endOfMonth(); // Agregar meses y obtener el final del mes
            }

            if ($periodocuota == 'QUINCENAL') {
                $dias = abs(($numerocuotas - 1) * 15);
                $fecha = $fecha->addDays($dias + 5); // Agregar días y 5 días adicionales

                if ($fecha->day >= 15) {
                    $fechaRecorrida = $fecha->endOfMonth(); // Obtener el final del mes si el día es igual o mayor a 15
                } else {
                    $fechaRecorrida = $fecha->endOfMonth()->startOfMonth(); // Obtener el final de la primera quincena
                }
            }

            return $fechaRecorrida;
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

    public static function inicioMes($fecha)
    {
        // Convierte la fecha a objeto Carbon
        $fechaCarbon = Carbon::parse($fecha);

        // Retorna el primer día del mes de la fecha dada
        return $fechaCarbon->firstOfMonth();
    }

    public static function finMes($fecha)
    {
        // Convierte la fecha a objeto Carbon
        $fechaCarbon = Carbon::parse($fecha);

        // Retorna el último día del mes de la fecha dada
        return $fechaCarbon->endOfMonth();
    }

    public static function finPrimeraQuincena(DateTime $fecha)
    {
        return DateTime::createFromFormat('d/m/Y', '15/' . $fecha->format('m/Y'));
    }

    public static function fechaInicioAnalisis(DateTime $fechaingresoCorte, DateTime $fechaterminoCorte, DateTime $fechaingresoMV, DateTime $fechaterminoMV)
    {
        try {
            if ($fechaterminoMV >= $fechaingresoCorte && $fechaingresoMV <= $fechaterminoCorte) {
                if ($fechaingresoMV >= $fechaingresoCorte) {
                    return $fechaingresoMV;
                } else {
                    return $fechaingresoCorte;
                }
            }
            return $fechaingresoMV;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function fechaTerminoAnalisis(DateTime $fechaingresoCorte, DateTime $fechaterminoCorte, DateTime $fechaingresoMV, DateTime $fechaterminoMV)
    {
        try {
            if ($fechaterminoMV >= $fechaingresoCorte && $fechaingresoMV <= $fechaterminoCorte) {
                if ($fechaingresoMV >= $fechaingresoCorte) {
                    return $fechaterminoMV < $fechaterminoCorte ? $fechaterminoMV : $fechaterminoCorte;
                } else {
                    return $fechaterminoMV < $fechaterminoCorte ? $fechaterminoMV : $fechaterminoCorte;
                }
            }
            return $fechaterminoMV;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function diasEnMes($fecha)
    {
        return (new DateTime($fecha))->format('t');
    }

    public static function totalDias($fechaini, $fechafin)
    {
        return (int) $fechafin->diff($fechaini)->format('%a') + 1;
    }

    public static function CompletarDiasCONTABLE($fechaini, $fechafin)
    {
        try {
            $diatotal = 0;
            while ($fechaini <= $fechafin) {
                $fechaFinMes = self::finMes($fechaini);
                if ($fechaini <= $fechaFinMes && $fechafin >= $fechaFinMes) {
                    $diatotal += self::totalDias($fechaini, $fechafin);
                    if ($fechaFinMes->format('d') == 31) {
                        $diatotal -= 1;
                    } else {
                        if ($fechaFinMes->format('d') < 30) {
                            $diatotal += 30 - $fechaFinMes->format('d');
                        }
                    }
                } elseif ($fechaini <= $fechafin && $fechaFinMes > $fechafin) {
                    $diatotal += self::totalDias($fechaini, $fechafin);
                }
                $fechaini = $fechaini->modify('+1 month');
            }
            return $diatotal;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function LaEdad($fechanacimiento)
    {
        try {
            $edad = (new DateTime())->diff($fechanacimiento)->y;
            return $edad;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function ContarDias(DateTime $fechaingresoCorte, DateTime $fechaterminoCorte, DateTime $fechaingresoMV, DateTime $fechaterminoMV, $tipopago): int
    {
        try {
            $fechainicio = new DateTime();
            $fechatermino = new DateTime();
            $dias = 0;
            if ($fechaterminoMV >= $fechaingresoCorte && $fechaingresoMV <= $fechaterminoCorte) {
                if ($fechaingresoMV >= $fechaingresoCorte) {
                    $fechainicio = $fechaingresoMV;
                    $fechatermino = $fechaterminoMV < $fechaterminoCorte ? $fechaterminoMV : $fechaterminoCorte;
                } else {
                    $fechainicio = $fechaingresoCorte;
                    $fechatermino = $fechaterminoMV < $fechaterminoCorte ? $fechaterminoMV : $fechaterminoCorte;
                }

                $dias = (float) self::TotalDias($fechainicio, $fechatermino);
                if ($tipopago == EnumTipoPago::COMERCIAL) {
                    $dias = self::CompletarDiasCONTABLE($fechainicio, $fechatermino);
                }
            }
            return $dias;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function ContarDiasTP($fechaingresoMV, $dias, $tipopago)
    {
        try {
            $fechatermino = $fechaingresoMV;
            while ($fechaingresoMV <= $fechatermino->modify("+$dias days")) {
                if ($tipopago == EnumTipoPago::COMERCIAL) {
                    $dias += self::CompletarDiasCONTABLE($fechaingresoMV, $fechaingresoMV);
                }
                $fechaingresoMV = $fechaingresoMV->modify("+1 day");
            }
            return $fechatermino->modify("-1 day");
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function CambiarComaPunto($cadena)
    {
        try {
            if (!empty($cadena)) {
                $cadena = str_replace(",", ".", $cadena);
            } else {
                $cadena = "0";
            }
            return $cadena;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function Multiplos($valor, $multiplo)
    {
        try {
            $valor = round($valor / $multiplo);
            return $valor * $multiplo;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function MultiplosPILA_SMLV($valor, $multiplo, $SalarioBasicoEsIgualAlSMLV)
    {
        try {
            if ($SalarioBasicoEsIgualAlSMLV) {
                return $valor;
            } else {
                $valorMul = $valor / $multiplo;
                $entero = floor($valorMul);
                if (($valorMul - $entero) > 0) {
                    return ($entero + 1) * $multiplo;
                }
                return $entero * $multiplo;
            }
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }


    public static function MultiplosPILA_NOVEDAD($valor, $salario, $SMLV, $dias, $NoNovedades)
    {
        try {
            $VSMLV = ($SMLV / 30.0) * $dias;
            $VSalario = ($salario / 30.0) * $dias;

            // Ajustando SMLV
            $VSMLV = round($VSMLV);
            // Ajustando Salario Basico
            $VSalario = round($VSalario);

            if ($VSalario <= $VSMLV || $NoNovedades > 1) {
                if ($VSMLV > $valor) {
                    return $VSMLV;
                } elseif ($valor > $VSalario) {
                    return $valor;
                } else {
                    $dif = $valor - $VSalario;
                    if ($dif > 1 || $dif < -1) {
                        return $valor;
                    }
                    return $VSalario;
                }
            } else {
                $valor = round($valor);
                $Vdeci = $valor / 1000;
                $Vent = floor($Vdeci);
                $Vdeci = $Vdeci - $Vent;

                if ($Vdeci > 0) {
                    $valor = ($Vent + 1) * 1000;
                } else {
                    $valor = $Vent * 1000;
                }

                $dif = $valor - $VSalario;
                if ($dif > 1000 || $dif < -1) {
                    return $valor;
                }
                return $VSalario;
            }
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function MultiplosPILA($valor, $multiplo)
    {
        try {
            $valorMul = (float) $valor / (float) $multiplo;
            $entero = floor($valorMul);
            if (($valorMul - $entero) > 0) {
                return ($entero + 1) * $multiplo;
            }
            return $entero * $multiplo;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function BuscandoPosicionPalabraCadena($cadena, $palabra)
    {
        try {
            for ($i = 0; $i < strlen($cadena) - 1; $i++) {
                if ($i + strlen($palabra) <= strlen($cadena)) {
                    if ($palabra === substr($cadena, $i, strlen($palabra))) {
                        return $i;
                    }
                } else {
                    return -1;
                }
            }
            return -1;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function BuscandoPosicionCaracterCadena($cadena, $caracter)
    {
        try {
            for ($i = 0; $i < strlen($cadena); $i++) {
                if ($caracter === substr($cadena, $i, 1)) {
                    return $i;
                }
            }
            return -1;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function BuscandoPosicionCaracterCadena_POSICION($cadena, $caracter, $posicion)
    {
        try {
            $pos = 0;
            for ($i = 0; $i < strlen($cadena); $i++) {
                if ($caracter === substr($cadena, $i, 1)) {
                    $pos++;
                    if ($pos == $posicion) {
                        return $i;
                    }
                }
            }
            return -1;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function ExistePalabraCadena($cadena, $palabra)
    {
        try {
            return self::BuscandoPosicionPalabraCadena($cadena, $palabra) >= 0 ? true : false;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function CuantosCaracterCadena($cadena, $caracter)
    {
        try {
            $count = 0;
            for ($i = 0; $i < strlen($cadena); $i++) {
                if ($caracter === substr($cadena, $i, 1)) {
                    $count++;
                }
            }
            return $count;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function EliminarPalabraCadena($cadena, $palabra)
    {
        $posicion = self::BuscandoPosicionPalabraCadena($cadena, $palabra);
        if ($posicion >= 0) {
            return substr_replace($cadena, '', $posicion, strlen($palabra));
        }
        return $cadena;
    }

    public static function RellenarEspaciosIzquierda($cadena, $longitud)
    {
        try {
            while (strlen($cadena) < $longitud) {
                $cadena = " " . $cadena;
            }
            return substr($cadena, 0, $longitud);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function RellenarEspaciosDerecha($cadena, $longitud)
    {
        try {
            while (strlen($cadena) < $longitud) {
                $cadena = $cadena . " ";
            }
            return substr($cadena, 0, $longitud);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function RellenarEspaciosVariable($variable, $longitud)
    {
        try {
            $var = "";
            if ($variable !== "") {
                do {
                    $var .= $variable;
                } while (strlen($var) < $longitud);
            } else {
                $var = self::RellenarEspaciosIzquierda($variable, $longitud);
            }
            return substr($var, 0, $longitud);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function RellenarCerrosIzquierda($numero, $longitud)
    {
        try {
            if (strlen((string) $numero) < $longitud) {
                return self::RellenarEspaciosVariable("0", $longitud - strlen((string) $numero)) . $numero;
            }
            return substr((string) $numero, 0, $longitud);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function RellenarCerrosDerecha($numero, $longitud)
    {
        try {
            if (strlen((string) $numero) < $longitud) {
                return (string) $numero . self::RellenarEspaciosVariable("0", $longitud - strlen((string) $numero));
            }
            return substr((string) $numero, 0, $longitud);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function RellenarIRP($cadena, $longitud)
    {
        try {
            if ($cadena !== null && $cadena !== "") {
                if (strlen((string) $cadena) < $longitud) {
                    return self::RellenarEspaciosVariable("0", $longitud - strlen((string) $cadena)) . $cadena;
                } else {
                    return substr((string) $cadena, 0, $longitud);
                }
            }
            return self::RellenarEspaciosVariable("0", $longitud);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function CadenaLongitud($cadena, $longitud)
    {
        $result = $cadena;
        if (strlen($cadena) > $longitud) {
            $result = substr($cadena, 0, $longitud);
        }
        return $result;
    }

    public static function FechaAAAA_MM($fecha)
    {
        try {
            $año = $fecha->format('Y');
            $mes = self::RellenarCerrosIzquierda($fecha->format('m'), 2);
            return $año . "-" . $mes;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function FechaAAAAMM($fecha)
    {
        try {
            $año = $fecha->format('Y');
            $mes = self::RellenarCerrosIzquierda($fecha->format('m'), 2);
            return $año . $mes;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function FechaAAAA_MM_DD($fecha)
    {
        try {
            $año = $fecha->format('Y');
            $mes = self::RellenarCerrosIzquierda($fecha->format('m'), 2);
            $dia = self::RellenarCerrosIzquierda($fecha->format('d'), 2);
            return $año . "-" . $mes . "-" . $dia;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function FechaAAAA_MM_DD_HH_MM_SS($fecha)
    {
        try {
            $año = $fecha->format('Y');
            $mes = self::RellenarCerrosIzquierda($fecha->format('m'), 2);
            $dia = self::RellenarCerrosIzquierda($fecha->format('d'), 2);
            $hora = self::RellenarCerrosIzquierda($fecha->format('H'), 2);
            $minuto = self::RellenarCerrosIzquierda($fecha->format('i'), 2);
            $segundo = self::RellenarCerrosIzquierda($fecha->format('s'), 2);

            return $año . "-" . $mes . "-" . $dia . " " . $hora . ":" . $minuto . ":" . $segundo;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }


    public static function FechaAAMMDD($fecha)
    {
        try {
            return substr($fecha->format('Y'), 2, 2) . self::RellenarCerrosIzquierda($fecha->format('m'), 2) . self::RellenarCerrosIzquierda($fecha->format('d'), 2);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }


    public static function FechaAAAAMMDD($fecha)
    {
        try {
            $año = $fecha->format('Y');
            $mes = self::RellenarCerrosIzquierda($fecha->format('m'), 2);
            $dia = self::RellenarCerrosIzquierda($fecha->format('d'), 2);
            return $año . $mes . $dia;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }


    public static function ConvertiMatrizString($matriz)
    {
        $cadena = '';
        $cont = 0;
        foreach ($matriz as $campo) {
            if ($cont === 0) {
                $cadena .= $campo;
            } else {
                $cadena .= ',' . $campo;
            }
            $cont++;
        }
        return $cadena;
    }

    public static function Image($img)
    {
        //Mirar si depronto funciona
        try {
            $bytes = [];
            if ($img != null) {
                $sTemp = tempnam(sys_get_temp_dir(), 'image');
                $fs = fopen($sTemp, 'w');
                imagejpeg($img, $sTemp);
                fclose($fs);
                //
                $imgLength = filesize($sTemp);
                $bytes = file_get_contents($sTemp);
                unlink($sTemp);
            }
            return $bytes;
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public static function QuitarEspaciosBlancos($cadena)
    {
        $nuevacadena = str_replace(' ', '', $cadena);
        return $nuevacadena;
    }

}


// class EvalExpMatematicas
// {
//     const Delimitadores = "+-*/%^=()";

//     private $exp;
//     private $lenghtExp;
//     private $indice;
//     private $token;
//     private TipoToken $tipoTok;
//     public $listaVar;

//     public function __construct()
//     {
//         $this->listaVar = array("res" => 0.0);
//     }

//     public function Analizar($exp)
//     {
//         $result = 0.0;
//         $this->exp = $exp;
//         $this->lenghtExp = strlen($exp);
//         $this->indice = 0;

//         $this->ObtToken();

//         if ($this->token == '') {
//             throw new Exception("EvalExp: " . TiposError::SinExpresion . " " . $this->token);
//         }

//         $this->evalExp1($result);

//         if ($this->token != '' || $this->indice != $this->lenghtExp) {
//             throw new Exception("EvalExp :" . TiposError::Sintaxis . " TOKEN(" . $this->token . ";" . $this->tipoTok . ")");
//         }

//         $this->listaVar["res"] = $result;
//         return $result;
//     }

//     private function evalExp1(&$result)
//     {
//         $token = $this->token;
//         $tipoTok = $this->tipoTok;
//         $prog = $this->indice;

//         $this->ObtToken();

//         if ($token !== "=") {
//             $this->token = $token;
//             $this->tipoTok = $tipoTok;
//             $this->indice = $prog;
//         } else {
//             $this->ObtToken();
//             $this->evalExp1($result);
//             if (array_key_exists($token, $this->listaVar)) {
//                 $this->listaVar[$token] = $result;
//             } else {
//                 $this->listaVar[$token] = $result;
//             }
//             return;
//         }
//         $this->evalExp2($result);
//     }

//     private function evalExp2(&$result)
//     {
//         $op = '';
//         $temp = 0.0;

//         $this->evalExp3($result);

//         while ($this->token === "+" || $this->token === "-") {
//             $op = $this->token[0];
//             $this->ObtToken();
//             $this->evalExp3($temp);

//             switch ($op) {
//                 case '+':
//                     $result += $temp;
//                     break;
//                 case '-':
//                     $result -= $temp;
//                     break;
//             }
//         }
//     }

//     private function evalExp3(&$result)
//     {
//         $op = '';
//         $temp = 0.0;

//         $this->evalExp4($result);

//         while ($this->token === "*" || $this->token === "/" || $this->token === "%") {
//             $op = $this->token[0];
//             $this->ObtToken();
//             $this->evalExp4($temp);

//             switch ($op) {
//                 case '*':
//                     $result *= $temp;
//                     break;
//                 case '/':
//                     if ($temp == 0.0) {
//                         throw new Exception("evalExp3 : " . TiposError::DivisionPorCero . " TOKEN(" . $this->token . ";" . $this->tipoTok . ")");
//                     } else {
//                         $result /= $temp;
//                     }
//                     break;
//                 case '%':
//                     $result = (int) $result % (int) $temp;
//                     break;
//             }
//         }
//     }

//     private function evalExp4(&$result)
//     {
//         $temp = 0.0;
//         $ex = 0.0;
//         $t = 0;

//         $this->evalExp5($result);

//         if ($this->token === "^") {
//             $this->ObtToken();
//             $this->evalExp4($temp);
//             $ex = $result;

//             if ($temp == 0.0) {
//                 $result = 1.0;
//                 return;
//             }

//             for ($t = (int) $temp - 1; $t > 0; --$t) {
//                 $result *= $ex;
//             }
//         }
//     }

//     private function evalExp5(&$result)
//     {
//         $operacion = '';

//         if ($this->tipoTok === TipoToken::Delimitador && ($this->token === "+" || $this->token === "-")) {
//             $operacion = $this->token;
//             $this->ObtToken();
//         }

//         $this->evalExp6($result);

//         if ($operacion === "-") {
//             $result = -($result);
//         }
//     }

//     private function evalExp6(&$result)
//     {
//         if ($this->token === "(") {
//             $this->ObtToken();
//             $this->evalExp2($result);

//             if ($this->token !== ")") {
//                 throw new Exception("evalExp6 : " . TiposError::Parentesis . " TOKEN(" . $this->token . ";" . $this->tipoTok . ")");
//             }

//             $this->ObtToken();
//         } elseif ($this->token !== ")") {
//             $this->Atomo($result);
//         } else {
//             $this->indice++;
//         }
//     }

//     private function Atomo(&$result)
//     {
//         switch ($this->tipoTok) {
//             case self::Identificador:
//                 if (array_key_exists($this->token, $this->listaVar)) {
//                     $result = (double) $this->listaVar[$this->token];
//                     $this->ObtToken();
//                 } else {
//                     throw new Exception("Atomo : " . TiposError::Identificador . " TOKEN(" . $this->token . ";" . $this->tipoTok . ")");
//                 }
//                 break;
//             case self::Numero:
//                 try {
//                     $result = doubleval($this->token);
//                 } catch (Exception $e) {
//                     throw new Exception("Atomo : " . TiposError::Sintaxis . " TOKEN(" . $this->token . ";" . $this->tipoTok . ")");
//                 }
//                 $this->ObtToken();
//                 break;
//             default:
//                 throw new Exception("Atomo : " . TiposError::Sintaxis . " TOKEN(" . $this->token . ";" . $this->tipoTok . ")");
//         }
//     }

//     private function ObtToken()
//     {
//         $temp = '';

//         $this->tipoTok = TipoToken::Nulo;
//         $this->token = '';

//         while ($this->indice < $this->lenghtExp && ctype_space($this->exp[$this->indice])) {
//             $this->indice++;
//         }

//         if ($this->indice >= $this->lenghtExp) {
//             return;
//         }

//         if (strpos(Delimitadores, $this->exp[$this->indice]) !== false) {
//             $this->tipoTok = TipoToken::Delimitador;
//             $temp .= $this->exp[$this->indice++];
//         } elseif (ctype_alpha($this->exp[$this->indice])) {
//             while ($this->indice < $this->lenghtExp && (ctype_alpha($this->exp[$this->indice]) || ctype_digit($this->exp[$this->indice]))) {
//                 $temp .= $this->exp[$this->indice++];
//             }
//             $this->tipoTok = TipoToken::Identificador;
//         } elseif (ctype_digit($this->exp[$this->indice])) {
//             while ($this->indice < $this->lenghtExp && (ctype_digit($this->exp[$this->indice]) || ($this->exp[$this->indice] === '.') || ($this->exp[$this->indice] === ','))) {
//                 $temp .= $this->exp[$this->indice++];
//             }
//             $this->tipoTok = TipoToken::Numero;
//         }

//         $this->token = $temp;
//     }
// }


