<?php
namespace frontend\controllers;

use Facebook\Facebook; 
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\User;
use yii\helpers\Url;

//require_once 'src/Facebook/autoload.php';
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup','dashboard'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        //'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post','get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
   /* public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }*/
    public function actions() {
      return [
        'auth' => [
          'class' => 'yii\authclient\AuthAction',
          'successCallback' => [$this, 'oAuthSuccess'],
        ],
      ];
    }

    /**
    * This function will be triggered when user is successfuly authenticated using some oAuth client.
    *
    * @param yii\authclient\ClientInterface $client
    * @return boolean|yii\web\Response
    */
    public function oAuthSuccess($client) {
      // get user data from client
      $userAttributes = $client->getUserAttributes();
      $url = $client->authUrl;
      //print_r($url);exit;
      // do some thing with user data. for example with $userAttributes['email']
      if($url == 'https://www.facebook.com/dialog/oauth?display=popup'){
         $this->facebookLogin($userAttributes);
        //echo '<pre>';print_r($userAttributes);exit;
       } else if ($url == 'https://accounts.google.com/o/oauth2/auth') {
            $this->googleLogin($userAttributes);
        }
    }

    public function googleLogin($clientData){
      echo '<pre>';print_r($clientData);exit;
    }

  
    public function facebookLogin($data) {
      $session = Yii::$app->session;
        $model = new User();
       // $model->scenario = "registerviasocialNetwork";
        $email = $data['email'];
        
        $login_details = User::find()->where('(email=:email)', [':email' => $email])->one();
        //print_r($login_details);exit;
        if (!empty($login_details)) {
            $session->set('user_id', $login_details->id);
            Yii::$app->user->login($login_details);
            return $this->redirect(['site/dashboard']);
        } else {
            $dateTime = Yii::$app->Common->mysqlDateTime();
            $model->created_at = $dateTime;
            $model->created_at = $dateTime;
            $model->loggedStatus = 'Active';
            $model->email = $email;
            $model->user_type = 'user';
            $model->username = 'FD';
            $model->status = 'Active';
            if ($model->save()) {
                
                $session->set('user_id', $model->id);
               return $this->redirect(['site/dashboard']);
            } else {
              print_r($model->getErrors()); exit;   
                 //Yii::$app->Common->redirect(Url::toRoute(['site/information']));
            }
        }
    }
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        //return $this->render('index');
        if(Yii::$app->user->isGuest){ 
            //return $this->render('index');
            //echo 'in';exit;
            return $this->goHome();
        }else{
            //echo 'out';exit;
            return $this->render('dashboard');
        }
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionDashboard()
    {
        //$this->layout = 'home';
        return $this->render('dashboard');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        //echo 'in';exit;
        $this->layout = 'login';

        if (!Yii::$app->user->isGuest) {
            //echo 'in';exit;  
            //return $this->goHome();
            return $this->redirect(['site/dashboard']);
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //return $this->goBack();
            //return $this->render('dashboard');
            //echo 'in';exit;  
            $changeStatus = Yii::$app->Common->changeLoginInStatus(Yii::$app->user->identity->id);
            Yii::$app->getSession()->setFlash('msg', Yii::t("app", 'login-success'));
            return $this->redirect(['site/dashboard']);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        $changeStatus = Yii::$app->Common->changeLoginOutStatus(Yii::$app->user->identity->id);
        Yii::$app->user->logout();
        Yii::$app->getSession()->setFlash('msg', Yii::t("app", 'logout-success'));
        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

}
