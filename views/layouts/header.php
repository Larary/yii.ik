<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class = "container">
        <div class = "row">
            <div class = "col-md-12">
                <h1><?= Html::a('REPORTING <span>SYSTEM</span>', Url::to('/') ) ?> <small>управленческая и финансовая отчетность</small></h1>
            </div>	
        </div>
    </div>
    <hr>
    <div class="clr"></div>    
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>   
            </div>
			
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li <?php echo ($this->params['active_link']==1) ? 'class="active-link"' : ''?>><?= Html::a('Доходы по вводу и выводу', ['reports/vvod-ps']) ?></li>
                    <li <?php echo ($this->params['active_link']==2) ? 'class="active-link"' : ''?>><?= Html::a('Денежные средства', ['reports/ds-merch']) ?></li>
                    <li <?php echo ($this->params['active_link']==3) ? 'class="active-link"' : ''?>><?= Html::a('Финансовая отчетность', ['reports/pl']) ?></li>	
                </ul>
			   
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>    
    <div class="container">
        <div class = "col-md-3"><!-- sidebar -->
            <h4 class="text-center"><?php echo ($this->title=='Главная страница') ? '' : 'Отчеты'?></h4>
            <ul class="list-group">
                <?php 
                switch ($this->params['active_link']){
                    case 1:?>
                        <li <?php echo ($this->params['sidebar_link']==1) ? 'class="list-group-item active-link"' : 'class="list-group-item"'?>><?= Html::a('Доходы по вводу в разрезе платежных систем', ['reports/vvod-ps']) ?></li>
                        <li <?php echo ($this->params['sidebar_link']==2) ? 'class="list-group-item active-link"' : 'class="list-group-item"'?>><?= Html::a('Доходы по выводу в разрезе платежных систем', ['reports/vivod-ps']) ?></li>
                        <li <?php echo ($this->params['sidebar_link']==3) ? 'class="list-group-item active-link"' : 'class="list-group-item"'?>><?= Html::a('Доходы по вводу в разрезе мерчантов', ['reports/vvod-mch']) ?></li>
                        <li <?php echo ($this->params['sidebar_link']==4) ? 'class="list-group-item active-link"' : 'class="list-group-item"'?>><?= Html::a('Доходы по выводу в разрезе мерчантов', ['reports/vivod-mch']) ?></li>	
                    <?php
                    break;
                    case 2:?>
                        <li <?php echo ($this->params['sidebar_link']==5) ? 'class="list-group-item active-link"' : 'class="list-group-item"'?>><?= Html::a('Денежные средства на счетах мерчантов', ['reports/ds-merch']) ?></li>
                        <li <?php echo ($this->params['sidebar_link']==6) ? 'class="list-group-item active-link"' : 'class="list-group-item"'?>><?= Html::a('Денежные средства в платежных системах', ['reports/ds-ps']) ?></li>
                        <li <?php echo ($this->params['sidebar_link']==7) ? 'class="list-group-item active-link"' : 'class="list-group-item"'?>><?= Html::a('Сравнение остатков ДС по мерчантам и ПС', ['reports/ds-compare']) ?></li>	
                    <?php
                    break;
                    case 3:?>
                        <li <?php echo ($this->params['sidebar_link']==8) ? 'class="list-group-item active-link"' : 'class="list-group-item"'?>><?= Html::a('Отчет о прибылях и убытках', ['reports/pl']) ?></li>
                        <li <?php echo ($this->params['sidebar_link']==9) ? 'class="list-group-item active-link"' : 'class="list-group-item"'?>><?= Html::a('Отчет о финансовом состоянии', ['reports/bal']) ?></li>
                    <?php
                    break;
                } ?>
                </ul>
        </div>   
    
        <div class = "col-md-9">
            
            <?= $content ?>
        </div>
    </div>
       
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

	
	
	
	
  

