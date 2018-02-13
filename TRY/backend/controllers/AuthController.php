<?php
namespace backend\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use Yii;

/**
 * BackendController extends Controller and implements the behaviors() method
 * where you can specify the access control ( AC filter + RBAC) for 
 * your controllers and their actions.
 */
class AuthController extends Controller
{
    /**
     * Returns a list of behaviors that this component should behave as.
     * Here we use RBAC in combination with AccessControl filter.
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        //'controllers' => ['country','user-profile'],
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'get-state', 'get-district','change-password','update-profile',
                            'get-opportunity','get-job','get-user','get-job-name','get-opportunity-name','getusers', 'user-subscriptions','view-notes', 'generate-label', 'view-issue', 'export','monthly-report',
                            'export-monthly-report','get-calculated-amount'],
                        'allow' => true,
                        //'roles' => ['superadmin','Originator'],
                        'roles' => ['@'],
                    ],
                    [
                        // other rules
                    ],

                ], // rules

            ], // access

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post', 'get'],
                ],
            ], // verbs

        ]; // return

    } // behaviors

} // BackendController