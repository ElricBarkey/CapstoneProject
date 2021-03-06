<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc2f9f0e31f0b9ccbe4889735fc748ca7
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Ilovepdf\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ilovepdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/ilovepdf/ilovepdf-php/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc2f9f0e31f0b9ccbe4889735fc748ca7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc2f9f0e31f0b9ccbe4889735fc748ca7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
