<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumConceptosCertificacion
{
    const NIT = 1;
    const RAZON_SOCIAL = 2;
    const SIGLA = 3;
    const REPRESENTANTE_LEGAL = 4;
    const TIPO_IDENTIFICACION = 5;
    const IDENTIFICACION = 6;
    const LUGAR_EXPEDICION = 7;
    const APELLIDOS_NOMBRES = 8;
    const CARGO = 9;
    const SALARIO = 10;
    const FECHA_PERIODO_INICIO_LARGO = 11;
    const FECHA_PERIODO_INICIO_CORTO = 12;
    const FECHA_PERIODO_FINAL_LARGO = 13;
    const FECHA_PERIODO_FINAL_CORTO = 14;
    const SUCURSAL = 15;
    const SEDE = 16;
    const DIVISION = 17;
    const TIPO_CONTRATO = 18;
    const AREA_TRABAJO = 19;
    const BANCO = 20;
    const TIPO_CUENTA_BANCARIA = 21;
    const CUENTA_BANCARIA = 22;
    const EPS = 23;
    const AFP = 24;
    const CESANTIAS = 25;
    const MOTIVO_RETIRO = 26;
    const FECHA_ACTUAL_LARGO = 27;
    const FECHA_ACTUAL_CORTO = 27;
    const DESCRIPCION_CARGO = 29;
    const SALARIO_LETRAS = 30;
    const DESCRIPCION_CONTRATO = 31;
    const CONTRATACION = 32;
    const TIPO_DE_CONTRATACION = 33;
    const PORCENTAJE_ARL = 34;
    const CEDULA_REPRESENTANTE_LEGAL = 35;
    const CCF = 36;
    const FECHA_NACIMIENTO_LARGO = 37;
    const FECHA_NACIMIENTO_CORTO = 38;
    const BARRIO = 39;
    const DIRECCION_RESIDENCIAL = 40;
    const LUGAR_NACIMIENTO = 41;
    const OBJETIVO_CONTRATO = 42;
    const RETEFUENTE_PROCEDIMIENTO = 43;
    const BONIFICACION_HS = 44;
    const CONSECUTIVO_CONTRATO = 45;
    const PERIODO_PRUEBA = 46;
    const SALARIO_DIA = 47;
    const DURACION_CONTRATO = 48;
    const TELEFONO = 49;
    const CELULAR = 50;
    const EMAIL = 51;
    const TEL_EMERGENCIA = 52;

    private static $descriptions = [
        ['id' => self::NIT, 'description2' => "NIT", 'code' => '<<01>>', 'description' => '<<01>> NIT'],
        ['id' => self::RAZON_SOCIAL, 'description2' => "RAZON SOCIAL", 'code' => '<<02>>', 'description' => '<<02>> RAZON SOCIAL'],
        ['id' => self::SIGLA, 'description2' => "SIGLA", 'code' => '<<03>>', 'description' => '<<03>> SIGLA'],
        ['id' => self::REPRESENTANTE_LEGAL, 'description2' => "REPRESENTANTE LEGAL", 'code' => '<<04>>', 'description' => '<<04>> REPRESENTANTE LEGAL'],
        ['id' => self::TIPO_IDENTIFICACION, 'description2' => "TIPO IDENTIFICACION", 'code' => '<<05>>', 'description' => '<<05>> TIPO IDENTIFICACION'],
        ['id' => self::IDENTIFICACION, 'description2' => "IDENTIFICACION", 'code' => '<<06>>', 'description' => '<<06>> IDENTIFICACION'],
        ['id' => self::LUGAR_EXPEDICION, 'description2' => "LUGAR EXPEDICION", 'code' => '<<07>>', 'description' => '<<07>> LUGAR EXPEDICION'],
        ['id' => self::APELLIDOS_NOMBRES, 'description2' => "APELLIDOS NOMBRES", 'code' => '<<08>>', 'description' => '<<08>> APELLIDOS NOMBRES'],
        ['id' => self::CARGO, 'description2' => "CARGO", 'code' => '<<09>>', 'description' => '<<09>> CARGO'],
        ['id' => self::SALARIO, 'description2' => "SALARIO", 'code' => '<<10>>', 'description' => '<<10>> SALARIO'],
        ['id' => self::FECHA_PERIODO_INICIO_LARGO, 'description2' => "FECHA PERIODO INICIO LARGO", 'code' => '<<11>>', 'description' => '<<11>> FECHA PERIODO INICIO LARGO'],
        ['id' => self::FECHA_PERIODO_INICIO_CORTO, 'description2' => "FECHA PERIODO INICIO CORTO", 'code' => '<<12>>', 'description' => '<<12>> FECHA PERIODO INICIO CORTO'],
        ['id' => self::FECHA_PERIODO_FINAL_LARGO, 'description2' => "FECHA PERIODO FINAL LARGO", 'code' => '<<13>>', 'description' => '<<13>> FECHA PERIODO FINAL LARGO'],
        ['id' => self::FECHA_PERIODO_FINAL_CORTO, 'description2' => "FECHA PERIODO FINAL CORTO", 'code' => '<<14>>', 'description' => '<<14>> FECHA PERIODO FINAL CORTO'],
        ['id' => self::SUCURSAL, 'description2' => "SUCURSAL", 'code' => '<<15>>', 'description' => '<<15>> SUCURSAL'],
        ['id' => self::SEDE, 'description2' => "SEDE", 'code' => '<<16>>', 'description' => '<<16>> SEDE'],
        ['id' => self::DIVISION, 'description2' => "DIVISION", 'code' => '<<17>>', 'description' => '<<17>> DIVISION'],
        ['id' => self::TIPO_CONTRATO, 'description2' => "TIPO CONTRATO", 'code' => '<<18>>', 'description' => '<<18>> TIPO CONTRATO'],
        ['id' => self::AREA_TRABAJO, 'description2' => "AREA TRABAJO", 'code' => '<<19>>', 'description' => '<<19>> AREA TRABAJO'],
        ['id' => self::BANCO, 'description2' => "BANCO", 'code' => '<<20>>', 'description' => '<<20>> BANCO'],
        ['id' => self::TIPO_CUENTA_BANCARIA, 'description2' => "TIPO CUENTA BANCARIA", 'code' => '<<21>>', 'description' => '<<21>> TIPO CUENTA BANCARIA'],
        ['id' => self::CUENTA_BANCARIA, 'description2' => "CUENTA BANCARIA", 'code' => '<<22>>', 'description' => '<<22>> CUENTA BANCARIA'],
        ['id' => self::EPS, 'description2' => "EPS", 'code' => '<<23>>', 'description' => '<<23>> EPS'],
        ['id' => self::AFP, 'description2' => "AFP", 'code' => '<<24>>', 'description' => '<<24>> AFP'],
        ['id' => self::CESANTIAS, 'description2' => "CESANTIAS", 'code' => '<<25>>', 'description' => '<<25>> CESANTIAS'],
        ['id' => self::MOTIVO_RETIRO, 'description2' => "MOTIVO RETIRO", 'code' => '<<26>>', 'description' => '<<26>> MOTIVO RETIRO'],
        ['id' => self::FECHA_ACTUAL_LARGO, 'description2' => "FECHA ACTUAL LARGO", 'code' => '<<27>>', 'description' => '<<27>> FECHA ACTUAL LARGO'],
        ['id' => self::FECHA_ACTUAL_CORTO, 'description2' => "FECHA ACTUAL CORTO", 'code' => '<<27>>', 'description' => '<<27>> FECHA ACTUAL CORTO'],
        ['id' => self::DESCRIPCION_CARGO, 'description2' => "DESCRIPCION CARGO", 'code' => '<<29>>', 'description' => '<<29>> DESCRIPCION CARGO'],
        ['id' => self::SALARIO_LETRAS, 'description2' => "SALARIO LETRAS", 'code' => '<<30>>', 'description' => '<<30>> SALARIO LETRAS'],
        ['id' => self::DESCRIPCION_CONTRATO, 'description2' => "DESCRIPCION CONTRATO", 'code' => '<<31>>', 'description' => '<<31>> DESCRIPCION CONTRATO'],
        ['id' => self::CONTRATACION, 'description2' => "CONTRATACION", 'code' => '<<32>>', 'description' => '<<32>> CONTRATACION'],
        ['id' => self::TIPO_DE_CONTRATACION, 'description2' => "TIPO_DE CONTRATACION", 'code' => '<<33>>', 'description' => '<<33>> TIPO_DE CONTRATACION'],
        ['id' => self::PORCENTAJE_ARL, 'description2' => "PORCENTAJE ARL", 'code' => '<<34>>', 'description' => '<<34>> PORCENTAJE ARL'],
        ['id' => self::CEDULA_REPRESENTANTE_LEGAL, 'description2' => "CEDULA REPRESENTANTE LEGAL", 'code' => '<<35>>', 'description' => '<<35>> CEDULA REPRESENTANTE LEGAL'],
        ['id' => self::CCF, 'description2' => "CCF", 'code' => '<<36>>', 'description' => '<<36>> CCF'],
        ['id' => self::FECHA_NACIMIENTO_LARGO, 'description2' => "FECHA NACIMIENTO LARGO", 'code' => '<<37>>', 'description' => '<<37>> FECHA NACIMIENTO LARGO'],
        ['id' => self::FECHA_NACIMIENTO_CORTO, 'description2' => "FECHA NACIMIENTO CORTO", 'code' => '<<38>>', 'description' => '<<38>> FECHA NACIMIENTO CORTO'],
        ['id' => self::BARRIO, 'description2' => "BARRIO", 'code' => '<<39>>', 'description' => '<<39>> BARRIO'],
        ['id' => self::DIRECCION_RESIDENCIAL, 'description2' => "DIRECCION RESIDENCIAL", 'code' => '<<40>>', 'description' => '<<40>> DIRECCION RESIDENCIAL'],
        ['id' => self::LUGAR_NACIMIENTO, 'description2' => "LUGAR NACIMIENTO", 'code' => '<<41>>', 'description' => '<<41>> LUGAR NACIMIENTO'],
        ['id' => self::OBJETIVO_CONTRATO, 'description2' => "OBJETIVO CONTRATO", 'code' => '<<42>>', 'description' => '<<42>> OBJETIVO CONTRATO'],
        ['id' => self::RETEFUENTE_PROCEDIMIENTO, 'description2' => "RETEFUENTE PROCEDIMIENTO", 'code' => '<<43>>', 'description' => '<<43>> RETEFUENTE PROCEDIMIENTO'],
        ['id' => self::BONIFICACION_HS, 'description2' => "BONIFICACION HS", 'code' => '<<44>>', 'description' => '<<44>> BONIFICACION HS'],
        ['id' => self::CONSECUTIVO_CONTRATO, 'description2' => "CONSECUTIVO CONTRATO", 'code' => '<<45>>', 'description' => '<<45>> CONSECUTIVO CONTRATO'],
        ['id' => self::PERIODO_PRUEBA, 'description2' => "PERIODO PRUEBA", 'code' => '<<46>>', 'description' => '<<46>> PERIODO PRUEBA'],
        ['id' => self::SALARIO_DIA, 'description2' => "SALARIO DIA", 'code' => '<<47>>', 'description' => '<<47>> SALARIO DIA'],
        ['id' => self::DURACION_CONTRATO, 'description2' => "DURACION CONTRATO", 'code' => '<<48>>', 'description' => '<<48>> DURACION CONTRATO'],
        ['id' => self::TELEFONO, 'description2' => "TELEFONO", 'code' => '<<49>>', 'description' => '<<49>> TELEFONO'],
        ['id' => self::CELULAR, 'description2' => "CELULAR", 'code' => '<<50>>', 'description' => '<<50>> CELULAR'],
        ['id' => self::EMAIL, 'description2' => "EMAIL", 'code' => '<<51>>', 'description' => '<<51>> EMAIL'],
        ['id' => self::TEL_EMERGENCIA, 'description2' => "TEL EMERGENCIA", 'code' => '<<52>>', 'description' => '<<52>> TEL EMERGENCIA'],
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
