<?php

namespace softdin\servicio\Enum;

use Illuminate\Support\Collection;


/**
 * Enumeración de valores predefinidos.
 */
class EnumLocalizacion
{
    const TELEFONO = 1;
    const CELULAR = 2;
    const BIPER = 3;
    const EMAIL = 4;
    const EMERGENCIAS = 5;
    const CELULAR_TRABAJO = 6;
    const SITIO_WEB = 7;
    const FACEBOOK = 8;
    const INSTAGRAM = 9;
    const TWITTER = 10;
    const LINKEDIN = 11;
    const YOUTUBE = 12;
    const GEOLOCALIZACION = 13;

    private static $descriptions = [
        ['id' => self::TELEFONO, 'code' => 'TELEFONO', 'description' => "Teléfono"],
        ['id' => self::CELULAR, 'code' => 'CELULAR', 'description' => "Celular"],
        ['id' => self::BIPER, 'code' => 'BIPER', 'description' => "Biper"],
        ['id' => self::EMAIL, 'code' => 'EMAIL', 'description' => "Email"],
        ['id' => self::EMERGENCIAS, 'code' => 'EMERGENCIAS', 'description' => "Emergencias"],
        ['id' => self::CELULAR_TRABAJO, 'code' => 'CELULAR_TRABAJO', 'description' => "Celular de Trabajo"],
        ['id' => self::SITIO_WEB, 'code' => 'SITIO_WEB', 'description' => "Sitio Web"],
        ['id' => self::FACEBOOK, 'code' => 'FACEBOOK', 'description' => "Facebook"],
        ['id' => self::INSTAGRAM, 'code' => 'INSTAGRAM', 'description' => "Instagram"],
        ['id' => self::TWITTER, 'code' => 'TWITTER', 'description' => "Twitter"],
        ['id' => self::LINKEDIN, 'code' => 'LINKEDIN', 'description' => "LinkedIn"],
        ['id' => self::YOUTUBE, 'code' => 'YOUTUBE', 'description' => "YouTube"],
        ['id' => self::GEOLOCALIZACION, 'code' => 'GEOLOCALIZACION', 'description' => "Geolocalización"]
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
