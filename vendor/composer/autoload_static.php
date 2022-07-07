<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb8cc5eecf6d8f6f7c17ba3be8e0f4f4f
{
    public static $files = array (
        '11fb49c61f69308d35f678d703110b38' => __DIR__ . '/..' . '/php-quickorm/captcha/Captcha.php',
        '1cfd2761b63b0a29ed23657ea394cb2d' => __DIR__ . '/..' . '/topthink/think-captcha/src/helper.php',
    );

    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'think\\composer\\' => 15,
            'think\\captcha\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'think\\composer\\' => 
        array (
            0 => __DIR__ . '/..' . '/topthink/think-installer/src',
        ),
        'think\\captcha\\' => 
        array (
            0 => __DIR__ . '/..' . '/topthink/think-captcha/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb8cc5eecf6d8f6f7c17ba3be8e0f4f4f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb8cc5eecf6d8f6f7c17ba3be8e0f4f4f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb8cc5eecf6d8f6f7c17ba3be8e0f4f4f::$classMap;

        }, null, ClassLoader::class);
    }
}
