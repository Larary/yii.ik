<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Доходы по вводу по ПС';
?>
    
<h4 class="text-center">Доходы по вводу в разрезе платежных систем</h4>

<?php if (Yii::$app->request->post()): ?>
<?php 
    $h5 = '<h5 class="text-center">Отчет за период с '.Yii::$app->formatter->asDate($date_begin, 'dd.MM.yyyy').' по '.Yii::$app->formatter->asDate($date_end, 'dd.MM.yyyy').'</h5>';
    echo $h5;
    
    $table = '<table class="table table-striped table-bordered"><tr><th>Валюта ПС</th><th>Платежная система</th><th>Зачислено мерчантам</th><th>Поступило в ПС</th>
	<th>Комиссия ПС</th><th>Конвертация</th><th>Доход</th><th>Прибыль</th></tr>';	
    foreach ($result1 as $row) {
	$table .= '<tr><td class="text-center">'.$row['curr_ps'].'</td>';
	$table .= '<td class="text-left">'.$row['paysystem'].'</td>';
	$table .= '<td>'.number_format($row['SUM(input_ps_curr)'],2,',','').'</td>';
	$table .= '<td>'.number_format($row['SUM(ps_input)'],2,',','').'</td>';
	$table .= '<td>'.number_format($row['SUM(ps_commis)'],2,',','').'</td>';
	$table .= '<td>'.number_format($row['SUM(convert_comm)'],2,',','').'</td>';
	$table .= '<td>'.number_format($row['SUM(income)'],2,',','').'</td>';
	$table .= '<td>'.number_format($row['SUM(profit)'],2,',','').'</td></tr>';
    }
	
    $table .= '<tr><td colspan="8" class="total">Всего по валютам:</td></tr>';
    foreach ($result2 as $row) {
	$table .= '<tr><td class="text-center">'.$row['curr_ps'].'</td>';
	$table .= '<td></td>';
	$table .= '<td>'.number_format($row['SUM(input_ps_curr)'],2,',','').'</td>';
	$table .= '<td>'.number_format($row['SUM(ps_input)'],2,',','').'</td>';
	$table .= '<td>'.number_format($row['SUM(ps_commis)'],2,',','').'</td>';
	$table .= '<td>'.number_format($row['SUM(convert_comm)'],2,',','').'</td>';
	$table .= '<td>'.number_format($row['SUM(income)'],2,',','').'</td>';
	$table .= '<td>'.number_format($row['SUM(profit)'],2,',','').'</td></tr>';
    }
    $table .= '</table>'; 

    echo $table;       
?>
<?php else: ?>
 
    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'date-form']); ?>

                <?= $form->field($model, 'date_begin')->input('date',['autofocus' => true])->hint('Введите дату от 01.11.2015 по 29.02.2016') ?>

                <?= $form->field($model, 'date_end')->input('date')->hint('Введите дату от 01.11.2015 по 29.02.2016') ?>
                    
                <div class="form-group">
                    <?= Html::submitButton('OK', ['class' => 'btn btn-primary', 'name' => 'date-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

<?php endif; ?>

