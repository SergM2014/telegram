<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit159186477adb3bfc3ebc5a9be428db36
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tests\\' => 6,
        ),
        'S' => 
        array (
            'Src\\' => 4,
            'SimpleTelegramBot\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tests\\' => 
        array (
            0 => __DIR__ . '/..' . '/tahrz/simple-telegram-bot/tests',
        ),
        'Src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'SimpleTelegramBot\\' => 
        array (
            0 => __DIR__ . '/..' . '/tahrz/simple-telegram-bot/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'SimpleTelegramBot\\Chat\\MessageHelper' => __DIR__ . '/..' . '/tahrz/simple-telegram-bot/src/Chat/MessageHelper.php',
        'SimpleTelegramBot\\Connection\\ConnectionService' => __DIR__ . '/..' . '/tahrz/simple-telegram-bot/src/Connection/ConnectionService.php',
        'SimpleTelegramBot\\Connection\\CurlConnectionService' => __DIR__ . '/..' . '/tahrz/simple-telegram-bot/src/Connection/CurlConnectionService.php',
        'SimpleTelegramBot\\Update\\GetUpdate' => __DIR__ . '/..' . '/tahrz/simple-telegram-bot/src/Update/GetUpdate.php',
        'SimpleTelegramBot\\Update\\GetUpdateHelper' => __DIR__ . '/..' . '/tahrz/simple-telegram-bot/src/Update/GetUpdateHelper.php',
        'SimpleTelegramBot\\Update\\WebhookConfigurationHelper' => __DIR__ . '/..' . '/tahrz/simple-telegram-bot/src/Update/WebhookConfigurationHelper.php',
        'SimpleTelegramBot\\Update\\WebhookGetUpdateHelper' => __DIR__ . '/..' . '/tahrz/simple-telegram-bot/src/Update/WebhookGetUpdateHelper.php',
        'Src\\Actions\\ActionsInterface' => __DIR__ . '/../..' . '/src/Actions/ActionsInterface.php',
        'Src\\Actions\\Me' => __DIR__ . '/../..' . '/src/Actions/Me.php',
        'Src\\Actions\\NotFound' => __DIR__ . '/../..' . '/src/Actions/NotFound.php',
        'Src\\Actions\\Save' => __DIR__ . '/../..' . '/src/Actions/Save.php',
        'Src\\Actions\\Start' => __DIR__ . '/../..' . '/src/Actions/Start.php',
        'Src\\DataBase' => __DIR__ . '/../..' . '/src/DataBase.php',
        'Src\\Fabric' => __DIR__ . '/../..' . '/src/Fabric.php',
        'Tests\\LibraryTestCase' => __DIR__ . '/..' . '/tahrz/simple-telegram-bot/tests/LibraryTestCase.php',
        'Tests\\Unit\\Chat\\MessageHelperTest' => __DIR__ . '/..' . '/tahrz/simple-telegram-bot/tests/Unit/Chat/MessageHelperTest.php',
        'Tests\\Unit\\Connection\\CurlConnectionServiceTest' => __DIR__ . '/..' . '/tahrz/simple-telegram-bot/tests/Unit/Connection/CurlConnectionServiceTest.php',
        'Tests\\Unit\\Update\\GetUpdateHelperTest' => __DIR__ . '/..' . '/tahrz/simple-telegram-bot/tests/Unit/Update/GetUpdateHelperTest.php',
        'Tests\\Unit\\Update\\WebhookConfigurationHelperTest' => __DIR__ . '/..' . '/tahrz/simple-telegram-bot/tests/Unit/Update/WebhookConfigurationHelperTest.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit159186477adb3bfc3ebc5a9be428db36::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit159186477adb3bfc3ebc5a9be428db36::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit159186477adb3bfc3ebc5a9be428db36::$classMap;

        }, null, ClassLoader::class);
    }
}