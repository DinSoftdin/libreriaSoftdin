<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;


/**
 * Enumeración de valores predefinidos.
 */
class EnumNE_TipoHora
{
    const HED = EnumVariablesSistema::HoraExtraDiurna;
    const HEN = EnumVariablesSistema::HoraExtraNocturna;
    const HRN = EnumVariablesSistema::RecargoNocturno;
    const HRDDF = EnumVariablesSistema::HoraDominical;
    const HEDDF = EnumVariablesSistema::HoraExtraDominicalDiurna;
    const HENDF = EnumVariablesSistema::HoraExtraDominicalNocturna;
    const HRNDF = EnumVariablesSistema::RecargoNocturnoDominical;

    /**
     * Es un metodo y no una propiedad estatica a proposito: las descripciones se
     * derivan de EnumVariablesSistema, y PHP no admite llamadas a metodos en el
     * inicializador de una propiedad estatica, que tiene que ser una expresion
     * constante. Con la propiedad la clase no se podia ni cargar:
     * «Constant expression contains invalid operations». La version JS de esta
     * misma enumeracion si funciona asi, porque JavaScript lo permite.
     *
     * @return list<array{id: int, code: string, description: string}>
     */
    private static function descriptions(): array
    {
        return [
            ['id' => self::HED, 'code' => '1', 'description' => EnumVariablesSistema::getById(self::HED)['description']],
            ['id' => self::HEN, 'code' => '2', 'description' => EnumVariablesSistema::getById(self::HEN)['description']],
            ['id' => self::HRN, 'code' => '3', 'description' => EnumVariablesSistema::getById(self::HRN)['description']],
            ['id' => self::HRDDF, 'code' => '4', 'description' => EnumVariablesSistema::getById(self::HRDDF)['description']],
            ['id' => self::HEDDF, 'code' => '5', 'description' => EnumVariablesSistema::getById(self::HEDDF)['description']],
            ['id' => self::HENDF, 'code' => '6', 'description' => EnumVariablesSistema::getById(self::HENDF)['description']],
            ['id' => self::HRNDF, 'code' => '7', 'description' => EnumVariablesSistema::getById(self::HRNDF)['description']],
        ];
    }


    /**
     * Retorna la colección de elementos del Enum.
     *
     * @return \Illuminate\Support\Collection Colección con id, code y description.
     */
    public static function getCollection()
    {
        return collect(self::descriptions());
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
        return self::descriptions();
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
