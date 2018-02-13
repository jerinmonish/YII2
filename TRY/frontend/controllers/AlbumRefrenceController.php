<?php

namespace frontend\controllers;

use Yii;
use frontend\models\AlbumRefrence;
use frontend\models\AlbumRefrenceSearch;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AlbumRefrenceController implements the CRUD actions for AlbumRefrence model.
 */
class AlbumRefrenceController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST','GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all AlbumRefrence models.
     * @return mixed
     */
    public function actionIndex()
    {
        //die('in');
        $searchModel = new AlbumRefrenceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //echo '<pre>';print_r($searchModel);exit;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AlbumRefrence model.
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
     * Creates a new AlbumRefrence model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AlbumRefrence();

        if ($model->load(Yii::$app->request->post())) {
            //$post = Yii::$app->request->post()['AlbumRefrence']['pics'];
            /*foreach ($post as $key => $value) {
                print_r($value);
            }exit;*/
            $db = \Yii::$app->db;
            //$images = 
            $model->pics = UploadedFile::getInstances($model, 'pics');
            //echo '<pre>';print_r($post);exit;
              
            
                foreach ($model->pics as $file) {
                $model->albumId = Yii::$app->request->post()['AlbumRefrence']['albumId'];
                $model->photoOrder = Yii::$app->request->post()['AlbumRefrence']['photoOrder'];
                $model->createdOn = date("y-m-d h:i:s");
                $model->updatedOn = date("y-m-d h:i:s");
                $model->pics = date('Ymdhis').'-'.Yii::$app->Common->removeSpecialCharacter($file->baseName, $file->extension);
                if(move_uploaded_file($file->tempName, 'uploads/user_album_img/'.$model->pics)){
                    //$model->save();
                    $db->createCommand('INSERT INTO albumRefrence(albumId,pics,photoOrder,createdOn,updatedOn) VALUES('.$model->albumId.',"'.$model->pics.'",'.$model->photoOrder.',"'.$model->createdOn.'","'.$model->updatedOn.'")')->execute();
                }
                //echo '<pre>';print_r($file);
            } //exit;
            

        } else {
            //echo 'in';exit;
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing AlbumRefrence model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AlbumRefrence model.
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
    *Get Users album based images
    */
    public function actionGetMyImages($id){
        //die("hi");
        $id = Yii::$app->Common->checkSecretUrlVerification($id);
        //print_r($id);exit;
        //$user_id = Yii::$app->user->identity->id;
        $getUserImages = Yii::$app->Common->getAlbumBasedImage($id);
        return $this->render('my-album-images',[
            'model'=>$getUserImages,
            ]);
    }

    /**
     * Finds the AlbumRefrence model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AlbumRefrence the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AlbumRefrence::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
