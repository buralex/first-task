<?php

namespace backend\models;

use yii\base\Model;

class Drivers extends Model
{
    public $orig_lat;
    public $orig_lng;
    public $search_rad;

    public function rules()
    {
        return [
            //[['name', 'email'], 'required'],
            [['orig_lat', 'orig_lng', 'search_rad'], 'safe'],
        ];
    }
}