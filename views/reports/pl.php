<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Отчет о прибылях и убытках';
?>
    
<h4 class="text-center"><?= Html::encode($this->title) ?></h4>

<?php if (Yii::$app->request->post()): ?>
<?php 
    $h5 = '<h5 class="text-center">Отчет за период с '.Yii::$app->formatter->asDate($date_begin, 'dd.MM.yyyy').' по '.Yii::$app->formatter->asDate($date_end, 'dd.MM.yyyy').'</h5>';
    echo $h5;
    
    $table = '<table class="table table-striped table-bordered"><tr><th>Наименование показателя</th><th>UAH, тыс.</th><th>RUB, тыс.</th><th>USD, тыс.</th><th>EUR, тыс.</th></tr>';	
    $table .= '<tr><td class="text-left">Доходы по вводу</td><td>'.$agr[2]['inc'].'</td><td>'.$agr[1]['inc'].'</td><td>'.$agr[3]['inc'].'</td><td>'.$agr[0]['inc'].'</td></tr>';
	$table .= '<tr><td class="text-left">Комиссия банка</td><td>('.$agr[2]['bank'].')</td><td>('.$agr[1]['bank'].')</td><td>('.$agr[3]['bank'].')</td><td>('.$agr[0]['bank'].')</td></tr>';
	$table .= '<tr><td class="text-left">Прибыль от комиссионных операций</td><td>'.$agr[2]['pf'].'</td><td>'.$agr[1]['pf'].'</td><td>'.$agr[3]['pf'].'</td><td>'.$agr[0]['pf'].'</td></tr>';
	$table .= '<tr><td class="text-left">Конвертационный доход</td><td>'.$agr[2]['conv'].'</td><td>'.$agr[1]['conv'].'</td><td>'.$agr[3]['conv'].'</td><td>'.$agr[0]['conv'].'</td></tr>';
	$table .= '<tr style="font-weight: bold;"><td class="text-left">Всего прибыль по вводу</td><td>'.($agr[2]['pf']+$agr[2]['conv']).'</td><td>'.($agr[1]['pf']+$agr[1]['conv']).'</td><td>'.($agr[3]['pf']+$agr[3]['conv']).'</td><td>'.($agr[0]['pf']+$agr[0]['conv']).'</td></tr>';
	$table .= '<tr><td colspan="5"></td></tr>';	
	$table .= '<tr><td class="text-left">Доходы по выводу</td><td>'.$agr[6]['inc'].'</td><td>'.$agr[5]['inc'].'</td><td>'.$agr[7]['inc'].'</td><td>'.$agr[4]['inc'].'</td></tr>';
	$table .= '<tr><td class="text-left">Комиссия банка</td><td>('.$agr[6]['bank'].')</td><td>('.$agr[5]['bank'].')</td><td>('.$agr[7]['bank'].')</td><td>('.$agr[4]['bank'].')</td></tr>';
	$table .= '<tr><td class="text-left">Прибыль от комиссионных операций</td><td>'.$agr[6]['pf'].'</td><td>'.$agr[5]['pf'].'</td><td>'.$agr[7]['pf'].'</td><td>'.$agr[4]['pf'].'</td></tr>';
	$table .= '<tr><td class="text-left">Конвертационный доход</td><td>'.$agr[6]['conv'].'</td><td>'.$agr[5]['conv'].'</td><td>'.$agr[7]['conv'].'</td><td>'.$agr[4]['conv'].'</td></tr>';
	$table .= '<tr style="font-weight: bold;"><td class="text-left">Всего прибыль по выводу</td><td>'.($agr[6]['pf']+$agr[6]['conv']).'</td><td>'.($agr[5]['pf']+$agr[5]['conv']).'</td><td>'.($agr[7]['pf']+$agr[7]['conv']).'</td><td>'.($agr[4]['pf']+$agr[4]['conv']).'</td></tr>';
	$table .= '<tr><td colspan="5"></td></tr>';
	$table .= '<tr><td class="total text-left">Прибыль всего:</td>
		<td class="total">'.($agr[2]['pf']+$agr[2]['conv']+$agr[6]['pf']+$agr[6]['conv']).'</td>
		<td class="total">'.($agr[1]['pf']+$agr[1]['conv']+$agr[5]['pf']+$agr[5]['conv']).'</td>
		<td class="total">'.($agr[3]['pf']+$agr[3]['conv']+$agr[7]['pf']+$agr[7]['conv']).'</td>
		<td class="total">'.($agr[0]['pf']+$agr[0]['conv']+$agr[4]['pf']+$agr[4]['conv']).'</td></tr>';
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

