<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumNE_TipoDocumento
{
    const Registro_civil = 11;
    const Tarjeta_identidad = 12;
    const Cedula_ciudadania = 13;
    const Tarjeta_extranjeria = 21;
    const Cedula_extranjeria = 22;
    const NIT = 31;
    const Pasaporte = 41;
    const Documento_identificacion_extranjero = 42;
    const PEP = 47;
    const NIT_otro_pais = 50;
    const NUIP = 91;

    private static $descriptions = [
        ['id' => self::Registro_civil, 'code' => 'Registro_civil', 'description' => "Registro civil"],
        ['id' => self::Tarjeta_identidad, 'code' => 'Tarjeta_identidad', 'description' => "Tarjeta de identidad"],
        ['id' => self::Cedula_ciudadania, 'code' => 'Cedula_ciudadania', 'description' => "Cédula de ciudadanía"],
        ['id' => self::Tarjeta_extranjeria, 'code' => 'Tarjeta_extranjeria', 'description' => "Tarjeta de extranjería"],
        ['id' => self::Cedula_extranjeria, 'code' => 'Cedula_extranjeria', 'description' => "Cédula de extranjería"],
        ['id' => self::NIT, 'code' => 'NIT', 'description' => "NIT"],
        ['id' => self::Pasaporte, 'code' => 'Pasaporte', 'description' => "Pasaporte"],
        ['id' => self::Documento_identificacion_extranjero, 'code' => 'Documento_identificacion_extranjero', 'description' => "Documento de identificación extranjero"],
        ['id' => self::PEP, 'code' => 'PEP', 'description' => "PEP"],
        ['id' => self::NIT_otro_pais, 'code' => 'NIT_otro_pais', 'description' => "NIT de otro país"],
        ['id' => self::NUIP, 'code' => 'NUIP', 'description' => "NUIP *"]
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

    // public static function NE_TipoContrato(EnumTipoContrato $tipocontrato)
    // {
    //     $mapeo = [
    //         EnumTipoContrato::FIJO => EnumNE_TipoContrato::Termino_Fijo,
    //         EnumTipoContrato::INDEFINIDO => EnumNE_TipoContrato::Termino_Indefinido,
    //         EnumTipoContrato::OBRA_LABOR => EnumNE_TipoContrato::Obra_Labor,
    //         EnumTipoContrato::APRENDIZAJE => EnumNE_TipoContrato::Aprendizaje,
    //         EnumTipoContrato::PRACTICAS_PASANTIAS => EnumNE_TipoContrato::Practicas_Pasantias,
    //     ];

    //     if (array_key_exists($tipocontrato, $mapeo)) {
    //         return $mapeo[$tipocontrato];
    //     } else {
    //         throw new \InvalidArgumentException("Tipo de contrato no implementado: $tipocontrato");
    //     }
    // }


}
