<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;



/**
 * Enumeración de valores predefinidos.
 */
class EnumTipoHora
{
    const ORD = EnumVariablesSistema::Salario;
    const RN = EnumVariablesSistema::RecargoNocturno;
    const RNE = EnumVariablesSistema::RecargoNocturnoEspecial;
    const HED = EnumVariablesSistema::HoraExtraDiurna;
    const HEN = EnumVariablesSistema::HoraExtraNocturna;
    const DF = EnumVariablesSistema::HoraDominical;
    const RNDF = EnumVariablesSistema::RecargoNocturnoDominical;
    const HEDDF = EnumVariablesSistema::HoraExtraDominicalDiurna;
    const HENDF = EnumVariablesSistema::HoraExtraDominicalNocturna;

    private static $descriptions = [
        ['id' => self::ORD, 'code' => 'ORD', 'description' => EnumVariablesSistema::getById(self::ORD)->description],
        ['id' => self::RN, 'code' => 'RN', 'description' => EnumVariablesSistema::getById(self::RN)->description],
        ['id' => self::RNE, 'code' => 'RNE', 'description' => EnumVariablesSistema::getById(self::RNE)->description],
        ['id' => self::HED, 'code' => 'HED', 'description' => EnumVariablesSistema::getById(self::HED)->description],
        ['id' => self::HEN, 'code' => 'HEN', 'description' => EnumVariablesSistema::getById(self::HEN)->description],
        ['id' => self::DF, 'code' => 'DF', 'description' => EnumVariablesSistema::getById(self::DF)->description],
        ['id' => self::RNDF, 'code' => 'RNDF', 'description' => EnumVariablesSistema::getById(self::RNDF)->description],
        ['id' => self::HEDDF, 'code' => 'HEDDF', 'description' => EnumVariablesSistema::getById(self::HEDDF)->description],
        ['id' => self::HENDF, 'code' => 'HENDF', 'description' => EnumVariablesSistema::getById(self::HENDF)->description],
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


}
