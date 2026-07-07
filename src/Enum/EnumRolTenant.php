<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;

/**
 * Roles de acceso al tenant en la tabla central tenant_user.
 *
 * OWNER: administrador del cliente. Solo puede existir uno por tenant y es el primer usuario.
 */
class EnumRolTenant
{
    public const OWNER = 'owner';
    public const ADMIN = 'admin';
    public const MEMBER = 'member';
    public const VIEWER = 'viewer';

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

    public static function isValid(string $role): bool
    {
        return in_array($role, [self::OWNER, self::ADMIN, self::MEMBER, self::VIEWER], true);
    }

    public static function canManageTenantUsers(string $role): bool
    {
        return in_array($role, [self::OWNER, self::ADMIN], true);
    }
}
