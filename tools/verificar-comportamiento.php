<?php

declare(strict_types=1);

/**
 * Comprobaciones de comportamiento de la libreria.
 *
 * No sustituye a una suite de pruebas: es el minimo que evita que el CI se limite a
 * «compila». Cubre lo que ya se rompio alguna vez —el calendario comercial de 360
 * dias— y los enums que derivan su descripcion de otro enum mas grande, que estuvieron
 * sin poder cargarse.
 */

require __DIR__ . '/../vendor/autoload.php';

use softdin\servicio\Enum\EnumIncapacidades;
use softdin\servicio\Enum\EnumNE_TipoHora;
use softdin\servicio\Enum\EnumTipoHora;
use softdin\servicio\Enum\EnumTipoPago;
use softdin\servicio\Libreria;

$fallos = [];
$total = 0;

function comprobar(string $que, mixed $esperado, mixed $obtenido): void
{
    global $fallos, $total;
    $total++;
    if ($esperado === $obtenido) {
        return;
    }
    $fallos[] = sprintf(
        '  %s: se esperaba %s y se obtuvo %s',
        $que,
        var_export($esperado, true),
        var_export($obtenido, true)
    );
}

// --- Calendario comercial de 360 dias -------------------------------------
$eneroIni = new DateTime('2026-01-01');
$eneroFin = new DateTime('2026-01-31');

comprobar(
    'contarDias enero completo, COMERCIAL (mes de 30)',
    30,
    Libreria::contarDias($eneroIni, $eneroFin, $eneroIni, $eneroFin, EnumTipoPago::COMERCIAL)
);
comprobar(
    'contarDias desde el 16, COMERCIAL',
    15,
    Libreria::contarDias($eneroIni, $eneroFin, new DateTime('2026-01-16'), $eneroFin, EnumTipoPago::COMERCIAL)
);
comprobar(
    'contarDias acepta el enum como entero',
    30,
    Libreria::contarDias($eneroIni, $eneroFin, $eneroIni, $eneroFin, EnumTipoPago::COMERCIAL->value)
);
comprobar('totalDias de enero son los del calendario', 31, Libreria::totalDias($eneroIni, $eneroFin));

$febIni = new DateTime('2026-02-01');
$febFin = new DateTime('2026-02-28');
comprobar(
    'contarDias febrero completo, COMERCIAL (se completa a 30)',
    30,
    Libreria::contarDias($febIni, $febFin, $febIni, $febFin, EnumTipoPago::COMERCIAL)
);

// --- Enums que derivan su descripcion de otro enum mas grande -------------
$derivados = [
    'EnumTipoHora' => [EnumTipoHora::class, 9],
    'EnumNE_TipoHora' => [EnumNE_TipoHora::class, 7],
    'EnumIncapacidades' => [EnumIncapacidades::class, 3],
];

foreach ($derivados as $corto => [$clase, $cuantos]) {
    $todos = $clase::getAll();
    comprobar("{$corto}::getAll() devuelve todas sus entradas", $cuantos, count($todos));

    $sinDescripcion = 0;
    foreach ($todos as $entrada) {
        if (($entrada['description'] ?? '') === '') {
            $sinDescripcion++;
        }
    }
    comprobar("{$corto} resuelve la description de todas", 0, $sinDescripcion);
}

comprobar(
    'EnumTipoHora::getById devuelve el code correcto',
    'RNDF',
    EnumTipoHora::getById(EnumTipoHora::RNDF)['code'] ?? null
);

// --- Resultado ------------------------------------------------------------
if ($fallos !== []) {
    fwrite(STDERR, sprintf("%d de %d comprobaciones fallaron:\n", count($fallos), $total));
    fwrite(STDERR, implode("\n", $fallos) . "\n");
    exit(1);
}

printf("%d comprobaciones de comportamiento correctas.\n", $total);
