<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Денежные средства на счетах мерчантов';
?>
    
<h4 class="text-center"><?= Html::encode($this->title) ?></h4>

<?php if (Yii::$app->request->post()): ?>
<?php 
    $h5 = '<h5 class="text-center">Отчет на дату '.Yii::$app->formatter->asDate($date_balance, 'dd.MM.yyyy').'</h5>';
    echo $h5;
    
    $table = '<table class="table table-striped table-bordered"><tr><th>Мерчант</th><th>Валюта</th><th>Ввод всего</th><th>Вывод всего</th><th>Баланс</th></tr>';	
    foreach ($result1 as $row) {
	$table .= '<tr><td class="text-left">'.$row['merch_name'].'</td>';
	$table .= '<td class="text-center">'.$row['curr_merch'].'</td>';
        $table .= '<td>'.number_format($row['inSum'],2,',','').'</td>';
	$table .= '<td>'.number_format($row['outSum'],2,',','').'</td>';
        $table .= '<td>'.number_format($row['balance'],2,',','').'</td></tr>';
    }
    $table .= '</table>'; 

    echo $table;       
?>
<?php else: ?>
 
    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'date-form']); ?>

                <?= $form->field($model, 'date_balance')->input('date',['autofocus' => true])->hint('Введите дату от 01.11.2015 по 29.02.2016') ?>

                <div class="form-group">
                    <?= Html::submitButton('OK', ['class' => 'btn btn-primary', 'name' => 'date-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

<?php endif; ?>

