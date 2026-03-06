<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;



/**
 * Enumeración de tipos de incapacidades y licencias (general, accidente de trabajo, maternidad).
 */
class EnumIncapacidades
{
    const IGE_IncapacidadGeneral = EnumVariablesSistema::IGE_IncapacidadGeneral;
    const IRP_IncapacidadAccidenteTrabajo = EnumVariablesSistema::IRP_IncapacidadAccidenteTrabajo;
    const LMA_LicenciaMaternidad = EnumVariablesSistema::LMA_LicenciaMaternidad;

    // private static $descriptions = [
    //     ["id" => self::IGE_IncapacidadGeneral, "code" => "IGE_IncapacidadGeneral", "description" => ((EnumVariablesSistema::getById(EnumVariablesSistema::IGE_IncapacidadGeneral) ?? [])['description'] ?? 'Incapacidad General')],
    //     ["id" => self::IRP_IncapacidadAccidenteTrabajo, "code" => "IRP_IncapacidadAccidenteTrabajo", "description" => ((EnumVariablesSistema::getById(EnumVariablesSistema::IRP_IncapacidadAccidenteTrabajo) ?? [])['description'] ?? 'Incapacidad Accidente de Trabajo')],
    //     ["id" => self::LMA_LicenciaMaternidad, "code" => "LMA_LicenciaMaternidad", "description" => ((EnumVariablesSistema::getById(EnumVariablesSistema::LMA_LicenciaMaternidad) ?? [])['description'] ?? 'Licencia de Maternidad')],
    // ];
    private static $descriptions = [
        ["id" => self::IGE_IncapacidadGeneral,        "code" => "IGE_IncapacidadGeneral"],
        ["id" => self::IRP_IncapacidadAccidenteTrabajo, "code" => "IRP_IncapacidadAccidenteTrabajo"],
        ["id" => self::LMA_LicenciaMaternidad,        "code" => "LMA_LicenciaMaternidad"],
    ];

    /**
     * Inicializa las descripciones dinámicamente desde EnumVariablesSistema (solo una vez).
     */
    protected static function boot()
     {
         static $initialized = false;
         if ($initialized) {
             return;
         }
         $initialized = true;
 
         foreach (self::$descriptions as &$item) {
             $enum = EnumVariablesSistema::getById($item['id']) ?? [];
             $item['description'] = $enum['description']
                 ?? self::defaultDescription($item['code']);
         }
         unset($item);
     }

    /**
     * Retorna la descripción por defecto cuando no se encuentra en EnumVariablesSistema.
     *
     * @param string $code Código del tipo de incapacidad.
     * @return string Descripción legible del código.
     */
    protected static function defaultDescription(string $code): string
    {
        return match ($code) {
            'IGE_IncapacidadGeneral'          => 'Incapacidad General',
            'IRP_IncapacidadAccidenteTrabajo' => 'Incapacidad Accidente de Trabajo',
            'LMA_LicenciaMaternidad'          => 'Licencia de Maternidad',
            default                           => $code,
        };
    }
    /**
     * Retorna la colección de elementos del Enum.
     *
     * @return \Illuminate\Support\Collection Colección con id, code y description.
     */
    public static function getCollection()
    {
        return collect(self::$descriptions);
    }


    /**
     * Busca un elemento por su ID.
     *
     * @param mixed $id Identificador del elemento.
     * @return array|null Elemento encontrado o null.
     */
    public static function getById($id)
    {
        return self::getCollection()->firstWhere('id', $id) ?? null;
    }


    /**
     * Retorna todos los elementos del Enum.
     *
     * @return array Arreglo con todos los elementos.
     */
    public static function getAll()
    {
        return self::$descriptions;
    }


    /**
     * Busca un elemento por su descripción.
     *
     * @param string $description Descripción del elemento.
     * @return array|null Elemento encontrado o null.
     */
    public static function getByDescription($description)
    {
        return self::getCollection()->firstWhere('description', $description) ?? null;
    }

    /**
     * Obtiene la descripción de un valor del Enum.
     *
     * @param mixed $value Valor del Enum.
     * @return string|null Descripción del valor, o null si no se encuentra.
     */
    public static function getDescription($value)
    {
        $item = self::getById($value);
        return $item ? ($item['description'] ?? null) : null;
    }
}
