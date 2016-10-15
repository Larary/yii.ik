<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Сравнение остатков ДС по мерчантам и ПС';
?>
    
<h4 class="text-center"><?= Html::encode($this->title) ?></h4>

<?php if (Yii::$app->request->post()): ?>
<?php 
    $h5 = '<h5 class="text-center">Отчет на дату '.Yii::$app->formatter->asDate($date_balance, 'dd.MM.yyyy').'</h5>';
    echo $h5;
    
    $table = '<table class="table table-striped table-bordered"><tr><th>Валюта</th><th>ДС в платежных системах</th><th>ДС на кассах мерчантов</th></tr>';	
    foreach ($result1 as $row) {
	$table .= '<tr><td class="text-center">'.$row['curr'].'</td>';
	$table .= '<td>'.number_format($row['psMoney'],2,',','').'</td>';
        $table .= '<td>'.number_format($row['merchMoney'],2,',','').'</td></tr>';
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

