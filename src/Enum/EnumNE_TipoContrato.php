<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumNE_TipoContrato
{
    const Termino_Fijo = 1;
    const Termino_Indefinido = 2;
    const Obra_Labor = 3;
    const Aprendizaje = 4;
    const Practicas_Pasantias = 5;

    private static $descriptions = [
        ['id' => self::Termino_Fijo, 'code' => 'Termino_Fijo', 'description' => "Termino Fijo"],
        ['id' => self::Termino_Indefinido, 'code' => 'Termino_Indefinido', 'description' => "Termino Indefinido"],
        ['id' => self::Obra_Labor, 'code' => 'Obra_Labor', 'description' => "Obra Labor"],
        ['id' => self::Aprendizaje, 'code' => 'Aprendizaje', 'description' => "Aprendizaje"],
        ['id' => self::Practicas_Pasantias, 'code' => 'Practicas_Pasantias', 'description' => "Prácticas o Pasantías"]
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

    // public static function NE_TipoDocumento(EnumTipoIdentificacion $tipodocumento)
    // {
    //     $mapeo = [
    //             EnumTipoIdentificacion::CC => EnumNE_TipoDocumento::Cedula_ciudadania,
    //             EnumTipoIdentificacion::CE => EnumNE_TipoDocumento::Cedula_extranjeria,
    //             EnumTipoIdentificacion::NI =>  EnumNE_TipoDocumento::NIT,
    //             EnumTipoIdentificacion::PA => EnumNE_TipoDocumento::Pasaporte,
    //             EnumTipoIdentificacion::RC => EnumNE_TipoDocumento::Registro_civil,
    //             EnumTipoIdentificacion::TI => EnumNE_TipoDocumento::Tarjeta_identidad,
    //     ];

    //     if (array_key_exists($tipodocumento, $mapeo)) {
    //         return $mapeo[$tipodocumento];
    //     } else {
    //         throw new \InvalidArgumentException("Tipo de documento no implementado: $tipodocumento");
    //     }
    // }
}
