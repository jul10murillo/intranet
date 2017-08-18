<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
) ;

return [
    'id'                  => 'app-frontend',
    'language'            => 'es',
    'basePath'            => dirname(__DIR__),
    'bootstrap'           => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components'          => [
        'assetManager'  => [
            'class'     => 'yii\web\AssetManager',
            'forceCopy' => YII_DEBUG,
        ],
        'request'      => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '1739523462',
            'csrfParam'           => '_frontendCSRF',
        ],
        'authManager'  => [
            'class' => 'yii\rbac\DbManagerFrontend',
        ],
        'user'         => [
            'identityClass'   => 'Edvlerblog\Adldap2\model\UserDbLdap',
            'enableAutoLogin' => true,
            'identityCookie'  => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session'      => [
            'name'     => 'PHPFRONTSESSID',
            'savePath' => sys_get_temp_dir(),
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'elasticsearch' => [
            'class' => 'yii\elasticsearch\Connection',
            'nodes' => [
                ['http_address' => '127.0.0.1:9200'],
            // configure more hosts if you have a cluster
            ],
        ]
    /*
      'urlManager' => [
      'enablePrettyUrl' => true,
      'showScriptName' => false,
      'rules' => [
      ],
      ],
     */
    ],
    'params'              => $params,
] ;
