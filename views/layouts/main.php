<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;
use app\models\CartForm;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use app\models\CallbackForm;
$model = new CartForm();
$callback= new CallbackForm();
$data = Yii::$app->controller->data;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Kosmetisches Kokosöl</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php
NavBar::begin([
    'brandLabel' => '<image class="brand" src="/image/labelbrand.png";>',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => [
        ['label' => 'Beschreibung', 'url' => '/#opisanie'],
        ['label' => ' Garantiertes Ergebnis', 'url' => '/#result'],
        ['label' => 'Bewertungen', 'url' => '/#bewertungen'],
        ['label' => 'Bestellung aufgeben', 'options' => ['class' => 'add-to-cart']],
        ['label' => '+ 43 6606368677', 'url' => 'tel:+ 43 6606368677'],
        ['label' => "Lassen Sie sich beraten", 'options' => ['class' => 'callback']],
    ],
]); ?>
<?php NavBar::end(); ?>
<?= Alert::widget() ?>
<?= $content ?>
<div id="t-footer" class="t-records t-records_animated t-records_visible">
    <div id="rec113930628" class="r t-rec">
        <div class="t396">
            <div class="t396__artboard rendered">
                <div class="t396__carrier"></div>
                <div class="t396__filter"></div>
                <div class="t396__elem tn-elem" data-elem-id="1475147390128">
                    <div class="tn-atom">ZU KAUFEN</div>
                </div>
                <div class="t396__elem tn-elem" data-elem-id="1475147589474">
                    <div class="tn-atom">О НАС</div>
                </div>
                <div class="t396__elem tn-elem tn-elem__1139306281475147601290" data-elem-id="1475147601290">
                    <div class="tn-atom">Jakobergasse 4, 1010 Wien, Austria
                        YENA GmbH<br>
                    </div>
                </div>
                <div class="t396__elem tn-elem" data-elem-id="1475147675390">
                    <div class="tn-atom">DOKUMENTATION</div>
                </div>
                <div class="t396__elem tn-elem" data-elem-id="1475147678114">
                    <a class="tn-atom" href="site/certification">Сертификаты качества</a>
                </div>
                <div class="t396__elem tn-elem" data-elem-id="1475160083840">
                    <a class="tn-atom" href="/">
                        <img class="tn-atom__img t-img loaded" src="/image/labelbrand.png">
                    </a>
                </div>
                <div class="t396__elem tn-elem" data-elem-id="1562140988702">
                    <a class="tn-atom" href="viber://chat?number=+38 067 245-20-10" target="_blank">
                        <img class="tn-atom__img t-img loaded" src="/image/viber.png">
                    </a>
                </div>
                <div class="t396__elem tn-elem" data-elem-id="1562140988709">
                    <a class="tn-atom" href="https://www.instagram.com/maldives.dreams" target="_blank">
                        <img class="tn-atom__img t-img loaded" src="/image/instagram.png">
                    </a>
                </div>
                <div class="t396__elem tn-elem" data-elem-id="1562140988715">
                    <a class="tn-atom" href="https://tlgg.ru/maldivesdreams" target="_blank">
                        <img class="tn-atom__img t-img loaded" src="/image/telegram.png">
                    </a>
                </div>
                <div class="t396__elem tn-elem" data-elem-id="1562140988721">
                    <a class="tn-atom" href="https://wa.me/38 067 245-20-10" target="_blank">
                        <img class="tn-atom__img t-img loaded" src="/image/whatsapp.png">
                    </a></div>
                <div class="t396__elem tn-elem" data-elem-id="1562141867742">
                    <a class="tn-atom" href="mailto:maldives.dreamstm@gmail.com">maldives.dreamstm@gmail.com</a>
                </div>
                <div class="t396__elem tn-elem" data-elem-id="1562142018674">
                    <a class="tn-atom" href="site/official">Политика конфиденциальности</a>
                </div>
                <div class="t396__elem tn-elem" data-elem-id="1562142042578">
                    <a class="tn-atom" href="site/pay">Правила оплаты, доставки и возврата</a>
                </div>
                <div class="t396__elem tn-elem tn-elem__1139306281564484950188" data-elem-id="1564484950188"><a
                            class="tn-atom" href="tel:+ 43 6606368677">+ 43 6606368677</a></div>
            </div>
        </div>
    </div>
    <div id="rec113930629" class="r t-rec">
        <div class="t396">
            <div class="t396__artboard rendered">
                <div class="t396__carrier"></div>
                <div class="t396__filter"></div>
                <div class="t396__elem tn-elem" data-elem-id="1562141820641">
                    <div class="tn-atom" field="tn_text_1562141820641">Maldives dreams 2019 Все права защищены</div>
                </div>
                <div class="t396__elem tn-elem" data-elem-id="1562142714866">
                    <div class="tn-atom"><img class="tn-atom__img t-img loaded" src="/image/visa.png">
                    </div>
                </div>
                <div class="t396__elem tn-elem" data-elem-id="1562142828468">
                    <div class="tn-atom">
                        <img class="tn-atom__img t-img loaded" src="/image/mastercard.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php Modal::begin(['id' => 'cart',
    'size' => 'modal-lg',
    'options' => [
        'tabindex' => false
    ]]) ?>
<div id="products-cart"></div>
<?php $form = ActiveForm::begin([
    'id' => 'cart-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
]); ?>

<?= $form->field($model, 'name') ?>

<?= $form->field($model, 'phone') ?>

<?= $form->field($model, 'email') ?>

<?= $form->field($model, 'country') ?>

<?= $form->field($model, 'city') ?>

<?= $form->field($model, 'warehouse') ?>

<div class="form-group">
    <?= Html::submitButton('Zu bestellen', ['class' => 'btn btn-primary', 'name' => 'login-button', 'id' => 'send-order']) ?>
</div>

<?php ActiveForm::end(); ?>
<?php Modal::end() ?>
<?php Modal::begin(['id' => 'callback',
    'size' => 'modal-lg',
    'header' => '<h2>Hinterlassen Sie die Kontaktdaten</h2>',
    'options' => [
        'tabindex' => false,
    ]]) ?>
<div id="callback-answer"></div>
<?php $callbackform = ActiveForm::begin([
    'id' => 'callback-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
]); ?>

<?= $callbackform->field($callback, 'name') ?>

<?= $callbackform->field($callback, 'phone') ?>
<div class="form-group">
    <?= Html::submitButton('Senden', ['class' => 'btn btn-primary', 'name' => 'login-button', 'id' => 'send-answer']) ?>
</div>

<?php ActiveForm::end(); ?>
<?php Modal::end() ?>
<script>
    !function (f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function () {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '450765688891742');
    fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=450765688891742&ev=PageView&noscript=1(44 B)
https://www.facebook.com/tr?id=450765688891742&ev=PageView&noscript=1
"
    /></noscript>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-150555775-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-150555775-1');
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
