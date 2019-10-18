<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "callback".
 *
 * @property string $id
 * @property int $created_at
 * @property int $updated_at
 * @property string $phone
 * @property string $formatted_phone
 * @property string $name
 * @property string $status
 */
class Callback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'callback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'phone', 'formatted_phone', 'name', 'status'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['phone', 'formatted_phone', 'name', 'status'], 'string', 'max' => 255],
        ];
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
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'phone' => 'Phone',
            'formatted_phone' => 'Formatted Phone',
            'name' => 'Name',
            'status' => 'Status',
        ];
    }
}
