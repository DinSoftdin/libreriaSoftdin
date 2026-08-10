<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;

/**
 * Formularios que interactúan con flujos de aprobación.
 *
 * El valor de cada constante es el `code` de la definición en `workflow_definitions`
 * y debe coincidir con el que usa el formulario al iniciar el workflow.
 */
class EnumFlujosAprobacion
{
    public const SOLICITUD_VACANTE = 'SOLICITUD_VACANTE';
    public const PERFIL_CARGO = 'PERFIL_CARGO';

    private static $descriptions = [
        [
            'id' => self::SOLICITUD_VACANTE,
            'code' => 'SOLICITUD_VACANTE',
            'description' => 'Solicitud de Vacante',
        ],
        [
            'id' => self::PERFIL_CARGO,
            'code' => 'PERFIL_CARGO',
            'description' => 'Perfil de Cargo',
        ],
    ];

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
     * Busca un elemento por su ID (código del flujo).
     *
     * @param mixed $id Identificador del elemento.
     * @return array|null Elemento encontrado o null.
     */
    public static function getById($id)
    {
        return self::getCollection()->firstWhere('id', $id) ?? null;
    }

    /**
     * Busca un elemento por su código de flujo.
     *
     * @param string $code Código del flujo (ej. SOLICITUD_VACANTE).
     * @return array|null Elemento encontrado o null.
     */
    public static function getByCode($code)
    {
        return self::getCollection()->firstWhere('code', $code) ?? null;
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
     * Códigos válidos de formularios con flujo de aprobación.
     *
     * @return list<string>
     */
    public static function getCodes(): array
    {
        return self::getCollection()->pluck('code')->values()->all();
    }

    /**
     * Indica si el código corresponde a un formulario con flujo de aprobación.
     */
    public static function isValid(string $code): bool
    {
        return self::getByCode($code) !== null;
    }
}
