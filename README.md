psr-autoloader
==============

Simple implementations of the PHP-FIG PSR 0 and PSR 4 autoloading standards


Use src/psr0autoload.php for PSR-0 autoloading.  User src/psr4autoload.php for PSR-4 autoloading.


###How to use
psr0autoload($basePath) where $basepath is the full path to the vendor directory or the directory where you want files to be autoloaded.

psr4autoload($prefix, $baseDirectory) where $prefix is the namespace prefix you want to register to be autoloaded, and $baseDirectory is the full path of the vendor directory or the directory where the specific namespace prefix' files are located.

