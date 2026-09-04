<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;


/**
 * Enumeración de valores predefinidos.
 */
class EnumTipoContrato
{
    /**
     * Los identificadores coinciden con `EnumNE_TipoContrato`, que es el
     * catalogo que exige la DIAN en nomina electronica. Se alinearon a proposito:
     * antes 3 y 4 estaban cruzados —aqui APRENDIZAJE=3 y OBRA_LABOR=4, alla
     * Obra_Labor=3 y Aprendizaje=4— y cualquier mapeo que pasara el id directo
     * reportaba aprendices como obra o labor.
     *
     * Se movio este enum y no el de la DIAN porque esos codigos son externos:
     * no se eligen. El precio fue un intercambio de datos: los ids 3 y 4 se
     * cruzan en `contratos.tipocontrato` de cada tenant con el comando
     * `tenants:alinear-tipocontrato-dian` de softdin-api, que **no es
     * idempotente** —correrlo dos veces deshace el intercambio— y que se niega a
     * ejecutarse si la libreria instalada no trae ya esta numeracion. Por eso
     * este valor no se debe volver a cambiar sin intercambiar los datos que lo
     * guardan.
     *
     *   EnumTipoContrato          EnumNE_TipoContrato
     *   FIJO                = 1   Termino_Fijo        = 1
     *   INDEFINIDO          = 2   Termino_Indefinido  = 2
     *   OBRA_LABOR          = 3   Obra_Labor          = 3
     *   APRENDIZAJE         = 4   Aprendizaje         = 4
     *   PRACTICAS_PASANTIAS = 5   Practicas_Pasantias = 5
     *
     * `ASOCIACION` queda comentado porque no tiene equivalente en el catalogo
     * DIAN: un contrato de asociacion no se puede reportar.
     */
    const FIJO = 1;
    const INDEFINIDO = 2;
    const OBRA_LABOR = 3;
    const APRENDIZAJE = 4;
    const PRACTICAS_PASANTIAS = 5;
    // const ASOCIACION = 6; // sin equivalente en el catalogo DIAN

    private static $descriptions = [
        ['id' => self::FIJO, 'code' => 'FIJO', 'description' => "Fijo"],
        ['id' => self::INDEFINIDO, 'code' => 'INDEFINIDO', 'description' => "Indefinido"],
        ['id' => self::OBRA_LABOR, 'code' => 'OBRA_LABOR', 'description' => "Obra o Labor"],
        ['id' => self::APRENDIZAJE, 'code' => 'APRENDIZAJE', 'description' => "Aprendizaje"],
        ['id' => self::PRACTICAS_PASANTIAS, 'code' => 'PRACTICAS_PASANTIAS', 'description' => "Prácticas o Pasantías"]
        // ['id' => self::ASOCIACION, 'code' => 'ASOCIACION', 'description' => "Asociación"]
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
