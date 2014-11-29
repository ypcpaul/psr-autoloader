<?php
include __DIR__ . '/../src/psr0autoload.php';
class Psr0AutoloaderTest extends PHPUnit_Framework_TestCase
{
    public static function setupBeforeClass() 
    {
        mkdir(__DIR__ . '/sample1/sample2', 0777, true);
        $content = "<?php
        namespace sample1\sample2;
        
        class TestClass {
        public static function testFunctionPleaseDelete() { return true; }
        }
        ";
        file_put_contents(__DIR__ . '/sample1/sample2/TestClass.php', $content);
    }

    public function testAutoload() 
    {
        ypcpaul\psrautoloader\psr0autoload(__DIR__);
        sample1\sample2\TestClass::testFunctionPleaseDelete();
        $this->assertTrue(class_exists('sample1\sample2\TestClass'));
    }

    public static function tearDownAfterClass() 
    {
        unlink(__DIR__ . '/sample1/sample2/TestClass.php');
        rmdir(__DIR__ . '/sample1/sample2/');
        rmdir(__DIR__ . '/sample1/');
    }
}
