<?php

declare(strict_types=1);

/**
 * Comprueba que cada archivo de `src/` declare el tipo que PSR-4 espera en esa ruta.
 *
 * Existe por un fallo real: `src/libreria.php` declaraba la clase `Libreria`, y PSR-4
 * busca `src/Libreria.php`. En Windows y macOS el sistema de archivos no distingue
 * mayusculas y no se nota; en Linux la clase no se encuentra y cualquier consumidor
 * muere con «Class not found». Un `php -l` no lo detecta: el archivo es
 * sintacticamente valido.
 */

require __DIR__ . '/../vendor/autoload.php';

const PREFIJO = 'softdin\\servicio\\';

$base = realpath(__DIR__ . '/../src');
$errores = [];
$total = 0;

$archivos = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($base, FilesystemIterator::SKIP_DOTS)
);

foreach ($archivos as $archivo) {
    if ($archivo->getExtension() !== 'php') {
        continue;
    }
    $total++;

    $relativo = substr($archivo->getPathname(), strlen($base) + 1);
    $sinExtension = substr($relativo, 0, -strlen('.php'));
    $fqcn = PREFIJO . str_replace(DIRECTORY_SEPARATOR, '\\', $sinExtension);

    if (
        ! class_exists($fqcn)
        && ! interface_exists($fqcn)
        && ! trait_exists($fqcn)
        && ! enum_exists($fqcn)
    ) {
        $errores[] = sprintf('  src/%s  no declara  %s', $relativo, $fqcn);
    }
}

if ($errores !== []) {
    fwrite(STDERR, sprintf("%d de %d archivos no se autocargan:\n", count($errores), $total));
    fwrite(STDERR, implode("\n", $errores) . "\n");
    exit(1);
}

printf("%d archivos de src/ se autocargan por su FQCN.\n", $total);
