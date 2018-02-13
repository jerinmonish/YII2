<?php

namespace frontend\controllers;


use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\Quiz;
use backend\models\Course;
use backend\models\SubCourse;
use yii\helpers\Url;

class QuizController extends \yii\web\Controller
{

	/**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index,view-quiz,view-quiz-all,get-prev,get-next'],
                'rules' => [
                    [
                        'actions' => ['index,view-quiz,view-quiz-all,get-prev,get-next'],
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
    	$getCourse = Course::find()->all();
    	if($getCourse){
    		//return $getCourse;
    		 return $this->render('course', [
            'course' => $getCourse,
        ]);
    	} else {
    		return false;
    	}
    }

    public function actionViewQuiz($id)
    {
    	$id = Yii::$app->Common->checkSecretUrlVerification($id);
    	//print($id);exit;
    	$getSubCourse = SubCourse::find()->where(['course_id' => $id])->all();
    	//echo '<pre>';print_r($getSubCourse);exit;
    	if($getSubCourse){
    	return $this->render('course', [
            'subcourse' => $getSubCourse,
            ]);
    	} else {
    		return false;
    	}
    }

    public function actionViewQuizAll($id,$sub_id)
    {
        $this->layout = 'page';
    	$c_id = Yii::$app->Common->checkSecretUrlVerification($id);
    	$sub_id = Yii::$app->Common->checkSecretUrlVerification($sub_id);
        //print_r($c_id.' '.$sub_id);exit;
    	$getQuiz = Quiz::find()->where(['courseId'=>$c_id,'topicId' => $sub_id])->all();
    	//echo '<pre>'; print_r($getQuiz);exit;
        if(!$getQuiz){
            //echo 'out';exit;
            return $this->render('quizParticipate');
        } else {
            //echo 'in';exit;
        /*return $this->render('quizParticipate', [
            'quizItem' => $getQuiz,
            'a'=>$c_id,
            'b'=>$sub_id,
            ]);*/
            return $this->render('quizParticipate',array('quizItem' => $getQuiz, 'course_id' => $c_id,'sub_course_id'=>$sub_id));
        }
    }
    
    public function actionGetNext($id,$c_id,$sub_id) {
        //echo 'exit';exit;
        $this->layout = 'page';
        $c_id = Yii::$app->Common->checkSecretUrlVerification($c_id);
        $sub_id = Yii::$app->Common->checkSecretUrlVerification($sub_id);
        $id = Yii::$app->Common->checkSecretUrlVerification($id);
        //print_r($id.'/'.$c_id.'/'.$sub_id);exit;
        $next[] = Quiz::find()->where(['>', 'id', $id,])->andwhere(['courseId'=>$c_id,'topicId'=>$sub_id])->one();
        //echo '<pre>';print_r($next);exit;
        if(!empty($next[0])){
        /*return $this->render('quizParticipate', [
            'quizItem' => $next,
            ]);*/
            return $this->render('quizParticipate',array('quizItem' => $next, 'course_id' => $c_id,'sub_course_id'=>$sub_id));
        } else {
            //echo 'out';exit;
            //return $this->render('quizParticipate');
            Yii::$app->getSession()->setFlash('msg', Yii::t("app", 'quiz-attended-success'));
            return $this->redirect(['site/index']);
        }
    }

    public function actionGetPrev($id) {
        $id = Yii::$app->Common->checkSecretUrlVerification($id);
        $prev[] = Quiz::find()->where(['<', 'id', $id])->orderBy('id desc')->one();
        //print_r($prev);exit;
        if($prev){
        return $this->render('quizParticipate', [
            'quizItem' => $prev,
            ]);
        } else {
            //echo 'out';exit;
            return false;
        }
    }

}
