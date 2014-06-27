<?php
namespace tunalaruan\psr;

/**
 * Simple autoloader function that conforms to PSR-0
 *
 * @param string $basePath Directory containing the vendor packages to autoload
 */
function psr0autoload($basePath) {
    spl_autoload_register(function ($class) use ($basePath) {
        //remove trailing directory separator, if included.
        $basePath = str_replace(strrpos($basePath, DIRECTORY_SEPARATOR), '', $basePath);

        //convert namespaces to directories
        $separated = explode('\\', $class);
        $class = str_replace('_', DIRECTORY_SEPARATOR, end($separated));
        $separated[key($separated)] = $class;
        reset($separated);
        
        $file = $basePath . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $separated) . ".php";

        if(file_exists($file))
            include $file;
    });
}
