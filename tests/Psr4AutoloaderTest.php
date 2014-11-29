<?php
include __DIR__ . '/../src/psr4autoload.php';
class Psr4AutoloaderTest extends PHPUnit_Framework_TestCase
{
    public static function setupBeforeClass() 
    {
        $content = "<?php
        namespace subdirnamespace1\subdirnamespace2;
        
        class TestClass {
        public static function testFunctionPleaseDelete() { return true; }
        }
        ";
        mkdir(__DIR__ . "/subdir1/", 0777, true);
        file_put_contents(__DIR__ . '/subdir1/TestClass.php', $content);
    }

    public function testAutoload() 
    {
        \ypcpaul\psrautoloader\psr4autoload("subdirnamespace1\subdirnamespace2", __DIR__ . "/subdir1");
        try {
            \subdirnamespace1\subdirnamespace2\TestClass::testFunctionPleaseDelete();
        } catch (Exception $e) {
            $this->fail("Failure to autoload");
        }
        $this->assertTrue(class_exists('subdirnamespace1\subdirnamespace2\TestClass'));
    }

    public static function tearDownAfterClass() 
    {
        unlink(__DIR__ . '/subdir1/TestClass.php');
        rmdir(__DIR__ . '/subdir1');
    }
}
