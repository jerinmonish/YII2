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
use kartik\mpdf\Pdf;



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
                'only' => ['index','view-quiz','view-quiz-all','get-prev,get-next,print-certificate'],
                'rules' => [
                    [
                        'actions' => ['index,view-quiz,view-quiz-all,get-prev,get-next,print-certificate'],
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
            //To update last question due to array [0]
            if(Yii::$app->request->post()){
                $get_already = Yii::$app->Common->checkAttendedQuiz($c_id,$sub_id,$user_id);
                if($get_already){
                    $set_quiz = json_decode($get_already['quiz_items'],true);
                    $merge_quiz = $setJson + $set_quiz;
                    $update_encode = json_encode($merge_quiz);

                    //Update quiz items
                    $update_query = Yii::$app->db->createCommand()->update('quiz_temp', ['quiz_items' => $update_encode], 'id = '.$get_already['id'].' ')->execute();
                } else {
                    $new_query = Yii::$app->db->createCommand()->insert('quiz_temp', [ 'user_id'=>$user_id,'c_id' => $c_id,'sub_id' =>  $sub_id,'quiz_items'=>$encodeQuiz])->execute();
                }
            }

            $update_completed = Yii::$app->Common->checkAttendedQuiz($c_id,$sub_id,$user_id);
            if($update_completed){
                $update_query_completed = Yii::$app->db->createCommand()->update('quiz_temp', ['quiz_status' => 'Completed'], 'id = '.$update_completed['id'].' ')->execute();
            }
            //To set the result;
            $check_completed_data = Yii::$app->db->createCommand('SELECT * FROM quiz_temp WHERE user_id='.$user_id.' AND c_id='.$c_id.' AND sub_id ='.$sub_id)-> queryOne();
            if($check_completed_data){
                $i   = 0; //Quiz question count initilization
                $sum = 0; //Set Quiz mark count initilization
                $quiz_ans = json_decode($check_completed_data['quiz_items'],true);
                
                foreach ($quiz_ans as$key => $check_ans) {
                    $check_quiz_data = Yii::$app->db->createCommand('SELECT * FROM quiz WHERE id='.$key.' AND answer="'.$check_ans.'"')-> queryOne();
                    $i = $i+1;
                    if($check_quiz_data){
                        $sum = $sum+1;
                    }
                }
                //Set Data to insert if user passes 
                if($sum > 4){
                    $user_id            = Yii::$app->user->identity->id;
                    $course_id          = $c_id;
                    $topic_id           = $sub_id;
                    //$set_quiz_question  = $i;
                    $set_quiz_answer    = $sum;
                    $set_pass_mark      = 4;
                    $set_student_status = 'PASS';
                    $set_sub_mark       = 1;
                    $set_sub_status     = 'Completed';
                    $got_certificate    = 'No';

                    //Insert Query
                    $completed = Yii::$app->db->createCommand()->insert('quizCompletion', [ 'userId'=>$user_id,'courseId' => $course_id,'topicId' =>  $topic_id,'stuMark'=>$set_quiz_answer,'passMark'=>$set_pass_mark,'subMark'=>$set_sub_mark,'stuStatus'=>$set_student_status,'topicStatus'=>$set_sub_status,'gotCertificate'=>$got_certificate])->execute();

                    if($completed){
                        Yii::$app->getSession()->setFlash('msg', Yii::t("app", 'quiz-attended-success'));
                        return $this->redirect(['site/index']);
                    }
                } else {
                    $delete_user_quiz = Yii::$app->db->createCommand('DELETE FROM quiz_temp WHERE id='.$check_completed_data['id'])->execute();
                    if($delete_user_quiz){
                        Yii::$app->getSession()->setFlash('msg', Yii::t("app", 'quiz-attended-success-failed'));
                        return $this->redirect(['site/index']);   
                    }
                }

            }
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

    public function actionPrintCertificate($c_id,$sub_id){
        $c_id       = Yii::$app->Common->checkSecretUrlVerification($c_id);
        $sub_id     = Yii::$app->Common->checkSecretUrlVerification($sub_id);
        $user_id    = Yii::$app->user->identity->id;
        $get_print_detail = Yii::$app->db->createCommand('SELECT * FROM quizCompletion WHERE userId='.$user_id.' AND courseId='.$c_id.' AND topicId='.$sub_id.' AND stuStatus="Pass" ')-> queryOne();
        if($get_print_detail){
            return $this->render('certificate', [
                'result' => $get_print_detail,
            ]);
        } else {
            echo 'out';
        }
    }

    public function actionPrintPdf($course_id,$topic_id){
        $c_id       = Yii::$app->Common->checkSecretUrlVerification($course_id);
        $sub_id     = Yii::$app->Common->checkSecretUrlVerification($topic_id);
        $user_id    = Yii::$app->user->identity->id;
        $get_print_detail = Yii::$app->db->createCommand('SELECT * FROM quizCompletion WHERE userId='.$user_id.' AND courseId='.$c_id.' AND topicId='.$sub_id.' AND stuStatus="Pass" ')-> queryOne();

        $htmlContent = $this->renderPartial('certificatePdf', ['result' => $get_print_detail]);

        $filename = 'Course_cerificate';

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_DOWNLOAD,
            //set the pdf name
            'filename' => $filename,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            //'cssInline' => '.kv-heading-1{font-size:18px}', 
            // set mPDF properties on the fly
            'options' => ['title' => 'Incidents All', 'FileName' => 'test.pdf'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader' => ['TRRA Incident Report'],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        $pdf->content = $htmlContent;
        return $pdf->render();
    }

    public function actionSendMail(){
        //die("in");
        $setAll = Yii::$app->request->post();
        //print_r($setAll['courseName']);
        $content = 'Dear '.Yii::$app->user->identity['username'].',<br>Find you certificate and Take the next quiz as soon as possible !<br><br>
                <div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878; background-image: url(http://www.powerpointhintergrund.com/uploads/2017/06/simple-backgrounds-pictures-wallpaper-cave-1.jpeg);" id="certificate_page">
                          <div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
                                 <span style="font-size:50px; font-weight:bold">Certificate of Completion</span>
                                 <br><br>
                                 <span style="font-size:25px"><i>This is to certify that</i></span>
                                 <br><br>
                                 <span style="font-size:30px"><b>'.$setAll['userName'].'</b></span><br/><br/>
                                 <span style="font-size:25px"><i>has completed the course</i></span> <br/><br/>
                                 <span style="font-size:30px">'.$setAll['courseName'].', '.$setAll['topicName'].'</span> <br/><br/>
                                 <span style="font-size:20px">with score of</span><br>
                                 <span style="font-size:25px"><b>'.$setAll['studentMark'].'</b> Out Of <b>10</b></span><br>
                                 <span style="font-size:25px"><i>dated</i></span><br>
                                 <span style="font-size:25px">'.$setAll['dated'].'</span>
                          </div>
                          </div>';
        Yii::$app->mailer->compose()
        ->setFrom(['try@gmail.com'=>'Monish'])
        ->setTo('jerinmonish007@gmail.com')
        ->setSubject('Regarding Quiz Certificate for'.$setAll['courseName'].', '.$setAll['topicName'])
        ->setTextBody('Dear frined')
        ->setHtmlBody($content)
        ->send();
    }

}
