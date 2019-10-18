<?php

namespace app\models\ext;


use app\models\Orders;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "orders".
 *

 */
class ExtOrders extends Orders
{
    const ANSWER_SUCCESS = 'Спасибо Ваш заказ принят, менеджер в скором времени свяжется с вами.';
    const ANSWER_ERROR = 'Ошибка при получении данных';
    const PRICE = 299;

    public static function factory()
    {
        return new ExtOrders();
    }
}
