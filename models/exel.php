<?php
/**
 * Created by PhpStorm.
 * User: Саша
 * Date: 11.10.2019
 * Time: 8:19
 */
namespace app\models;
use yii\db\ActiveRecord;

class exel extends ActiveRecord
{
    public static function tableName()
    {
        return 'exel';
    }

}