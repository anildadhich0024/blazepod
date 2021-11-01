<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3b8cb60fcb8d9859b8c5a667cfb621e8
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit3b8cb60fcb8d9859b8c5a667cfb621e8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3b8cb60fcb8d9859b8c5a667cfb621e8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3b8cb60fcb8d9859b8c5a667cfb621e8::$classMap;

        }, null, ClassLoader::class);
    }
}
