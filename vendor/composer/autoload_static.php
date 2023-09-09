<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitac5d9bc57030db2b033698a217c0ff61
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitac5d9bc57030db2b033698a217c0ff61::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitac5d9bc57030db2b033698a217c0ff61::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitac5d9bc57030db2b033698a217c0ff61::$classMap;

        }, null, ClassLoader::class);
    }
}
