<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitef07a1b3908bf0a1fcf5cff008f2154c
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitef07a1b3908bf0a1fcf5cff008f2154c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitef07a1b3908bf0a1fcf5cff008f2154c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitef07a1b3908bf0a1fcf5cff008f2154c::$classMap;

        }, null, ClassLoader::class);
    }
}
