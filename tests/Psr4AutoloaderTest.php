<?php
include __DIR__ . '/../src/psr4autoload.php';
class Psr4AutoloaderTest extends PHPUnit_Framework_TestCase
{
    public static function setupBeforeClass() 
    {
        $content = "<?php
        namespace sample1\sample2;
        
        class TestClass {
        public static function testFunctionPleaseDelete() { return true; }
        }
        ";
        file_put_contents(__DIR__ . '/TestClass.php', $content);
    }

    public function testAutoload() 
    {
        tunalaruan\psr\psr0autoload(__DIR__);
        sample1\sample2\TestClass::testFunctionPleaseDelete();
        $this->assertTrue(class_exists('sample1\sample2\TestClass'));
    }

    public static function tearDownAfterClass() 
    {
        unlink(__DIR__ . '/TestClass.php');
    }
}
