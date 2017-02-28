<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use webvimark\modules\UserManagement\UserManagementModule;
use webvimark\modules\UserManagement\models\User;
use app\models\Masters;
use app\models\Requests;
use yii\data\Pagination;


class SiteController extends Controller
{
    public $layout = 'main.twig';
    public $freeAccess = true;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'ghost-access'=> [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
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


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        // $masters = Masters::find()->select('PK_Masters, MasterName, MasterDesq')->all();
        $query_mas = Masters::find()->select('PK_Masters, MasterName, MasterDesq');
        $pages_mas = new Pagination(['totalCount' => $query_mas->count(), 'pageSize' => '4', 'pageSizeParam' => false, 'forcePageParam' => false]);
        $masters = $query_mas->offset($pages_mas->offset)->limit($pages_mas->limit)->all();

        $query_req = Requests::find()->select('PK_Requests, Car, Text');
        $pages_req = new Pagination(['totalCount' => $query_req->count(), 'pageSize' => '4', 'pageSizeParam' => false, 'forcePageParam' => false]);
        $requests = $query_req->offset($pages_req->offset)->limit($pages_req->limit)->all();

        return $this->render('index', compact('masters', 'pages_mas', 'requests', 'pages_req'));
    }


    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    /**
     * Displays personal cabinet data
     *
     * @return string
     */
    public function actionCabinet()
    {
        return $this->render('cabinet');
    }

    /**
     * Assign driver role for user-
     *
     * @redirect cabinet
     */
    public function actionDriver() 
    {
        Yii::$app->user->identity->assignRole(Yii::$app->user->id, 'Driver');
        $this->redirect('index.php?r=site/cabinet');
    }

        /**
     * Assign master role for user-
     *
     * @redirect cabinet
     */
    public function actionMaster() 
    {
        Yii::$app->user->identity->assignRole(Yii::$app->user->id, 'Master');
        $this->redirect('index.php?r=site/cabinet');
    }

}
