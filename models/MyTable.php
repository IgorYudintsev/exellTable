<?php
/**
 * Created by PhpStorm.
 * User: Саша
 * Date: 12.10.2019
 * Time: 11:15
 */

namespace app\models;
use yii\base\Model;
use yii\db\ActiveRecord;

class MyTable extends ActiveRecord
{
    public static function tableName()
    {
        return 'Catalog';
    }

    public function rules()
    {
        return [
            [['name', 'price', 'wholesale','availability_1', 'availability_2', 'country_maker','note'], 'required'],
        ];
    }
}