<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\helpers\Url;
use backend\models\SubCourse;

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
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','get-sub-course'],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('dashboard');
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionDashboard()
    {
        return $this->render('dashboard');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->loginAdmin()) {
            //return $this->goBack();
            //return $this->redirect(['site/dashboard']);
            $changeStatus = Yii::$app->Common->changeLoginInStatus(Yii::$app->user->identity->id);
            Yii::$app->getSession()->setFlash('msg', Yii::t("app", 'login-success'));
            $this->layout = 'main';
            return $this->render('dashboard');
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        $changeStatus = Yii::$app->Common->changeLoginOutStatus(Yii::$app->user->identity->id);
        Yii::$app->user->logout();
        Yii::$app->getSession()->setFlash('msg', Yii::t("app", 'logout-success'));
        return $this->goHome();
    }

    /**
     * Returns subcourse based on course id.
     *
     * @return string
     */
    public function actionGetSubCourse($id)
    {
      $rows = SubCourse::find()->where(['course_id' => $id])->orderBy('title')->all();
      $subCourses = Yii::$app->Common->allDrops($rows);
      return $subCourses;
    }
}
