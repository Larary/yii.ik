<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Отчет о финансовом состоянии';
?>
    
<h4 class="text-center"><?= Html::encode($this->title) ?></h4>

<?php if (Yii::$app->request->post()): ?>
<?php 
    $h5 = '<h5 class="text-center">Отчет на дату '.Yii::$app->formatter->asDate($date_balance, 'dd.MM.yyyy').'</h5>';
    echo $h5;
    
    $table = '<table class="table table-striped table-bordered"><tr><th>Активы</th><th>UAH, тыс.</th><th>RUB, тыс.</th><th>USD, тыс.</th><th>EUR, тыс.</th></tr>';	
	$table .= '<tr><td class="text-left">Денежные средства в платежных системах</td><td>'.$agr[9]['ds_ps'].'</td><td>'.$agr[8]['ds_ps'].'</td><td>'.$agr[10]['ds_ps'].'</td><td>'.$agr[11]['ds_ps'].'</td></tr>';
	$table .= '<tr><td class="text-left">Трансферы</td>
		<td>'.($agr[2]['pf']+$agr[2]['conv']+$agr[6]['pf']+$agr[6]['conv']+$agr[9]['ds_m']-$agr[9]['ds_ps']).'</td>
		<td>'.($agr[1]['pf']+$agr[1]['conv']+$agr[5]['pf']+$agr[5]['conv']+$agr[8]['ds_m']-$agr[8]['ds_ps']).'</td>
		<td>'.($agr[3]['pf']+$agr[3]['conv']+$agr[7]['pf']+$agr[7]['conv']+$agr[10]['ds_m']-$agr[10]['ds_ps']).'</td>
		<td>'.($agr[0]['pf']+$agr[0]['conv']+$agr[4]['pf']+$agr[4]['conv']+$agr[11]['ds_m']-$agr[11]['ds_ps']).'</td></tr>';
	$table .= '<tr><td class="total text-left">Баланс</td>
		<td class="total">'.($agr[2]['pf']+$agr[2]['conv']+$agr[6]['pf']+$agr[6]['conv']+$agr[9]['ds_m']).'</td>
		<td class="total">'.($agr[1]['pf']+$agr[1]['conv']+$agr[5]['pf']+$agr[5]['conv']+$agr[8]['ds_m']).'</td>
		<td class="total">'.($agr[3]['pf']+$agr[3]['conv']+$agr[7]['pf']+$agr[7]['conv']+$agr[10]['ds_m']).'</td>
		<td class="total">'.($agr[0]['pf']+$agr[0]['conv']+$agr[4]['pf']+$agr[4]['conv']+$agr[11]['ds_m']).'</td></tr>';
	$table .= '<tr><td colspan="5"></td></tr>';	
	$table .= '<tr><th>Обязательства и капитал</th><th>UAH, тыс.</th><th>RUB, тыс.</th><th>USD, тыс.</th><th>EUR, тыс.</th></tr>';
	$table .= '<tr><td class="text-left">Прибыль</td>
		<td>'.($agr[2]['pf']+$agr[2]['conv']+$agr[6]['pf']+$agr[6]['conv']).'</td>
		<td>'.($agr[1]['pf']+$agr[1]['conv']+$agr[5]['pf']+$agr[5]['conv']).'</td>
		<td>'.($agr[3]['pf']+$agr[3]['conv']+$agr[7]['pf']+$agr[7]['conv']).'</td>
		<td>'.($agr[0]['pf']+$agr[0]['conv']+$agr[4]['pf']+$agr[4]['conv']).'</td></tr>';
	$table .= '<tr><td class="text-left">Денежные средства мерчантов</td><td>'.$agr[9]['ds_m'].'</td><td>'.$agr[8]['ds_m'].'</td><td>'.$agr[10]['ds_m'].'</td><td>'.$agr[11]['ds_m'].'</td></tr>';
	$table .= '<tr><td class="total text-left">Баланс</td>
		<td class="total">'.($agr[2]['pf']+$agr[2]['conv']+$agr[6]['pf']+$agr[6]['conv']+$agr[9]['ds_m']).'</td>
		<td class="total">'.($agr[1]['pf']+$agr[1]['conv']+$agr[5]['pf']+$agr[5]['conv']+$agr[8]['ds_m']).'</td>
		<td class="total">'.($agr[3]['pf']+$agr[3]['conv']+$agr[7]['pf']+$agr[7]['conv']+$agr[10]['ds_m']).'</td>
		<td class="total">'.($agr[0]['pf']+$agr[0]['conv']+$agr[4]['pf']+$agr[4]['conv']+$agr[11]['ds_m']).'</td></tr>';
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

