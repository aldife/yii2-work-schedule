<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'name'=>'KERJA',
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    //'bootstrap' => ['log'],
    'defaultRoute' => 'kerja/kerja',
    
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\Controller',
            'access' => ['@'],  
            'disabledCommands' => ['netmount'],  
            'roots' => [
                [
                    'baseUrl'=>'@web',
                    'basePath'=>'@webroot',
                    'path' => 'uploads/content',
                    'name' => 'Home'
                ],
                //[
                //    'class' => 'mihaildev\elfinder\UserPath',
                //    'path'  => 'files/user_{id}',
                //    'name'  => 'My Documents'
                //],
                //[
                //    'path' => 'files/some',
                //    'name' => ['category' => 'my','message' => 'Some Name'] //??????? Yii::t($category, $message)
                //],
                //[
                //    'path'   => 'files/some',
                //    'name'   => ['category' => 'my','message' => 'Some Name'], // Yii::t($category, $message)
                //    'access' => ['read' => '*', 'write' => 'UserFilesAccess'] // * - ??? ????, ????? ???????? ??????? ? ??????? ??????? ??? ????? ????? ? ????????????? ????? ???????????? ?????? ? ??????? UserFilesAccess
                //]
            ],
            //'watermark' => [
            //        'source'         => __DIR__.'/logo.png', // Path to Water mark image
            //         'marginRight'    => 5,          // Margin right pixel
            //         'marginBottom'   => 5,          // Margin bottom pixel
            //         'quality'        => 95,         // JPEG image save quality
            //         'transparency'   => 70,         // Water mark image transparency ( other than PNG )
            //         'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats ( bit-field )
            //         'targetMinPixel' => 200         // Target image minimum pixel size
            //]
        ]
    ],
    'components' => [
      
        'devicedetect' => [
            'class' => '\alexandernst\devicedetect\DeviceDetect'
        ],

       'urlManager' => [
            'class' => 'yii\web\UrlManager', 
            'enablePrettyUrl' => true,
             //'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule',
                 'controller' => ['service/dokter','service/chat'],

                 
                ],

            ],
        ],

       // 'redis' => [
       //      'class' => 'yii\redis\Connection',
       //      'hostname' => 'localhost',
       //      'port' => 6379,
       //      'database' => 0,
       //  ],

        
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-purple',
                ],
                // 'edgardmessias\assets\nprogress\NProgressAsset' => [
                //     'configuration' => [
                //         'minimum' => 0.5,
                //         'showSpinner' => true,
                //     ],
                //     'page_loading' => false,
                //     'pjax_events' => true,
                //     'jquery_ajax_events' => true,
                // ],
            ],
        ],
        
        // 'mongodb' => [
        //     'class' => '\yii\mongodb\Connection',
        //     'dsn' => 'mongodb://admin:admin@localhost:27017/neo',
        // ],
        
        //'user' => [
        //    'identityClass' => 'app\models\User',
        //       //'enableAutoLogin' => true,
        //],
        'mailer' => [
           'class' => 'yii\swiftmailer\Mailer',
           'useFileTransport' => true,
           'messageConfig' => [
               'from' => [$params['adminEmail'] => 'PT SIMA'], // this is needed for sending emails
               'charset' => 'UTF-8',
           ]
        ],
        
        'authClientCollection' => [
            'class' => yii\authclient\Collection::className(),
            'clients' => [
                //'facebook' => [
                //    'class'        => 'dektrium\user\clients\Facebook',
                //    'clientId'     => 'CLIENT_ID',
                //    'clientSecret' => 'CLIENT_SECRET',
                //],
                //'twitter' => [
                //    'class'          => 'dektrium\user\clients\Twitter',
                //    'consumerKey'    => 'CONSUMER_KEY',
                //    'consumerSecret' => 'CONSUMER_SECRET',
                //],
                //'google' => [
                //    'class'        => 'dektrium\user\clients\Google',
                //    'clientId'     => 'CLIENT_ID',
                //    'clientSecret' => 'CLIENT_SECRET',
                //],
            ],
        ],
        
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'neo',
            // 'parsers' => [
            //     'application/json' => 'yii\web\JsonParser',
            // ],
        ], 
      
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
       
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user'
                ],
            ], 
        ],
         
        
    ],
    'modules' => [
         'dynagrid'=> [
            'class'=>'\kartik\dynagrid\Module',
            'defaultPageSize'=>30,
            'dynaGridOptions'=>[
                  
                'theme'=>'panel-default',
                'toggleButtonGrid'=>['label'=>'<i class="fa fa-gear"></i> <span class=" hidden-xs">Custom Tabel</span>'],
                'toggleButtonFilter'=>['label'=>'<i class="fa fa-filter"></i> <span class=" hidden-xs">Filter</span>'],
                'toggleButtonSort'=>['label'=>'<i class="fa fa-sort"></i> <span class=" hidden-xs">Urutan</span>'],
                'gridOptions'=>[  
                    //'containerOptions'=>['class'=>'table-responsive'], // only set when $responsive = false
                    'floatHeader'=>false,
                    'pjax'=>true, 
                    'hover'=>true,
                    'responsive'=>true,
                    'responsiveWrap'=>false,
                    'resizableColumns'=>true, 
                    'striped'=>false,
                    'export'=>['label'=>'<span class=" hidden-xs">Export</span>'],
                    'toggleDataOptions' => [
                        'all' => [
                            'icon' => 'resize-full',
                            'label' => Yii::t('app', '<span class=" hidden-xs"> Tampilkan Semua </span>'),
                            'class' => 'btn btn-default',
                            'title' => 'Tampilkan Semua'
                        ],
                        'page' => [
                            'icon' => 'resize-small',
                            'label' => Yii::t('app', '<span class=" hidden-xs">  Tampilkan Perhalaman </span>'),
                            'class' => 'btn btn-default',
                            'title' => 'Tampilkan Perhalaman'
                        ],
                    ],
                    'panel'=>[
                       'heading'=>'<b>Kelola Data</b>',
                       'before'=>'{dynagrid} {dynagridFilter} {dynagridSort}'
                    ],
                    //untuk aktifkan context menu (klik kanan keluar menu)
                    'rowOptions' => function($model, $key, $index, $gird){
                             $contextMenuId = $gird->columns[0]->contextMenuId;
                             return ['data'=>[ 'toggle' => 'context','target'=> "#".$contextMenuId ]];
                    },
                ],
                'storage'=>\kartik\dynagrid\DynaGrid::TYPE_DB,
                'columns' => [
                    [
                     'class' => \liyunfang\contextmenu\KartikSerialColumn::className(),
                    'order'=>\kartik\dynagrid\DynaGrid::ORDER_FIX_LEFT,
                    'contextMenu' => true,
                     'contentOptions'=>['class'=>'kartik-sheet-style'],
                     'headerOptions'=>['class'=>'kartik-sheet-style'],
                    ], 

                       
                    // ['class'=>'kartik\grid\SerialColumn',
                    //  'order'=>\kartik\dynagrid\DynaGrid::ORDER_FIX_LEFT], 
                     
                    
                 
                    
                ],

            ]
            // other module settings
        ], 
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to  
            // use your own export download action or custom translation 
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ],
        'datecontrol' =>  [
            'class' => 'kartik\datecontrol\Module',
 
            // format settings for displaying each date attribute
            'displaySettings' => [
                'date' => 'd-m-Y',
                'time' => 'H:i:s A',
                'datetime' => 'd-m-Y H:i:s A',
            ],
 
            // format settings for saving each date attribute
            'saveSettings' => [
                'date' => 'Y-m-d', 
                'time' => 'H:i:s',
                'datetime' => 'Y-m-d H:i:s',
            ],
 
 
 
            // automatically use kartik\widgets for each of the above formats
            'autoWidget' => true,
 
        ],

        
        // MODUL USER DAN RBAC (DEKTRIUM)
        'rbac' => [
            'class' => 'dektrium\rbac\Module',
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => false,
            'enableConfirmation'=>false,
            'enableRegistration'=>false,
            'enablePasswordRecovery'=>false,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['aldi'],
            'mailer' => [
                'sender'                => 'no-reply@myhost.com', // or ['no-reply@myhost.com' => 'Sender name']
                'welcomeSubject'        => 'Welcome subject',
                'confirmationSubject'   => 'Confirmation subject',
                'reconfirmationSubject' => 'Email change subject',
                'recoverySubject'       => 'Recovery subject',
            ],
            'controllerMap' => [
                'login' => [
                    'class' => 'dektrium\user\controllers\LoginController',
                    'layout' => '@app/views/layouts/main-login',
                ],
                'registration' => [
                    'class' => 'dektrium\user\controllers\RegistrationController',
                    'layout' => '@app/views/layouts/main-login',
                ],
            ],

        ],
        ## MODUL DYNAMIC RELATION
        'dynamicrelations' => [
            'class' => '\synatree\dynamicrelations\Module'
        ],

        ## MODUL APLIKASI
        'kerja' => [
            'class' => 'app\modules\kerja\Module',
        ],
],
        
    'params' => $params,
    
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    // GII KRAJEE
    $config['modules']['gii']['class'] = 'yii\gii\Module'; 
    $config['modules']['gii']['generators'] = [
        'kartikgii-crud' => ['class' => 'warrence\kartikgii\crud\Generator'],
        'crud'   => [ 'class' => 'yii\gii\generators\crud\Generator',
                        'templates' => ['mycrud' => '@app/templates/crud']
                     ],
        'mongoDbModel' => ['class' => 'yii\mongodb\gii\model\Generator'],
    ];

    ## MONGODB GII
    // $config['bootstrap'][] = 'gii';
    // $config['modules']['gii'] =  ['class' => 'yii\gii\Module',
    //                                 'generators' => [
    //                                     'mongoDbModel' => [
    //                                         'class' => 'yii\mongodb\gii\model\Generator'
    //                                      ],
    //                                      'crud'   => [
    //                                         'class'     => 'yii\gii\generators\crud\Generator',
    //                                         'templates' => ['mycrud' => '@app/templates/crud']
    //                                     ]
    //                                 ],
    //                             ];
}

return $config;
