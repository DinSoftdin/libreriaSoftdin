<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


class EnumCertificadoIngresosAportesListado
{
    const No36 = 1;
    const No37 = 2;
    const No38 = 3;
    const No39 = 4;
    const No40 = 5;
    const No41 = 6;
    const No42 = 7;
    const No43 = 8;
    const No44 = 9;
    const No45 = 10;
    const No46 = 11;
    const No47 = 12;
    const No48 = 13;
    const No49 = 14;
    const No50 = 15;
    const No51 = 16;
    const No52 = 17;
    const No53 = 18;
    const No54 = 19;
    const No55 = 20;
    const No56 = 21;
    const No57 = 22;
    const No58 = 23;
    const No59 = 24;
    const No60 = 25;

    private static $descriptions = [
        ["id" => self::No36, "code" => "No36", "description" => "36 Pagos por salario"],
        ["id" => self::No37, "code" => "No37", "description" => "37 Pagos realizados en bonos electrónicos o de papel de servicios, cheques, tarjetas, vales, etc."],
        ["id" => self::No38, "code" => "No38", "description" => "38 Valor del exceso de los pagos por alimentación mayores a 41 UVT, art. 387-1 E.T."],
        ["id" => self::No39, "code" => "No39", "description" => "39 Pagos por honorarios"],
        ["id" => self::No40, "code" => "No40", "description" => "40 Pagos por servicios"],
        ["id" => self::No41, "code" => "No41", "description" => "41 Pagos por comisiones"],
        ["id" => self::No42, "code" => "No42", "description" => "42 Pagos por prestaciones sociales"],
        ["id" => self::No43, "code" => "No43", "description" => "43 Pagos por viáticos"],
        ["id" => self::No44, "code" => "No44", "description" => "44 Pagos por gastos de representación"],
        ["id" => self::No45, "code" => "No45", "description" => "45 Pagos por compensaciones por el trabajo asociado cooperativo"],
        ["id" => self::No46, "code" => "No46", "description" => "46 Otros pagos"],
        ["id" => self::No47, "code" => "No47", "description" => "47 Auxilio de cesantías e intereses efectivamente pagadas al empleado"],
        ["id" => self::No48, "code" => "No48", "description" => "48 Auxilio de cesantías reconocidos a trabajadores del régimen tradicional del CST, contenido en el Capítulo VII, Título VIII Parte Primera"],
        ["id" => self::No49, "code" => "No49", "description" => "49 Auxilio de cesantías consignadas al fondo de cesantías"],
        ["id" => self::No50, "code" => "No50", "description" => "50 Pensiones de jubilación, vejez o invalidez"],
        ["id" => self::No51, "code" => "No51", "description" => "51 Apoyos económicos educativos financiados con recursos públicos, no reembolsables o condonados"],
        ["id" => self::No52, "code" => "No52", "description" => "52 Total de ingresos brutos (Sume 36 a 51)"],
        ["id" => self::No53, "code" => "No53", "description" => "53 Aportes obligatorios por salud a cargo del trabajador"],
        ["id" => self::No54, "code" => "No54", "description" => "54 Aportes obligatorios a fondos de pensiones y solidaridad pensional a cargo del trabajador"],
        ["id" => self::No55, "code" => "No55", "description" => "55 Cotizaciones voluntarias al régimen de ahorro individual con solidaridad - RAIS"],
        ["id" => self::No56, "code" => "No56", "description" => "56 Aportes voluntarios a fondos de pensiones"],
        ["id" => self::No57, "code" => "No57", "description" => "57 Aportes a cuentas AFC"],
        ["id" => self::No58, "code" => "No58", "description" => "58 Aportes a cuentas AVC"],
        ["id" => self::No59, "code" => "No59", "description" => "59 Ingreso laboral promedio de los últimos seis meses anteriores (numeral 4 art. 206 E.T.)"],
        ["id" => self::No60, "code" => "No60", "description" => "60 Valor de la retención en la fuente por ingresos laborales y de pensiones"],
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

}
