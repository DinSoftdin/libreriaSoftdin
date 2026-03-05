<?php

namespace softdin\servicio\Enum;

use ReflectionClass;
use Illuminate\Support\Collection;


class EnumArchivoPlanoNominaElectronica
{
    const HDR = 1;
    const EMP = 2;
    const TRA = 3;
    const PER = 4;
    const LGE = 5;
    const IGE = 6;
    const NOT = 7;
    const PAG = 8;
    const FPA = 9;
    const DBA = 10;
    const DTR = 11;
    const HEX = 12;
    const VAC = 13;
    const VCO = 14;
    const PRI = 15;
    const CES = 16;
    const INC = 17;
    const LIC = 18;
    const BON = 19;
    const AUX = 20;
    const HLE = 21;
    const OCO = 22;
    const COM = 23;
    const BOO = 24;
    const COI = 25;
    const PTE = 26;
    const ANT = 27;
    const DEV = 28;
    const SAL = 29;
    const FPE = 30;
    const FSP = 31;
    const SIN = 32;
    const SAN = 33;
    const LIB = 34;
    const PAT = 35;
    const ANI = 36;
    const ODE = 37;
    const DED = 38;
    const RES = 39;
    const FOO = 40;
    const NSX = 41;
    const ELP = 42;
    const REP = 43;

    private static $descriptions = [
        ['id' => self::HDR, 'code' => 'HDR', 'description' => 'HDR'],
        ['id' => self::EMP, 'code' => 'EMP', 'description' => 'EMP'],
        ['id' => self::TRA, 'code' => 'TRA', 'description' => 'TRA'],
        ['id' => self::PER, 'code' => 'PER', 'description' => 'PER'],
        ['id' => self::LGE, 'code' => 'LGE', 'description' => 'LGE'],
        ['id' => self::IGE, 'code' => 'IGE', 'description' => 'IGE'],
        ['id' => self::NOT, 'code' => 'NOT', 'description' => 'NOT'],
        ['id' => self::PAG, 'code' => 'PAG', 'description' => 'PAG'],
        ['id' => self::FPA, 'code' => 'FPA', 'description' => 'FPA'],
        ['id' => self::DBA, 'code' => 'DBA', 'description' => 'DBA'],
        ['id' => self::DTR, 'code' => 'DTR', 'description' => 'DTR'],
        ['id' => self::HEX, 'code' => 'HEX', 'description' => 'HEX'],
        ['id' => self::VAC, 'code' => 'VAC', 'description' => 'VAC'],
        ['id' => self::VCO, 'code' => 'VCO', 'description' => 'VCO'],
        ['id' => self::PRI, 'code' => 'PRI', 'description' => 'PRI'],
        ['id' => self::CES, 'code' => 'CES', 'description' => 'CES'],
        ['id' => self::INC, 'code' => 'INC', 'description' => 'INC'],
        ['id' => self::LIC, 'code' => 'LIC', 'description' => 'LIC'],
        ['id' => self::BON, 'code' => 'BON', 'description' => 'BON'],
        ['id' => self::AUX, 'code' => 'AUX', 'description' => 'AUX'],
        ['id' => self::HLE, 'code' => 'HLE', 'description' => 'HLE'],
        ['id' => self::OCO, 'code' => 'OCO', 'description' => 'OCO'],
        ['id' => self::COM, 'code' => 'COM', 'description' => 'COM'],
        ['id' => self::BOO, 'code' => 'BOO', 'description' => 'BOO'],
        ['id' => self::COI, 'code' => 'COI', 'description' => 'COI'],
        ['id' => self::PTE, 'code' => 'PTE', 'description' => 'PTE'],
        ['id' => self::ANT, 'code' => 'ANT', 'description' => 'ANT'],
        ['id' => self::DEV, 'code' => 'DEV', 'description' => 'DEV'],
        ['id' => self::SAL, 'code' => 'SAL', 'description' => 'SAL'],
        ['id' => self::FPE, 'code' => 'FPE', 'description' => 'FPE'],
        ['id' => self::FSP, 'code' => 'FSP', 'description' => 'FSP'],
        ['id' => self::SIN, 'code' => 'SIN', 'description' => 'SIN'],
        ['id' => self::SAN, 'code' => 'SAN', 'description' => 'SAN'],
        ['id' => self::LIB, 'code' => 'LIB', 'description' => 'LIB'],
        ['id' => self::PAT, 'code' => 'PAT', 'description' => 'PAT'],
        ['id' => self::ANI, 'code' => 'ANI', 'description' => 'ANI'],
        ['id' => self::ODE, 'code' => 'ODE', 'description' => 'ODE'],
        ['id' => self::DED, 'code' => 'DED', 'description' => 'DED'],
        ['id' => self::RES, 'code' => 'RES', 'description' => 'RES'],
        ['id' => self::FOO, 'code' => 'FOO', 'description' => 'FOO'],
        ['id' => self::NSX, 'code' => 'NSX', 'description' => 'NSX'],
        ['id' => self::ELP, 'code' => 'ELP', 'description' => 'ELP'],
        ['id' => self::REP, 'code' => 'REP', 'description' => 'REP'],
        ['id' => self::ORD, 'code' => 'ORD', 'description' => 'ORD'],
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
