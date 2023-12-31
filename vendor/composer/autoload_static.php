<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit747d6aee5420e48791b23694f49249db
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit747d6aee5420e48791b23694f49249db::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit747d6aee5420e48791b23694f49249db::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit747d6aee5420e48791b23694f49249db::$classMap;

        }, null, ClassLoader::class);
    }
}
