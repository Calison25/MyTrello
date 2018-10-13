<?php
namespace FluidTYPO3Fluid\Flux\Tests\Unit\View;

/*
 * This file belongs to the package "TYPO3 Fluid".
 * See LICENSE.txt that was shipped with this package.
 */

use TYPO3Fluid\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3Fluid\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Tests\BaseTestCase;
use TYPO3Fluid\Fluid\View\Exception\InvalidTemplateResourceException;
use TYPO3Fluid\Fluid\View\TemplatePaths;

/**
 * Class TemplatePathsTest
 */
class TemplatePathsTest extends BaseTestCase
{

    /**
     * @param string|array $input
     * @param string|array $expected
     * @test
     * @dataProvider getSanitizePathTestValues
     */
    public function testSanitizePath($input, $expected)
    {
        $instance = new TemplatePaths();
        $method = new \ReflectionMethod($instance, 'sanitizePath');
        $method->setAccessible(true);
        $output = $method->invokeArgs($instance, [$input]);
        $this->assertEquals($expected, $output);
    }

    /**
     * @return array
     */
    public function getSanitizePathTestValues()
    {
        return [
            ['', ''],
            ['/foo/bar/baz', '/foo/bar/baz'],
            ['C:\\foo\\bar\baz', 'C:/foo/bar/baz'],
            [__FILE__, strtr(__FILE__, '\\', '/')],
            [__DIR__, strtr(__DIR__, '\\', '/') . '/'],
            ['composer.json', strtr(getcwd(), '\\', '/') . '/composer.json'],
            ['php://stdin', 'php://stdin']
        ];
    }

    /**
     * @param string|array $input
     * @param string|array $expected
     * @test
     * @dataProvider getSanitizePathsTestValues
     */
    public function testSanitizePaths($input, $expected)
    {
        $instance = new TemplatePaths();
        $method = new \ReflectionMethod($instance, 'sanitizePaths');
        $method->setAccessible(true);
        $output = $method->invokeArgs($instance, [$input]);
        $this->assertEquals($expected, $output);
    }

    /**
     * @return array
     */
    public function getSanitizePathsTestValues()
    {
        return [
            [['/foo/bar/baz', 'C:\\foo\\bar\\baz'], ['/foo/bar/baz', 'C:/foo/bar/baz']],
            [[__FILE__, __DIR__], [strtr(__FILE__, '\\', '/'), strtr(__DIR__, '\\', '/') . '/']],
            [['', 'composer.json'], ['', strtr(getcwd(), '\\', '/') . '/composer.json']],
        ];
    }

    /**
     * @test
     */
    public function setsLayoutPathAndFilename()
    {
        $instance = $this->getMock(TemplatePaths::class, ['sanitizePath']);
        $instance->expects($this->any())->method('sanitizePath')->willReturnArgument(0);
        $instance->setLayoutPathAndFilename('foobar');
        $this->assertAttributeEquals('foobar', 'layoutPathAndFilename', $instance);
    }

    /**
     * @test
     */
    public function setsTemplatePathAndFilename()
    {
        $instance = $this->getMock(TemplatePaths::class, ['sanitizePath']);
        $instance->expects($this->any())->method('sanitizePath')->willReturnArgument(0);
        $instance->setTemplatePathAndFilename('foobar');
        $this->assertAttributeEquals('foobar', 'templatePathAndFilename', $instance);
    }

    /**
     * @dataProvider getGetterAndSetterTestValues
     * @param string $property
     * @param mixed $value
     */
    public function testGetterAndSetter($property, $value)
    {
        $getter = 'get' . ucfirst($property);
        $setter = 'set' . ucfirst($property);
        $instance = $this->getMock(TemplatePaths::class, ['sanitizePath']);
        $instance->expects($this->any())->method('sanitizePath')->willReturnArgument(0);
        $instance->$setter($value);
        $this->assertEquals($value, $instance->$getter());
    }

    /**
     * @return array
     */
    public function getGetterAndSetterTestValues()
    {
        return [
            ['layoutRootPaths', ['foo' => 'bar']],
            ['templateRootPaths', ['foo' => 'bar']],
            ['partialRootPaths', ['foo' => 'bar']]
        ];
    }

    /**
     * @return void
     */
    public function testFillByPackageName()
    {
        $instance = new TemplatePaths('FluidTYPO3.Flux');
        $this->assertNotEmpty($instance->getTemplateRootPaths());
    }

    /**
     * @return void
     */
    public function testFillByConfigurationArray()
    {
        $instance = new TemplatePaths([
            TemplatePaths::CONFIG_TEMPLATEROOTPATHS => ['Resources/Private/Templates/'],
            TemplatePaths::CONFIG_LAYOUTROOTPATHS => ['Resources/Private/Layouts/'],
            TemplatePaths::CONFIG_PARTIALROOTPATHS => ['Resources/Private/Partials/'],
            TemplatePaths::CONFIG_FORMAT => 'xml'
        ]);
        $this->assertNotEmpty($instance->getTemplateRootPaths());
    }

    /**
     * @dataProvider getResolveFilesMethodTestValues
     * @param string $method
     */
    public function testResolveFilesMethodCallsResolveFilesInFolders($method, $pathsMethod)
    {
        $instance = $this->getMock(TemplatePaths::class, ['resolveFilesInFolders']);
        $instance->$pathsMethod(['foo']);
        $instance->expects($this->once())->method('resolveFilesInFolders')->with($this->anything(), 'format');
        $instance->$method('format', 'format');
    }

    /**
     * @return array
     */
    public function getResolveFilesMethodTestValues()
    {
        return [
            ['resolveAvailableTemplateFiles', 'setTemplateRootPaths'],
            ['resolveAvailablePartialFiles', 'setPartialRootPaths'],
            ['resolveAvailableLayoutFiles', 'setLayoutRootPaths']
        ];
    }

    /**
     * @return void
     */
    public function testToArray()
    {
        $instance = $this->getMock(TemplatePaths::class, ['sanitizePath']);
        $instance->expects($this->any())->method('sanitizePath')->willReturnArgument(0);
        $instance->setTemplateRootPaths(['1']);
        $instance->setLayoutRootPaths(['2']);
        $instance->setPartialRootPaths(['3']);
        $result = $instance->toArray();
        $expected = [
            TemplatePaths::CONFIG_TEMPLATEROOTPATHS => [1],
            TemplatePaths::CONFIG_LAYOUTROOTPATHS => [2],
            TemplatePaths::CONFIG_PARTIALROOTPATHS => [3]
        ];
        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function testResolveFilesInFolders()
    {
        $instance = new TemplatePaths();
        $method = new \ReflectionMethod($instance, 'resolveFilesInFolders');
        $method->setAccessible(true);
        $result = $method->invokeArgs(
            $instance,
            [['examples/Resources/Private/Layouts/', 'examples/Resources/Private/Templates/Default/'], 'html']
        );
        $this->assertEquals(
            [
                'examples/Resources/Private/Layouts/Default.html',
                'examples/Resources/Private/Layouts/Dynamic.html',
                'examples/Resources/Private/Templates/Default/Default.html',
            ],
            $result
        );
    }

    /**
     * @test
     */
    public function testGetTemplateSourceThrowsExceptionIfFileNotFound()
    {
        $instance = new TemplatePaths();
        $this->setExpectedException(InvalidTemplateResourceException::class);
        $instance->getTemplateSource();
    }

    /**
     * @test
     */
    public function testGetTemplateSourceReadsStreamWrappers()
    {
        $fixture = __DIR__ . '/Fixtures/LayoutFixture.html';
        $instance = new TemplatePaths();
        $stream = fopen($fixture, 'r');
        $instance->setTemplateSource($stream);
        $this->assertEquals(stream_get_contents($stream), $instance->getTemplateSource());
        fclose($stream);
    }

    /**
     * @test
     */
    public function testResolveFileInPathsThrowsExceptionIfFileNotFound()
    {
        $instance = new TemplatePaths();
        $method = new \ReflectionMethod($instance, 'resolveFileInPaths');
        $method->setAccessible(true);
        $this->setExpectedException(InvalidTemplateResourceException::class);
        $method->invokeArgs($instance, [['/not/', '/found/'], 'notfound.html']);
    }

    /**
     * @test
     */
    public function testGetTemplateIdentifierReturnsSourceChecksumWithControllerAndActionAndFormat()
    {
        $instance = new TemplatePaths();
        $instance->setTemplateSource('foobar');
        $this->assertEquals('source_8843d7f92416211de9ebb963ff4ce28125932878_DummyController_dummyAction_html', $instance->getTemplateIdentifier('DummyController', 'dummyAction'));
    }
}
