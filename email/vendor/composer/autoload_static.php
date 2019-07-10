<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcc682a9aca2cf0600aed7919fd7eba35
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcc682a9aca2cf0600aed7919fd7eba35::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcc682a9aca2cf0600aed7919fd7eba35::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}