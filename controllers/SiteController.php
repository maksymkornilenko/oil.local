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
use yii\web\Cookie;
use app\models\ext\ExtOrderItems;
use app\models\ext\ExtOrders;
use app\models\ext\ExtProducts;
use app\models\Orders;
use app\models\OrderItems;
use app\models\Clients;
use app\models\Products;

class SiteController extends Controller
{
    public $data=[];
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
    public function beforeAction($action)
    {
        $cookies = Yii::$app->request->cookies;
        $count=0;
        $sum=0;
        $name='';
        if (isset($cookies['id']->value)) {
            $productId = (int)$cookies['id']->value;
        } else {
            $products = Products::find()->one();
            $cookieResponse = Yii::$app->response->cookies;
            $cookieResponse->add(new Cookie([
                'name' => 'id',
                'value' => $products['id'],
                'expire' => time() + 3600,
            ]));
            $productId = $products['id'];
        }
        if(isset($cookies['count']->value)){
            $count=$cookies['count']->value;
        }
        if(isset($cookies['sum']->value)){
            $sum=$cookies['sum']->value;
        }
        if(isset($cookies['name']->value)){
            $name=$cookies['name']->value;
        }
        // Все полученные значения заносим в глобальное свойтво 'content', доступное из View и из Layout
        $this->data = [
            'productId' => $productId,
            'count' => $count,
            'sum' => $sum,
            'name' => $name,
        ];
        return parent::beforeAction($action);
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
//        return $this->render('index');
        return $this->render('index', [
            'model' => $model
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
        $count = 1;
        $id = (int)Yii::$app->request->get('id');
        $cook = Yii::$app->request->cookies;
        if (isset($cook['count']->value)) {
            $count += $cook['count']->value;
        }
        $price = 299;
        $sum = $price * $count;
        $this->setCookie('price', $price);
        $this->setCookie('id', $id);
        $this->setCookie('name', $name);
        $this->setCookie('count', $count);
        $this->setCookie('sum', $sum);
        return $this->renderPartial('cart-modal', ['name' => $name, 'count' => $count, 'price' => $price, 'id' => $id, 'sum' => $sum]);
    }

    public function actionSave()
    {
        $request = Yii::$app->request;
        $id = (int)$request->get('id');
        $count = (int)$request->get('count');
        $name = $request->get('name');
        $price = 299;
        $count = !$count ? 1 : $count;
        $sum = $count * $price;
        $this->setCookie('id', $id);
        $this->setCookie('name', $name);
        $this->setCookie('count', $count);
        $this->setCookie('price', $price);
        return $this->renderPartial('cart-modal', [
            'name' => $name,
            'count' => $count,
            'price' => $price,
            'id' => $id,
            'sum' => $sum
        ]);
    }

    public function actionArea()
    {
        $out = ['results' => ['id' => '', 'text' => '']];
        $q = isset($_GET['q']) ? $_GET['q'] : null;
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if (!is_null($q)) {
            $areas = Areas::find()->asArray()->select(['`ref` AS `id`', '`description_ru` AS `text`'])->where(['like', 'description_ru', $q])->all();
            $out['results'] = array_values($areas);
        } elseif (!is_null($id)) {
            $areas = Areas::find()->where(['ref' => $id])->one();
            $out['results'] = ['id' => $id, 'text' => $areas->description_ru];
        }
        return Json::encode($out);
    }

    public function actionCity()
    {
        $answer = [];
        $areasRef = (string)Yii::$app->request->get('value');
        $city = Cities::find()->where(['area_ref' => $areasRef])->orderBy(['description_ru' => SORT_ASC])->all();
        foreach ($city as $cities) {
            $answer[] = '<option value="' . $cities['ref'] . '">' . $cities['description_ru'] . '</option>';
        }
        return Json::encode($answer);


    }

    public function actionWarehouse()
    {
        $answer = [];
        $cityRef = (string)Yii::$app->request->get('city');
        $warehouse = Warehouses::find()->where(['city_ref' => $cityRef])->all();
        foreach ($warehouse as $warehouses) {
            $answer[] = '<option value="' . $warehouses['ref'] . '" data-number="' . $warehouses['number'] . '">' . $warehouses['description_ru'] . '</option>';
        }
        return Json::encode($answer);
    }

    public function actionShow()
    {
        $cookies = Yii::$app->request->cookies;
        $count = $cookies['count']->value;
        $price = 299;
        $sum = $price * $count;
        return $this->renderPartial('cart-modal', [
            'name' => $cookies['name']->value,
            'count' => $count,
            'price' => $price,
            'id' => $cookies['id']->value,
            'sum' => $sum
        ]);
    }

    public function actionDelete()
    {
        $this->setEmptyCookie();
        return $this->renderPartial('cart-empty');
    }

    public function actionSend()
    {
        $request = Yii::$app->request->post();
        $order = new Orders();
        $order->area = $request['area'];
        $order->city = $request['city'];
        $order->warehouse = $request['warehouse'];
        $order->count = (int)$request['count'];
        $order->pay = 'cash';
        $formattedPhone = preg_replace('/[^0-9]/', '', $request['phone']);
        $client = Clients::find()->where(['formatted_phone' => $formattedPhone])->one();
        if ($client) {
            $order->client_id = $client->id;
        } else {
            $client = new Clients();
            $client->name = $request['name'];
            $client->phone = $request['phone'];
            $client->formatted_phone = $formattedPhone;
            $client->email = $request['mail'];
            if ($client->save()) {
                $order->client_id = $client->id;
            }
        }
        $productId = $request['id'];
        $product = Products::find()->asArray()->where(['id' => $productId])->one();
        $price = ExtOrders::PRICE;
        $order->sum = $price * $order->count;
        if ($order->save()) {
            ExtOrderItems::factory()->saveOrderItems($product, $order->sum, $order->count, $order->id);
            Yii::$app->session->setFlash('success', ExtOrders::ANSWER_SUCCESS);
            $params = [
                'order_id' => $order->id,
                'product_id' => $productId,
                'product_name' => $product['name'],
                'product_price' => $price,
                'count' => $order->count,
                'sum' => $order->sum,
                'client_id' => $client->id,
                'client_name' => $client->name,
                'client_phone' => $client->formatted_phone,
                'client_email' => $client->email,
                'delivery_area' => $order->area,
                'delivery_area_ref' => $request['areaRef'],
                'delivery_city' => $order->city,
                'delivery_city_ref' => $request['cityRef'],
                'delivery_warehouse' => $order->warehouse,
                'delivery_warehouse_ref' => $request['warehouseRef'],
                'delivery_warehouse_number' => $request['number'],
                'payment' => 'cash',
            ];
//            $this->sendData($params);
            $this->setEmptyCookie();
        } else {
            Yii::$app->session->setFlash('error', ExtOrders::ANSWER_ERROR);
        }
        return $this->renderPartial('cart-modal');
    }

    protected function setCookie($name, $value)
    {
        $cookies = Yii::$app->response->cookies;
        $cookies->add(new Cookie([
            'name' => $name,
            'value' => $value,
        ]));
    }
    protected function setEmptyCookie()
    {
        $cookies = Yii::$app->response->cookies;
        $cookies->add(new Cookie([
            'name' => 'id',
            'value' => '',
        ]));
        $cookies->add(new Cookie([
            'name' => 'name',
            'value' => '',
        ]));
        $cookies->add(new Cookie([
            'name' => 'count',
            'value' => 0,
        ]));
        $cookies->add(new Cookie([
            'name' => 'price',
            'value' => 0,
        ]));
        return $cookies;
    }
    protected function sendData($params)
    {
        $content = http_build_query($params);
        $context = stream_context_create([
                'http' => [
                    'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                        "Content-Length: ".strlen($content)."\r\n".
                        "User-Agent:MyAgent/1.0\r\n",
                    'method' => 'POST',
                    'content' => $content
                ]
            ]
        );
        $url = 'https://crm.maldivesdreams.com.ua/tilda/webhook/test-soap';
        $answerJSON = file_get_contents($url, null, $context);
        if ($answerJSON) {
            $answer = Json::decode($answerJSON, true);
            if ($answer['success'] == true) {
                $order = Orders::findOne($params['order_id']);
                $order->updateAttributes(['status' => 1]);
            }
        }
    }
}
