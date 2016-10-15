<?php

namespace app\models;
use yii\base\Model;

class OneDateForm extends Model{
    
    public $date_balance;

    public function attributeLabels(){
        return [
                'date_balance' => 'Дата балансов:',

        ];
    }

    public function rules(){
        return [
            [ 'date_balance', 'required', 'message' => 'Не выбрана дата формирования балансов.' ],
            [ 'date_balance', 'date' ],
        ];
    }
    
}