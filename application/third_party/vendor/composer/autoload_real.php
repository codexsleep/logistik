<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit37b12bd8e3a41a78ce99d1eeea2bfd9a
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

        spl_autoload_register(array('ComposerAutoloaderInit37b12bd8e3a41a78ce99d1eeea2bfd9a', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit37b12bd8e3a41a78ce99d1eeea2bfd9a', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit37b12bd8e3a41a78ce99d1eeea2bfd9a::getInitializer($loader));

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInit37b12bd8e3a41a78ce99d1eeea2bfd9a::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequire37b12bd8e3a41a78ce99d1eeea2bfd9a($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequire37b12bd8e3a41a78ce99d1eeea2bfd9a($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
