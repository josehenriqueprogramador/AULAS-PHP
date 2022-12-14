<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInite6bc91fcf7f35c2080869d6d30b1eee7
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

        spl_autoload_register(array('ComposerAutoloaderInite6bc91fcf7f35c2080869d6d30b1eee7', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInite6bc91fcf7f35c2080869d6d30b1eee7', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInite6bc91fcf7f35c2080869d6d30b1eee7::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
