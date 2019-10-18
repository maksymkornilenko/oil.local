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
    const ANSWER_SUCCESS = 'Vielen Dank. Ihre Bestellung wurde angenommen, der Manager wird Sie in Kürze kontaktieren.';
    const ANSWER_ERROR = 'Fehler beim Abrufen der Daten';
    const PRICE = 17;

    public static function factory()
    {
        return new ExtOrders();
    }
}
