<?php

namespace backend\controllers;

use Yii;
use backend\models\Course;
use backend\models\CourseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;
/**
 * CourseController implements the CRUD actions for Course model.
 */
class CourseController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules'=>[
                [
                    'actions' => ['index', 'view', 'create', 'update', 'delete'],
                    'allow' => true,
                    'roles' => ['@'],
                ],
                [
                    //other roles
                ],
              ],
            ],//access
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST','GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Course models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Course model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Course model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Course();

        if ($model->load(Yii::$app->request->post())) {
            //print_r($_FILES);exit;
            $postData =  Yii::$app->request->post()['Course'];
            /* Upload Course Image Starts */
            
            Yii::$app->Common->commonUpload($model, Yii::$app->Common->getRootPath(), 'courseImage');

            //$model->courseImage = $profilePhoto;
            /* Upload Course Image Ends */
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);    
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Course model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        //print_r($_FILES);exit;
        $model = $this->findModel($id);
        //print_r($_POST);exit;
        $oldCoursePhoto = $model->courseImage;
        if ($model->load(Yii::$app->request->post())) {
            /* Update Profile Pic Starts */
            $postData = Yii::$app->request->post()['Course'];//Yii::$app->request->post('Course');
            //$oldCoursePhoto    =   $model->courseImage;
            $existingCourse    =   $postData['existingCourseImage'];

            //echo '<pre>';print_r($oldCoursePhoto);exit;
            if (Yii::$app->Common->commonUpload($model, Yii::$app->Common->getRootPath(), 'courseImage')) {
                Yii::$app->Common->unlinkExistedFile(Yii::$app->Common->getRootPath(), $oldCoursePhoto);
                $CoursePhoto = $model->courseImage;
            } else {
                $CoursePhoto = ($existingCourse) ? $existingCourse : '';
            }
            $model->courseImage = $CoursePhoto;
            /* Update Profile Pic Ends */

            if($model->save()){
                return $this->redirect(['index']);
            } else {
                //echo 'in';exit;
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            //echo 'in';exit;
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Course model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Course model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Course::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
