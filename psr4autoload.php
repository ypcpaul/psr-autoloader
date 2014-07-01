<?php
namespace tunalaruan\psr;
/**
 * Simple autoloader function that conforms to PSR-4.
 *
 * Modified from https://github.com/php-fig/fig-standards/blob/master/accepted/
 * PSR-4-autoloader-examples.md 
 *
 * @author Paul Cayaco <mives29@gmail.com>
 * @param string $prefix namespace prefix (vendor\\subnamespace\\)
 * @param string $baseDirectory full path of the base directory 
 * for the provided prefix
 */
function psr4autoload($prefix, $baseDirectory) {
    spl_autoload_register(function ($class) use ($prefix, $baseDirectory) {
        $prefixLength = strlen($prefix);
        if(strncmp($prefix, $class, $prefixLength) !== 0) 
            return;

        $relativeClass = substr($class, $prefixLength);
        $file = $baseDirectory . str_replace('\\', DIRECTORY_SEPARATOR, $relativeClass) . '.php';

        if(file_exists($file))
            include $file;
    }); 
}
