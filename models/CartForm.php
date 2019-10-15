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
    public $area;
    public $city;
    public $warehouse;

    public function rules()
    {
        return [
            // username and password are both required
            [['name', 'phone','email','area','city','warehouse'], 'required'],
        ];
    }
}