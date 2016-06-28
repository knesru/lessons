<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Console Application',
    'components' => array(
        'db' => array(
            'connectionString' => 'mysql:host=easycs.dev;dbname=lessons',
            'emulatePrepare' => true,
            'username' => 'mysql',
            'password' => 'mysql',
            'charset' => 'utf8',
            'tablePrefix' => '',
        ),
    ),
    'commandMap'=>array(
        'migrate'=>array(
            'class'=>'system.cli.commands.MigrateCommand',
            'migrationPath'=>'application.migrations',
            'migrationTable'=>'tbl_migration',
            'connectionID'=>'db',
        ),
    ),
);