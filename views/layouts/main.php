<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
            ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?= $content ?>
<div id="t-footer" class="t-records t-records_animated t-records_visible">
    <div id="rec113930628" class="r t-rec">
        <div class="t396">
            <div class="t396__artboard rendered">
                <div class="t396__carrier" data-artboard-recid="113930628"></div>
                <div class="t396__filter" data-artboard-recid="113930628"></div>
                <div class="t396__elem tn-elem tn-elem__1139306281475147390128" data-elem-id="1475147390128">
                    <div class="tn-atom" field="tn_text_1475147390128">КУПИТЬ</div>
                </div>
                <div class="t396__elem tn-elem tn-elem__1139306281475147589474" data-elem-id="1475147589474">
                    <div class="tn-atom" field="tn_text_1475147589474">О НАС</div>
                </div>
                <div class="t396__elem tn-elem tn-elem__1139306281475147601290" data-elem-id="1475147601290">
                    <div class="tn-atom" field="tn_text_1475147601290">ООО "Менделеев Лаб"<br>51200, Украина,
                        Днепропетровская область, г.Новомосковск, ул. Сучкова, д.115 А
                    </div>
                </div>
                <div class="t396__elem tn-elem tn-elem__1139306281475147675390" data-elem-id="1475147675390">
                    <div class="tn-atom" field="tn_text_1475147675390">ДОКУМЕНТАЦИЯ</div>
                </div>
                <div class="t396__elem tn-elem tn-elem__1139306281475147678114" data-elem-id="1475147678114"><a
                            class="tn-atom" href="/certification">Сертификаты
                        качества</a></div>
                <div class="t396__elem tn-elem tn-elem__1139306281475160083840" data-elem-id="1475160083840"><a
                            class="tn-atom" href="/main"> <img
                                class="tn-atom__img t-img loaded"
                                data-original="https://static.tildacdn.com/tild6165-6164-4335-a233-376562333064/logo3.png"
                                imgfield="tn_img_1475160083840"
                                src="https://static.tildacdn.com/tild6165-6164-4335-a233-376562333064/logo3.png"> </a>
                </div>
                <div class="t396__elem tn-elem tn-elem__1139306281562140988702" data-elem-id="1562140988702"><a
                            class="tn-atom"
                            href="viber://chat?number=+38 067 245-20-10"
                            target="_blank"> <img
                                class="tn-atom__img t-img loaded"
                                data-original="https://static.tildacdn.com/tild3264-3062-4534-b230-643538663531/icons8-viber-96.png"
                                imgfield="tn_img_1562140988702"
                                src="https://static.tildacdn.com/tild3264-3062-4534-b230-643538663531/icons8-viber-96.png">
                    </a></div>
                <div class="t396__elem tn-elem tn-elem__1139306281562140988709" data-elem-id="1562140988709"><a
                            class="tn-atom"
                            href="https://www.instagram.com/maldives.dreams"
                            target="_blank"> <img
                                class="tn-atom__img t-img loaded"
                                data-original="https://static.tildacdn.com/tild6634-3937-4131-a533-393261633731/icons8-instagram-96.png"
                                imgfield="tn_img_1562140988709"
                                src="https://static.tildacdn.com/tild6634-3937-4131-a533-393261633731/icons8-instagram-96.png">
                    </a></div>
                <div class="t396__elem tn-elem tn-elem__1139306281562140988715" data-elem-id="1562140988715"><a
                            class="tn-atom"
                            href="https://tlgg.ru/maldivesdreams"
                            target="_blank"> <img
                                class="tn-atom__img t-img loaded"
                                data-original="https://static.tildacdn.com/tild3732-6562-4232-a639-633166666134/icons8-telegram-app-.png"
                                imgfield="tn_img_1562140988715"
                                src="https://static.tildacdn.com/tild3732-6562-4232-a639-633166666134/icons8-telegram-app-.png">
                    </a></div>
                <div class="t396__elem tn-elem tn-elem__1139306281562140988721" data-elem-id="1562140988721"><a
                            class="tn-atom"
                            href="https://wa.me/38 067 245-20-10"
                            target="_blank"> <img
                                class="tn-atom__img t-img loaded"
                                data-original="https://static.tildacdn.com/tild6163-3133-4663-b031-396462313134/icons8-whatsapp-96_3.png"
                                imgfield="tn_img_1562140988721"
                                src="https://static.tildacdn.com/tild6163-3133-4663-b031-396462313134/icons8-whatsapp-96_3.png">
                    </a></div>
                <div class="t396__elem tn-elem tn-elem__1139306281562141867742" data-elem-id="1562141867742"><a
                            class="tn-atom"
                            href="mailto:maldives.dreamstm@gmail.com">maldives.dreamstm@gmail.com</a>
                </div>
                <div class="t396__elem tn-elem tn-elem__1139306281562142018674" data-elem-id="1562142018674"><a
                            class="tn-atom" href="/official">Политика
                        конфиденциальности</a></div>
                <div class="t396__elem tn-elem tn-elem__1139306281562142042578" data-elem-id="1562142042578"><a
                            class="tn-atom" href="/pay">Правила оплаты,
                        доставки и возврата</a></div>
                <div class="t396__elem tn-elem tn-elem__1139306281562246055382" data-elem-id="1562246055382"><a
                            class="tn-atom" href="/oferta">Договор публичной
                        оферты</a></div>
                <div class="t396__elem tn-elem tn-elem__1139306281564484950188" data-elem-id="1564484950188"><a
                            class="tn-atom" href="tel:+38 067 245 2010">+ 38
                        067 245-20-10</a></div>
                <div class="t396__elem tn-elem tn-elem__1139306281566893324586" data-elem-id="1566893324586"><a
                            class="tn-atom" href="tel:+38 067 404-66-01">+ 38
                        067 404-66-01</a></div>
            </div>
        </div>
    </div>
    <div id="rec113930629" class="r t-rec">
        <div class="t396">
            <div class="t396__artboard rendered">
                <div class="t396__carrier"></div>
                <div class="t396__filter"></div>
                <div class="t396__elem tn-elem tn-elem__1139306281562141820641" data-elem-id="1562141820641">
                    <div class="tn-atom" field="tn_text_1562141820641">Maldives dreams 2019 Все права защищены</div>
                </div>
                <div class="t396__elem tn-elem tn-elem__1139306281562142714866" data-elem-id="1562142714866">
                    <div class="tn-atom"><img class="tn-atom__img t-img loaded"
                                              data-original="https://static.tildacdn.com/tild3538-6638-4630-b262-343561646536/_1.png"
                                              imgfield="tn_img_1562142714866"
                                              src="https://static.tildacdn.com/tild3538-6638-4630-b262-343561646536/_1.png">
                    </div>
                </div>
                <div class="t396__elem tn-elem tn-elem__1139306281562142828468" data-elem-id="1562142828468">
                    <div class="tn-atom"><img class="tn-atom__img t-img loaded"
                                              data-original="https://static.tildacdn.com/tild3162-6266-4630-a662-373963623064/_3.png"
                                              imgfield="tn_img_1562142828468"
                                              src="https://static.tildacdn.com/tild3162-6266-4630-a662-373963623064/_3.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
