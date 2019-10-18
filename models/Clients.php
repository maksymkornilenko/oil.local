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
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'formatted_phone'], 'required'],
            [['name', 'email', 'phone', 'formatted_phone'], 'string', 'max' => 255],
            [['formatted_phone'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'formatted_phone' => 'Formatted Phone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['client_id' => 'id']);
    }
}
