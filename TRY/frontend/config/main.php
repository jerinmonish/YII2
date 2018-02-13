<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'authTimeout'=> 1800, // 15 mins
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'view' => [
            'theme' => [
                'class' => 'yii\base\Theme',
                'basePath' => '@app/../themes/user/',
                'baseUrl' => '@web/themes/user/',
                'pathMap' => [
                    '@app/views' => '@app/../themes/user/'
                ]
            ]
        ],
        /*'urlManagerFrontEnd' => [
            'class' => 'yii\web\urlManager',
            //'baseUrl' => 'http://localhost/Jerin/yii/TRY/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules'=>[
                /*'quiz/view-all-quiz/<id>/<id>'=>'quiz/view-all-quiz',
                'view/<id:\d+>' => 'post/view',*/
                /*'<module:news>/<action:\w+>' => '<module>/default/<action>',
                '<module:news>/<action:\w+>/<id:\d+>' => '<module>/default/<action>',
                '<module:posts>/<controller:\w+>' => '<module>/<controller>/index',
                '<module:posts>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

                //'quiz/view-all-quiz/<c_id>/<sub_id>' => 'site/jobs',
                //'quiz/view-all-quiz/<c_id>/<sub_id>' => 'post/view',
                'quiz/latest-members/<id>'=>'quiz/latest-members',
            ],
        ],*/
        

        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */

        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'enableStrictParsing' => true,
            'rules' => [
                /*'quiz/view-all-quiz/<id>/<id>'=>'quiz/view-all-quiz',
                'view/<id:\d+>' => 'post/view',*/
                '<module:news>/<action:\w+>' => '<module>/default/<action>',
                '<module:news>/<action:\w+>/<id:\d+>' => '<module>/default/<action>',
                '<module:posts>/<controller:\w+>' => '<module>/<controller>/index',
                '<module:posts>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

                'courses/<id>' => 'quiz/view-quiz',
                'show-quiz/<id>/<sub_id>'=>'quiz/view-quiz-all',
                'quiz-next/<id>/<c_id>/<sub_id>' => 'quiz/get-next',
                'quiz-previous/<id>' => 'quiz/get-prev',
                'change-password/<id>' => 'user/change-password',
                'update-profile/<id>' => 'user/update-profile',
                'view-profile/<id>' => 'user/view-profile',
                'print-certificate/<c_id>/<sub_id>'=>'quiz/print-certificate',
                'print-pdf/<course_id>/<topic_id>'=>'quiz/print-pdf',
                'album-images/<id>' => 'album-refrence/get-my-images',
            ],
        ],

        'authClientCollection' => [
          'class' => 'yii\authclient\Collection',
          'clients' => [
            'facebook' => [
              'class' => 'yii\authclient\clients\Facebook',
              'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',
              'clientId' => '1405714336210880',
              'clientSecret' => 'fbc24204416057cdcbe67d5afe512fad',
              'attributeNames' => ['name', 'email', 'first_name', 'last_name','picture','gender','locale','link','birthday'],
            ],
            'google' => [
                    'class' => 'yii\authclient\clients\Google',
                    'clientId' => '423936363157-93bqlicv8gm9ch4rf516avojntqisv02.apps.googleusercontent.com',
                    'clientSecret' => 'FnIxbyFsC-vxfX-r_1qNUWuU',
                ],
          ],
        ],
    ],
    'defaultRoute' => 'site/login',
    'params' => $params,
];
