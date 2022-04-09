<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit3c7b4f5f1732b3e7cc0b2cd71a719367
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit3c7b4f5f1732b3e7cc0b2cd71a719367', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit3c7b4f5f1732b3e7cc0b2cd71a719367', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        \Composer\Autoload\ComposerStaticInit3c7b4f5f1732b3e7cc0b2cd71a719367::getInitializer($loader)();

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInit3c7b4f5f1732b3e7cc0b2cd71a719367::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequire3c7b4f5f1732b3e7cc0b2cd71a719367($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequire3c7b4f5f1732b3e7cc0b2cd71a719367($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}