<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
$exception = Yii::$app->errorHandler->exception;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title);?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)); ?>
    </div>
    <a href="/">Вернуться на главную страницу</a>

</div>
