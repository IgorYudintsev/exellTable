<?php
/**
 * Created by PhpStorm.
 * User: Саша
 * Date: 11.10.2019
 * Time: 16:25
 */
namespace app\models;
use yii\base\Model;
use yii\db\ActiveRecord;

class Catalog extends ActiveRecord
{
    public static function tableName()
    {
        return 'Catalog';
    }

    public function rules()
    {
        return [
           [['name', 'price', 'wholesale','availability_1', 'availability_2', 'country_maker'], 'required'],
        ];
   }
}