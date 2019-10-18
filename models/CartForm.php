<?php
/**
 * Created by PhpStorm.
 * User: suvorov.dmytro
 * Date: 15.10.2019
 * Time: 9:45
 */

namespace app\models;


use yii\base\Model;

class CartForm extends Model
{
    public $name;
    public $phone;
    public $email;
    public $country;
    public $city;
    public $warehouse;

    public function rules()
    {
        return [
            // username and password are both required
            [['name', 'phone','email','country','city','warehouse'], 'required'],
            [['email'], 'email'],
            ['phone', 'match', 'pattern' => '/^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$/gm', 'message' => 'Телефон, должен быть в формате +38(XXX)XXX-XX-XX'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'name'=>'Der Name',
            'phone'=>'Der Telefonnummer',
            'email'=>'E-Mail',
            'country' => 'Das Land',
            'city' => 'Die Stadt',
            'warehouse' => 'Die Adresse',
        ];
    }
}