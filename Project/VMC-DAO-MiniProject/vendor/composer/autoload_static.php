<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb847daf717cfb48e70108170ac94d173
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitb847daf717cfb48e70108170ac94d173::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb847daf717cfb48e70108170ac94d173::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb847daf717cfb48e70108170ac94d173::$classMap;

        }, null, ClassLoader::class);
    }
}
