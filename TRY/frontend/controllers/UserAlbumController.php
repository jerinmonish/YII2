<?php

namespace frontend\controllers;

use Yii;
use frontend\models\UserAlbum;
use frontend\models\UserAlbumSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserAlbumController implements the CRUD actions for UserAlbum model.
 */
class UserAlbumController extends Controller
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
     * Lists all UserAlbum models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserAlbumSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserAlbum model.
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
     * Creates a new UserAlbum model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        /*$model = new UserAlbum();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }*/

        $model = new UserAlbum();

        if ($model->load(Yii::$app->request->post())) {
            //print_r($_FILES);exit;
            $postData =  Yii::$app->request->post()['UserAlbum'];
            /* Upload Course Image Starts */
            $model->createdOn = date('y-m-d h:i:s');
            $model->updatedOn = date('y-m-d h:i:s');
            Yii::$app->Common->commonUpload($model, \Yii::$app->params['ALBUM_ICON_PATH'], 'abIcon');

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
     * Updates an existing UserAlbum model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldIconImg = $model->abIcon;

        if ($model->load(Yii::$app->request->post())) {
            /* Update Profile Pic Starts */
            $postData = Yii::$app->request->post()['UserAlbum'];

            $existingIconImg    =   $postData['existingAlbumIcon'];


            if (Yii::$app->Common->commonUpload($model, \Yii::$app->params['ALBUM_ICON_PATH'], 'abIcon')) {
                Yii::$app->Common->unlinkExistedFile(\Yii::$app->params['ALBUM_ICON_PATH'], $oldIconImg);
                $IconImg = $model->abIcon;
            } else {
                $IconImg = ($existingIconImg) ? $existingIconImg : '';
            }

            $model->abIcon = $IconImg;
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
     * Deletes an existing UserAlbum model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        //echo '<pre>'; print_r($model);exit;
        Yii::$app->Common->unlinkExistedFile(\Yii::$app->params['ALBUM_ICON_PATH'], $model->abIcon);

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
    *To View my albums
    */
    public function actionMyAlbum()
    {   
        $user_id = Yii::$app->user->identity->id;
        $get_albums = Yii::$app->Common->getMyAlbum($user_id);
        return $this->render('my-album', [
            'model' => $get_albums,
            ]);  
    }

    /**
     * Finds the UserAlbum model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserAlbum the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserAlbum::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
