<?php

namespace app\models\ext;

use app\models\Callback;
use Yii;
use yii\behaviors\TimestampBehavior;

class ExtCallback extends Callback
{
    public static function factory()
    {
        return new ExtCallback();
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at','updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }

}
