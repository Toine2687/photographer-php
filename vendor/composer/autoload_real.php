<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit241f99e9b88dc956332d3abb18c52d73
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

        spl_autoload_register(array('ComposerAutoloaderInit241f99e9b88dc956332d3abb18c52d73', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit241f99e9b88dc956332d3abb18c52d73', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit241f99e9b88dc956332d3abb18c52d73::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
