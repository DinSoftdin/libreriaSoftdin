<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;

/**
 * Formularios que interactúan con flujos de aprobación.
 *
 * El valor de cada constante es el `code` de la definición en `workflow_definitions`,
 * columna entera, y debe coincidir con el que usa el formulario al iniciar el workflow.
 *
 * El campo `code` del array es el identificador de texto con el que cada flujo se
 * persistía antes de que la columna pasara a entero. Se conserva tal cual — de ahí la
 * mezcla de mayúsculas y minúsculas — porque es lo que permite traducir a id tanto los
 * datos históricos como el `workflow_templates.code` del que salen NOVEDAD_NOMINA y
 * VINCULACION, y porque la interfaz lo muestra junto a la descripción.
 */
class EnumFlujosAprobacion
{
    public const SOLICITUD_VACANTE = 1;
    public const PERFIL_CARGO = 2;
    public const NOVEDAD_NOMINA = 3;
    public const VINCULACION = 4;

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
        // Vienen de `workflow_templates` (BD central), de ahi el code en minusculas.
        [
            'id' => self::NOVEDAD_NOMINA,
            'code' => 'novedad_nomina',
            'description' => 'Novedad de nómina',
        ],
        [
            'id' => self::VINCULACION,
            'code' => 'vinculacion',
            'description' => 'Vinculación',
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
     * Busca un elemento por su id, que es el código del flujo persistido.
     *
     * @param mixed $id Identificador del elemento.
     * @return array|null Elemento encontrado o null.
     */
    public static function getById($id)
    {
        return self::getCollection()->firstWhere('id', $id) ?? null;
    }

    /**
     * Busca un elemento por su etiqueta legible.
     *
     * @param string $code Etiqueta del flujo (ej. SOLICITUD_VACANTE).
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
     * Códigos válidos de flujo, que es lo que se persiste y lo que validan las requests.
     *
     * @return list<int>
     */
    public static function getIds(): array
    {
        return self::getCollection()->pluck('id')->values()->all();
    }

    /**
     * Etiquetas legibles de los flujos. No son lo que se guarda: para eso, getIds().
     *
     * @return list<string>
     */
    public static function getCodes(): array
    {
        return self::getCollection()->pluck('code')->values()->all();
    }

    /**
     * Indica si el código de flujo corresponde a un formulario con flujo de aprobación.
     */
    public static function isValid(int $id): bool
    {
        return self::getById($id) !== null;
    }

    /**
     * Igual que isValid() pero sobre la etiqueta legible.
     */
    public static function isValidCode(string $code): bool
    {
        return self::getByCode($code) !== null;
    }
}
