<?php

namespace app\models;

use yii\base\Model;

class TwoDatesForm extends Model{
    
    public $date_begin;
    public $date_end;
    
    public function attributeLabels(){
        return [
            'date_begin' => 'Дата начала периода:',
            'date_end' => 'Дата окончания периода:',
        ];
    }
    
    public function rules(){
        return [
            [ 'date_begin', 'required', 'message' => 'Не выбрана дата начала периода.' ],
            [ 'date_end', 'required', 'message' => 'Не выбрана дата окончания периода.' ],
            [ ['date_begin', 'date_end'], 'date' ],
        ];
    }
}
