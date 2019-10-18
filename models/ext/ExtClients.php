<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $formatted_phone
 *
 * @property Orders[] $orders
 */
class ExtClients extends Clients
{
    public static function factory()
    {
        return new ExtClients();
    }
}
