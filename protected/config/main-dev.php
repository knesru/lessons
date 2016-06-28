<?php
return CMap::mergeArray(
    require(dirname(__FILE__) . '/main.php'),
    array(
        'modules' => array(
            'gii' => array(
                'class' => 'system.gii.GiiModule',
                'password' => '123456',
                'generatorPaths' => array('bootstrap.gii'),
                // 'ipFilters'=>array(…список IP…),
                // 'newFileMode'=>0666,
                // 'newDirMode'=>0777,
            ),
        ),
        'components' => array(
            'urlManager' => array(
                'rules' => array(
                    'gii' => 'gii',
                    'gii/<controller:\w+>' => 'gii/<controller>',
                    'gii/<controller:\w+>/<action:\w+>' => 'gii/<controller>/<action>',
                ),
            ),
        ),
        
    )
);