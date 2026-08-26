<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;

/**
 * Roles de acceso al tenant.
 *
 * El `id` es lo que se persiste: `tenant_user.role` en la BD central y
 * `usuarios.rol_acceso` en la de cada tenant, ambas enteras. El `code` es solo
 * etiqueta legible para la interfaz.
 *
 * OWNER: administrador del cliente. Solo puede existir uno por tenant y es el primer usuario.
 */
class EnumRolTenant
{
    public const OWNER = 1;
    public const ADMIN = 2;
    public const MEMBER = 3;
    public const VIEWER = 4;

    private static $descriptions = [
        ['id' => self::OWNER, 'code' => 'OWNER', 'description' => 'Administrador del cliente'],
        ['id' => self::ADMIN, 'code' => 'ADMIN', 'description' => 'Administrador delegado'],
        ['id' => self::MEMBER, 'code' => 'MEMBER', 'description' => 'Operador'],
        ['id' => self::VIEWER, 'code' => 'VIEWER', 'description' => 'Solo consulta'],
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

    /**
     * Ids válidos de rol, en orden de privilegio.
     *
     * @return list<int>
     */
    public static function getIds(): array
    {
        return [self::OWNER, self::ADMIN, self::MEMBER, self::VIEWER];
    }

    /**
     * El parámetro es `int` a propósito: con `string` la comparación estricta contra
     * las constantes enteras nunca casaba y el método devolvía siempre `false`.
     */
    public static function isValid(int $role): bool
    {
        return in_array($role, self::getIds(), true);
    }

    public static function canManageTenantUsers(int $role): bool
    {
        return in_array($role, [self::OWNER, self::ADMIN], true);
    }
}
