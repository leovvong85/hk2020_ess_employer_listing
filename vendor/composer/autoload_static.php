<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd7bb8f8e576641376921fa68c971cc5a
{
    public static $prefixLengthsPsr4 = array (
        'l' => 
        array (
            'leo\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'leo\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Smalot\\PdfParser\\' => 
            array (
                0 => __DIR__ . '/..' . '/smalot/pdfparser/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd7bb8f8e576641376921fa68c971cc5a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd7bb8f8e576641376921fa68c971cc5a::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitd7bb8f8e576641376921fa68c971cc5a::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}