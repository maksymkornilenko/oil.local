<?php

namespace app\controllers;

use app\models\CartForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
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
     * {@inheritdoc}
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
        $model = new CartForm();
        return $this->render('index', [
            'model' => $model
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
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

    public function actionAdd()
    {
        if (Yii::$app->request->isAjax) {
            $id = (int)Yii::$app->request->get('id');
            $count = (int)Yii::$app->request->get('count');
            $name = (string)Yii::$app->request->get('name');
            $this->layout = false;
            return $this->render('cart-modal', [
                'id' => $id,
                'count' => $count,
                'name' => $name
            ]);
        }
    }

    public function actionSend()
    {
        $model= new CartForm();
//        if (Yii::$app->request->isAjax && $model->validate()) {
            $id = (int)Yii::$app->request->post('id');
            $count = (int)Yii::$app->request->post('count');
            $name = (string)Yii::$app->request->post('name');
            $email = (string)Yii::$app->request->post('email');
            $phone = (string)Yii::$app->request->post('phone');
            $area = (string)Yii::$app->request->post('area');
            $city = (string)Yii::$app->request->post('city');
            $warehouse = (string)Yii::$app->request->post('warehouse');
            $this->layout = false;
            return $this->render('cart-modal', [
                'id' => $id,
            ]);
        }
//    }
}
