<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%drivers}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property double $lat
 * @property double $lng
 */
class Drivers extends \yii\db\ActiveRecord
{
    public $latitude;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%drivers}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'lat', 'lng'], 'required'],
            [['lat', 'lng'], 'number'],
            [['name'], 'string', 'max' => 60],
            [['address'], 'string', 'max' => 80],
            [['latitude'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'lat' => 'Lat',
            'lng' => 'Lng',
        ];
    }
}
