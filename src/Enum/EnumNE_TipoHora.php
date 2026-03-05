<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;

class EnumNE_TipoHora
{
    const HED = EnumVariablesSistema::HoraExtraDiurna;
    const HEN = EnumVariablesSistema::HoraExtraNocturna;
    const HRN = EnumVariablesSistema::RecargoNocturno;
    const HRDDF = EnumVariablesSistema::HoraDominical;
    const HEDDF = EnumVariablesSistema::HoraExtraDominicalDiurna;
    const HENDF = EnumVariablesSistema::HoraExtraDominicalNocturna;
    const HRNDF = EnumVariablesSistema::RecargoNocturnoDominical;

    private static $descriptions = [
        ['id' => self::HED, 'code' => '1', 'description' => EnumVariablesSistema::getById(EnumVariablesSistema::HoraExtraDiurna)->$description],
        ['id' => self::HEN, 'code' => '2', 'description' => EnumVariablesSistema::getById(EnumVariablesSistema::HoraExtraNocturna)->$description],
        ['id' => self::HRN, 'code' => '3', 'description' => EnumVariablesSistema::getById(EnumVariablesSistema::RecargoNocturno)->$description],
        ['id' => self::HRDDF, 'code' => '4', 'description' => EnumVariablesSistema::getById(EnumVariablesSistema::HoraDominical)->$description],
        ['id' => self::HEDDF, 'code' => '5', 'description' => EnumVariablesSistema::getById(EnumVariablesSistema::HoraExtraDominicalDiurna)->$description],
        ['id' => self::HENDF, 'code' => '6', 'description' => EnumVariablesSistema::getById(EnumVariablesSistema::HoraExtraDominicalNocturna)->$description],
        ['id' => self::HRNDF, 'code' => '7', 'description' => EnumVariablesSistema::getById(EnumVariablesSistema::RecargoNocturnoDominical)->$description]
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
