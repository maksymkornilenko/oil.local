<?php

namespace app\models\ext;

use app\models\Products;
use Yii;

/**
 * This is the model class for table "products".
 *
 * @property string $id
 * @property string $name
 * @property string $price
 *
 * @property OrderItems[] $orderItems
 */
class ExtProducts extends Products
{
    public static function factory()
    {
        return new ExtProducts();
    }
}
