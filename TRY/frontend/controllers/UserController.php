<?php

namespace frontend\controllers;


use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\User;
use yii\helpers\Url;

use backend\models\Country;
use backend\models\State;
use backend\models\City;
use yii\web\UploadedFile;

class UserController extends \yii\web\Controller
{

	/**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['change-password','update-profile','view-profile'],
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
     * This method handles to disable csrf validation
     * * */
    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    /**
     * @inheritdoc
     */
    public function actions()
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
    }

    public function actionIndex()
    {
        return $this->redirect(['site/dashboard']);
    }

    public function actionChangePassword($id){
    	$id = Yii::$app->Common->checkSecretUrlVerification($id);
    	$model = $this->findModel($id);
        $model->scenario = 'change-password';

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $users = Yii::$app->request->post()['User']['oldPassword'];
            $curr_password = $model->password;
            $password = Yii::$app->Common->passwordHash($users);

            if($curr_password === $password) { 
                $usersPassword = Yii::$app->request->post()['User']['newPassword'];
                $newPassword = Yii::$app->Common->passwordHash($usersPassword);
                $model->password = $newPassword;
                if($model->save()) {
                    Yii::$app->getSession()->setFlash('msg', Yii::t("app", "change-password-success"));
                    return $this->redirect(Url::to(['user/change-password', 'id' => Yii::$app->Common->createSecretUrl($model->id)]));
                }
            }else{ 
                Yii::$app->getSession()->setFlash('msg', Yii::t("app", "change-password-error"));
            }
        } 
        return $this->render('change-password', ['model' => $model]);
    }

    public function actionUpdateProfile($id){
        $id = Yii::$app->Common->checkSecretUrlVerification($id);
        $model = $this->findModel($id);
        $model->scenario = 'profile-update';
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //echo '<pre>';print_r($_POST);exit;
            $postData =  Yii::$app->request->post()['User'];
            $model->username        = $postData['username'];
            $model->gender          = $postData['gender'];
            $model->dob             = Yii::$app->Common->mysqlDateTime($postData['dob']);
            $model->mobileNo        = $postData['mobileNo'];
            $model->profileStatus   = $postData['profileStatus'];
            $model->address         = $postData['address'];
            $model->country         = $postData['country'];
            $model->state           = $postData['state'];
            $model->city            = $postData['city'];
            $model->zip             = $postData['zip'];
            
            //$model->userImage       = $postData['userImage'];
            //print_r(Yii::$app->Common->mysqlDateTime($model->dob));exit;

            /* Update Profile Pic Starts */
            $oldProfilePhoto    =   $model->userImage;
            //print_r($oldProfilePhoto);exit;
            $existingProfile    =   $postData['existingImage'];

            if (Yii::$app->Common->commonUpload($model, \Yii::$app->params['PROFILE_UPLOAD_PATH'], 'userImage')) {
                Yii::$app->Common->unlinkExistedFile(\Yii::$app->params['PROFILE_UPLOAD_PATH'], $oldProfilePhoto);
                $profilePhoto = $model->userImage;
            } else {
                $profilePhoto = ($existingProfile) ? $existingProfile : '';
            }
            $model->userImage = $profilePhoto;
            /* Update Profile Pic Ends */

            if($model->save()){
                //echo '<pre>';print_r(Yii::$app->request->post());exit;
                echo 'saved';exit;
            } else {
                echo 'no able to save';exit;
            }
        } else {
            return $this->render('update-profile', ['model' => $model]);
        }
        return $this->render('update-profile', ['model' => $model]);
    }

    public function actionViewProfile($id){
        $id = Yii::$app->Common->checkSecretUrlVerification($id);
        $model = $this->findModel($id);
        //echo '<pre>';print_r($model);
        if($model){
            return $this->render('view-profile', [
            'model' => $model,
            ]);
        } else {
            return false;
        }
    }

    public function actionGetState($id){
        $rows = State::find()->where(['country_id' => $id])->orderBy('name')->all();
        if ($rows) {
            $result = '<option value="">Select</option>';
            foreach ($rows as $value) {
                $result .= '<option value="' . $value->id . '"';
                $result .= '>' . $value->name . '</option>';
            }
            echo $result;
        } else {
            echo '<option value="">Select</option>';
        }
    }

    public function actionGetCity($id){
        $rows = City::find()->where(['state_id' => $id])->orderBy('name')->all();
        if ($rows) {
            $result = '<option value="">Select</option>';
            foreach ($rows as $value) {
                $result .= '<option value="' . $value->id . '"';
                $result .= '>' . $value->name . '</option>';
            }
            echo $result;
        } else {
            echo '<option value="">Select</option>';
        }
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return UserGrid the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
