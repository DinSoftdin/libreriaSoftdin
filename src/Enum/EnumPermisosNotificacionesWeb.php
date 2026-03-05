<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumPermisosNotificacionesWeb
{
    public const TODOS = 1;
    public const SOLICITUD_CERTIFICADO_LABORAL = 2;
    public const SOLICITUD_PERMISO_LICENCIA = 3;
    public const SOLICITUD_VACACIONES = 4;
    public const REGISTRO_TIEMPO_SUPLEMENTARIO = 5;
    public const REGISTRO_INCAPACIDAD = 6;

    private static $descriptions = [
        ['id' => self::TODOS, 'code' => 'TODOS', 'description' => 'Todos'],
        ['id' => self::SOLICITUD_CERTIFICADO_LABORAL, 'code' => 'SOLICITUD_CERTIFICADO_LABORAL', 'description' => 'Solicitud de Certificado Laboral'],
        ['id' => self::SOLICITUD_PERMISO_LICENCIA, 'code' => 'SOLICITUD_PERMISO_LICENCIA', 'description' => 'Solicitud de Permisos y Licencia'],
        ['id' => self::SOLICITUD_VACACIONES, 'code' => 'SOLICITUD_VACACIONES', 'description' => 'Solicitud de Vacaciones'],
        ['id' => self::REGISTRO_TIEMPO_SUPLEMENTARIO, 'code' => 'REGISTRO_TIEMPO_SUPLEMENTARIO', 'description' => 'Registro de Tiempo Suplementario'],
        ['id' => self::REGISTRO_INCAPACIDAD, 'code' => 'REGISTRO_INCAPACIDAD', 'description' => 'Registro de Incapacidad'],
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
