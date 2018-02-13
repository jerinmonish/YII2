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
                'only' => ['index','view-quiz','view-quiz-all','get-prev,get-next'],
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

    public function actionGetNext() {
        //echo '<pre>';print_r(Yii::$app->request->post());exit;
        $this->layout   = 'page';
        $c_id           = Yii::$app->Common->checkSecretUrlVerification(Yii::$app->request->post()['c_id']);
        $sub_id         = Yii::$app->Common->checkSecretUrlVerification(Yii::$app->request->post()['sub_id']);
        $id             = Yii::$app->Common->checkSecretUrlVerification(Yii::$app->request->post()['id']);
        $user_id        = Yii::$app->user->identity->id;        
        $answer         = Yii::$app->request->post()['ans'];
        $setJson[$id]   = $answer;//array($id=>$answer);
        $encodeQuiz     = json_encode($setJson);
        //echo '<pre>';print_r($answer.'/'.$id);exit;

        $next[] = Quiz::find()->where(['>', 'id', $id])->andwhere(['courseId'=>$c_id,'topicId'=>$sub_id])->one();
        //echo '<pre>';print_r($next);exit;
        if(!empty($next[0])){
            if(Yii::$app->request->post()){
                $get_already = Yii::$app->Common->checkAttendedQuiz($c_id,$sub_id,$user_id);
                //print_r($get_already);exit;
                if($get_already){
                    //echo 'update';exit;
                    //print_r($get_already['quiz_items']);exit;
                    $set_quiz = json_decode($get_already['quiz_items'],true);
                    //print_r($set_quiz); print_r($setJson); print_r(array_combine($setJson,$set_quiz));exit;
                    //$merge_quiz = array_combine($setJson,$set_quiz);
                    $merge_quiz = $setJson + $set_quiz;
                    $update_encode = json_encode($merge_quiz);

                    //Update quiz items
                    $update_query = Yii::$app->db->createCommand()->update('quiz_temp', ['quiz_items' => $update_encode], 'id = '.$get_already['id'].' ')->execute();
                } else {
                    //echo 'insert';exit;
                    $new_query = Yii::$app->db->createCommand()->insert('quiz_temp', [ 'user_id'=>$user_id,'c_id' => $c_id,'sub_id' =>  $sub_id,'quiz_items'=>$encodeQuiz])->execute();
                }
            }//exit;
            return $this->render('quizParticipate',array('quizItem' => $next, 'course_id' => $c_id,'sub_course_id'=>$sub_id));
        } else {
            //print_r($c_id);exit;
            $update_completed = Yii::$app->Common->checkAttendedQuiz($c_id,$sub_id,$user_id);
            if($update_completed){
                $update_query_completed = Yii::$app->db->createCommand()->update('quiz_temp', ['quiz_status' => 'Completed'], 'id = '.$update_completed['id'].' ')->execute();
            }
            //To set the result;
            /*$check_completed_data = Yii::$app->db->createCommand('SELECT * FROM quiz_temp WHERE user_id='.$user_id.' AND c_id='.$c_id.' AND sub_id ='.$sub_id)-> queryOne();
            if($check_completed_data){
                $i = 0; 
                $sum = 0;
                $quiz_ans = json_decode($check_completed_data['quiz_items'],true);
                //print_r($quiz_ans);exit;
                foreach ($quiz_ans as$key => $check_ans) {
                    $check_quiz_data = Yii::$app->db->createCommand('SELECT * FROM quiz WHERE id='.$key.' AND answer="'.$check_ans.'"')-> queryOne();
                    //echo '<pre>';print_r($check_quiz_data);
                    $i = $i+1;
                    if($check_quiz_data){
                        $sum = $sum+1;
                        //die('in');
                        //$question = $check_ans[number];
                    }
                    //$question = $all_questions++;
                    //$sum = $sum+$check_quiz_data;
                    
                } 
                echo '<pre>';print_r($i);
                exit;
            }*/
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
