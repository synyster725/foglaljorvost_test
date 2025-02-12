<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit56b81b62ecca15961eb1d2992c500715
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

        spl_autoload_register(array('ComposerAutoloaderInit56b81b62ecca15961eb1d2992c500715', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit56b81b62ecca15961eb1d2992c500715', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit56b81b62ecca15961eb1d2992c500715::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
