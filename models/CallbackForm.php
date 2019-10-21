<?php
/**
 * Created by PhpStorm.
 * User: suvorov.dmytro
 * Date: 21.10.2019
 * Time: 14:40
 */

namespace app\models;


use yii\base\Model;

class CallbackForm extends Model
{
    public $name;
    public $phone;

    public function rules()
    {
        return [
            // username and password are both required
            [['name', 'phone'], 'required'],
            ['phone', 'match', 'pattern' => '/^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$/gm', 'message' => 'Ungültige Telefonnummer'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'name'=>'Der Name',
            'phone'=>'Der Telefonnummer',
        ];
    }
}