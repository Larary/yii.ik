<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\TwoDatesForm;
use app\models\OneDateForm;

class ReportsController extends Controller{
    
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionVvodPs()
    {
         Yii::$app->view->params['active_link'] = 1;//передаем значение активной ссылки в layout для подсветки меню
         Yii::$app->view->params['sidebar_link'] = 1; //подсветка пункта sidebar
         
         $model = new TwoDatesForm();
        if ($model->load(Yii::$app->request->post())) {
            
            $date_begin = $model['date_begin'];
            $date_end = $model['date_end'];
                        
            $result1 = (new \yii\db\Query())
            ->select(['curr_ps', 'paysystem', 'SUM(input_ps_curr)', 'SUM(ps_input)', 'SUM(ps_commis)', 'SUM(convert_comm)', 'SUM(income)', 'SUM(profit)'])
            ->from('invoices')
            ->where(['between', 'date', $date_begin, $date_end])
            ->groupBy(['curr_ps','paysystem'])
            ->all();
            
            $result2 = (new \yii\db\Query())
            ->select(['curr_ps', 'SUM(input_ps_curr)', 'SUM(ps_input)', 'SUM(ps_commis)', 'SUM(convert_comm)', 'SUM(income)', 'SUM(profit)'])
            ->from('invoices')
            ->where(['between', 'date', $date_begin, $date_end])
            ->groupBy('curr_ps')
            ->all();
                    
            return $this->render('vvod-ps', compact('result1', 'result2', 'date_begin', 'date_end'));
        }
        return $this->render('vvod-ps', compact ('model'));
    }
    
    public function actionVivodPs()
    {
        Yii::$app->view->params['active_link'] = 1;//передаем значение активной ссылки в layout для подсветки меню
         Yii::$app->view->params['sidebar_link'] = 2; //подсветка пункта sidebar
         
         $model = new TwoDatesForm();
        if ($model->load(Yii::$app->request->post())) {
            
            $date_begin = $model['date_begin'];
            $date_end = $model['date_end'];
                        
            $result1 = (new \yii\db\Query())
            ->select(['curr_ps', 'paysystem', 'SUM(withdr_ps_curr)', 'SUM(ps_withdr)', 'SUM(merch_get)', 'SUM(ps_commis)', 'SUM(convert_comm)', 'SUM(income)', 'SUM(profit)'])
            ->from('withdraws')
            ->where(['between', 'date', $date_begin, $date_end])
            ->groupBy(['curr_ps','paysystem'])
            ->all();
            
            $result2 = (new \yii\db\Query())
            ->select(['curr_ps', 'SUM(withdr_ps_curr)', 'SUM(ps_withdr)', 'SUM(merch_get)', 'SUM(ps_commis)', 'SUM(convert_comm)', 'SUM(income)', 'SUM(profit)'])
            ->from('withdraws')
            ->where(['between', 'date', $date_begin, $date_end])
            ->groupBy('curr_ps')
            ->all();
                    
            return $this->render('vivod-ps', compact('result1', 'result2', 'date_begin', 'date_end'));
        }
        return $this->render('vivod-ps', compact ('model'));
    }
    
    public function actionVvodMch()
    {
         Yii::$app->view->params['active_link'] = 1;//передаем значение активной ссылки в layout для подсветки меню
         Yii::$app->view->params['sidebar_link'] = 3; //подсветка пункта sidebar
         
         $model = new TwoDatesForm();
        if ($model->load(Yii::$app->request->post())) {
            
            $date_begin = $model['date_begin'];
            $date_end = $model['date_end'];
                        
            $result1 = (new \yii\db\Query())
            ->select(['curr_ps', 'merch_id', 'merch_name', 'SUM(input_ps_curr)', 'SUM(ps_input)', 'SUM(ps_commis)', 'SUM(convert_comm)', 'SUM(income)', 'SUM(profit)'])
            ->from('invoices')
            ->where(['between', 'date', $date_begin, $date_end])
            ->groupBy(['curr_ps','merch_id'])
            ->all();
            
            $result2 = (new \yii\db\Query())
            ->select(['curr_ps', 'SUM(input_ps_curr)', 'SUM(ps_input)', 'SUM(ps_commis)', 'SUM(convert_comm)', 'SUM(income)', 'SUM(profit)'])
            ->from('invoices')
            ->where(['between', 'date', $date_begin, $date_end])
            ->groupBy('curr_ps')
            ->all();
                    
            return $this->render('vvod-mch', compact('result1', 'result2', 'date_begin', 'date_end'));
        }
        return $this->render('vvod-mch', compact ('model'));
    }
    
    public function actionVivodMch()
    {
        Yii::$app->view->params['active_link'] = 1;//передаем значение активной ссылки в layout для подсветки меню
         Yii::$app->view->params['sidebar_link'] = 4; //подсветка пункта sidebar
         
         $model = new TwoDatesForm();
        if ($model->load(Yii::$app->request->post())) {
            
            $date_begin = $model['date_begin'];
            $date_end = $model['date_end'];
                        
            $result1 = (new \yii\db\Query())
            ->select(['curr_ps', 'merch_id', 'merch_name', 'SUM(withdr_ps_curr)', 'SUM(ps_withdr)', 'SUM(ps_commis)', 'SUM(convert_comm)', 'SUM(income)', 'SUM(profit)'])
            ->from('withdraws')
            ->where(['between', 'date', $date_begin, $date_end])
            ->groupBy(['curr_ps','merch_id'])
            ->all();
            
            $result2 = (new \yii\db\Query())
            ->select(['curr_ps', 'SUM(withdr_ps_curr)', 'SUM(ps_withdr)', 'SUM(ps_commis)', 'SUM(convert_comm)', 'SUM(income)', 'SUM(profit)'])
            ->from('withdraws')
            ->where(['between', 'date', $date_begin, $date_end])
            ->groupBy('curr_ps')
            ->all();
                    
            return $this->render('vivod-mch', compact('result1', 'result2', 'date_begin', 'date_end'));
        }
        return $this->render('vivod-mch', compact ('model'));
    }
    
    public function actionDsMerch()
    {
        Yii::$app->view->params['active_link'] = 2;//передаем значение активной ссылки в layout для подсветки меню
         Yii::$app->view->params['sidebar_link'] = 5; //подсветка пункта sidebar
         
         $model = new OneDateForm();
        if ($model->load(Yii::$app->request->post())) {
            
            $date_balance = $model['date_balance'];
                                    
            $result1 = Yii::$app->db->createCommand('SELECT p.merch_name, p.curr_merch, i.inSum, o.outSum, IFNULL(i.inSum,0)-IFNULL(o.outSum,0) AS balance
        	FROM (SELECT merch_id, merch_name, curr_merch from merchants) AS p
                LEFT JOIN
                (SELECT merch_id, curr_merch, SUM(input_co_curr) AS inSum FROM invoices
                WHERE date <= :date_balance GROUP BY merch_id, curr_merch)
                AS i ON p.merch_id=i.merch_id AND p.curr_merch=i.curr_merch
                LEFT JOIN
                (SELECT merch_id, curr_merch, SUM(withdr_co_curr) AS outSum FROM withdraws
                WHERE date <= :date_balance GROUP BY merch_id, curr_merch)
                AS o ON p.merch_id=o.merch_id AND p.curr_merch=o.curr_merch')
           ->bindValue(':date_balance', $date_balance)
           ->queryAll();
            
            return $this->render('ds-merch', compact('result1', 'date_balance'));
        }
        return $this->render('ds-merch', compact ('model'));
    }
  
    public function actionDsPs()
    {
        Yii::$app->view->params['active_link'] = 2;//передаем значение активной ссылки в layout для подсветки меню
         Yii::$app->view->params['sidebar_link'] = 6; //подсветка пункта sidebar
         
         $model = new OneDateForm();
        if ($model->load(Yii::$app->request->post())) {
            
            $date_balance = $model['date_balance'];
                                    
            $result1 = Yii::$app->db->createCommand('SELECT p.paysystem, p.curr_ps, i.inSum, t_in.tr_in, o.outSum, t_out.tr_out,
                IFNULL(i.inSum,0)+IFNULL(t_in.tr_in,0)-IFNULL(o.outSum,0)-IFNULL(t_out.tr_out,0) AS balance
                FROM (SELECT paysystem, curr_ps FROM paysystems) AS p
                LEFT JOIN
                (SELECT paysystem, curr_ps, SUM(ps_input-ps_commis) AS inSum FROM invoices
                WHERE date <= :date_balance GROUP BY paysystem, curr_ps)
                AS i ON p.paysystem=i.paysystem AND p.curr_ps=i.curr_ps
                LEFT JOIN
                (SELECT paysystem, curr_ps, SUM(ps_withdr+ps_commis) AS outSum FROM withdraws
                WHERE date <= :date_balance GROUP BY paysystem, curr_ps)
                AS o ON p.paysystem=o.paysystem AND p.curr_ps=o.curr_ps
                LEFT JOIN
                (SELECT ps_in, curr_ps_in, SUM(sum_in) AS tr_in FROM transfers WHERE date <= :date_balance
                GROUP BY ps_in, curr_ps_in) AS t_in ON p.paysystem=t_in.ps_in AND p.curr_ps=t_in.curr_ps_in
                LEFT JOIN
                (SELECT ps_out, curr_ps_out, SUM(sum_out) AS tr_out FROM transfers WHERE date <= :date_balance
                GROUP BY ps_out, curr_ps_out) AS t_out ON p.paysystem=t_out.ps_out AND p.curr_ps=t_out.curr_ps_out')
           ->bindValue(':date_balance', $date_balance)
           ->queryAll();
            
            return $this->render('ds-ps', compact('result1', 'date_balance'));
        }
        return $this->render('ds-ps', compact ('model'));
    }
    
    public function actionDsCompare()
    {
        Yii::$app->view->params['active_link'] = 2;//передаем значение активной ссылки в layout для подсветки меню
         Yii::$app->view->params['sidebar_link'] = 7; //подсветка пункта sidebar
         
         $model = new OneDateForm();
        if ($model->load(Yii::$app->request->post())) {
            
            $date_balance = $model['date_balance'];
                                    
            $result1 = Yii::$app->db->createCommand('SELECT p.curr, IFNULL(ip.inPs,0)-IFNULL(op.outPs,0)+IFNULL(t_in.tr_in,0)-IFNULL(t_out.tr_out,0) AS psMoney,
                IFNULL(im.inMerch,0)-IFNULL(om.outMerch,0) as merchMoney
                FROM (SELECT DISTINCT curr_merch AS curr from merchants) AS p
                LEFT JOIN
                (SELECT curr_merch, SUM(input_co_curr) AS inMerch FROM invoices WHERE date <= :date_balance GROUP BY curr_merch)
                AS im ON p.curr=im.curr_merch
                LEFT JOIN
                (SELECT curr_merch, SUM(withdr_co_curr) AS outMerch FROM withdraws WHERE date <= :date_balance GROUP BY curr_merch)
                AS om ON p.curr=om.curr_merch
                LEFT JOIN
                (SELECT curr_ps, SUM(ps_input-ps_commis) AS inPs FROM invoices WHERE date <= :date_balance GROUP BY curr_ps)
                AS ip ON p.curr=ip.curr_ps
                LEFT JOIN
                (SELECT curr_ps, SUM(ps_withdr+ps_commis) AS outPs FROM withdraws WHERE date <= :date_balance GROUP BY curr_ps)
                AS op ON p.curr=op.curr_ps
                LEFT JOIN
                (SELECT curr_ps_in, SUM(sum_in) AS tr_in FROM transfers WHERE date <= :date_balance GROUP BY curr_ps_in)
                AS t_in ON p.curr=t_in.curr_ps_in
                LEFT JOIN
                (SELECT curr_ps_out, SUM(sum_out) AS tr_out FROM transfers WHERE date <= :date_balance GROUP BY curr_ps_out)
                AS t_out ON p.curr=t_out.curr_ps_out')
           ->bindValue(':date_balance', $date_balance)
           ->queryAll();
            
            return $this->render('ds-compare', compact('result1', 'date_balance'));
        }
        return $this->render('ds-compare', compact ('model'));
    }
  
    public function actionPl()
    {
        Yii::$app->view->params['active_link'] = 3;//передаем значение активной ссылки в layout для подсветки меню
         Yii::$app->view->params['sidebar_link'] = 8; //подсветка пункта sidebar
         
         $model = new TwoDatesForm();
        if ($model->load(Yii::$app->request->post())) {
            
            $date_begin = $model['date_begin'];
            $date_end = $model['date_end'];
            
            $agr=array();            
            
            $result1 = (new \yii\db\Query())
            ->select(['SUM(ps_commis) AS bank', 'SUM(convert_comm) AS conv', 'SUM(income) AS inc', 'SUM(profit) as pf'])
            ->from('invoices')
            ->where(['between', 'date', $date_begin, $date_end])
            ->groupBy(['curr_ps'])
            ->all();
            
            foreach ($result1 as $row) {
		array_push($agr,$row);}
            
            $result2 = (new \yii\db\Query())
            ->select(['SUM(ps_commis) AS bank', 'SUM(convert_comm) AS conv', 'SUM(income) AS inc', 'SUM(profit) as pf'])
            ->from('withdraws')
            ->where(['between', 'date', $date_begin, $date_end])
            ->groupBy('curr_ps')
            ->all();
            
            foreach ($result2 as $row) {
		array_push($agr,$row);}
            
            array_walk_recursive($agr, 
		function (&$value) {
                    if (is_numeric($value)) {
			$value = round($value / 1000);
                    }
		}
            );
                
            return $this->render('pl', compact('agr', 'date_begin', 'date_end'));
        }
        return $this->render('pl', compact ('model'));
    }
    
    public function actionBal()
    {
        Yii::$app->view->params['active_link'] = 3;//передаем значение активной ссылки в layout для подсветки меню
         Yii::$app->view->params['sidebar_link'] = 9; //подсветка пункта sidebar
         
         $model = new OneDateForm();
        if ($model->load(Yii::$app->request->post())) {
            
            $date_balance = $model['date_balance'];
            
            $agr=array();                        
            
            $result1 = Yii::$app->db->createCommand('SELECT SUM(convert_comm) AS conv, SUM(profit) as pf
                    FROM invoices where date BETWEEN "2015-11-01" AND :date_balance GROUP BY curr_ps')
           ->bindValue(':date_balance', $date_balance)
           ->queryAll();
            
            foreach ($result1 as $row) {
		array_push($agr,$row);}
            
            $result2 = Yii::$app->db->createCommand('SELECT SUM(convert_comm) AS conv, SUM(profit) as pf
                    FROM withdraws where date BETWEEN "2015-11-01" AND :date_balance GROUP BY curr_ps')
           ->bindValue(':date_balance', $date_balance)
           ->queryAll();
            
            foreach ($result2 as $row) {
		array_push($agr,$row);}
            
            $result3 = Yii::$app->db->createCommand('SELECT IFNULL(ip.inPs,0)-IFNULL(op.outPs,0)+IFNULL(t_in.tr_in,0)-IFNULL(t_out.tr_out,0) AS ds_ps,
                IFNULL(im.inMerch,0)-IFNULL(om.outMerch,0) as ds_m
                FROM (SELECT DISTINCT curr_merch AS curr from merchants) AS p
                LEFT JOIN
                (SELECT curr_merch, SUM(input_co_curr) AS inMerch FROM invoices WHERE date <= :date_balance GROUP BY curr_merch)
                AS im ON p.curr=im.curr_merch
                LEFT JOIN
                (SELECT curr_merch, SUM(withdr_co_curr) AS outMerch FROM withdraws WHERE date <= :date_balance GROUP BY curr_merch)
                AS om ON p.curr=om.curr_merch
                LEFT JOIN
                (SELECT curr_ps, SUM(ps_input-ps_commis) AS inPs FROM invoices WHERE date <= :date_balance GROUP BY curr_ps)
                AS ip ON p.curr=ip.curr_ps
                LEFT JOIN
                (SELECT curr_ps, SUM(ps_withdr+ps_commis) AS outPs FROM withdraws WHERE date <= :date_balance GROUP BY curr_ps)
                AS op ON p.curr=op.curr_ps
                LEFT JOIN
                (SELECT curr_ps_in, SUM(sum_in) AS tr_in FROM transfers WHERE date <= :date_balance GROUP BY curr_ps_in)
                AS t_in ON p.curr=t_in.curr_ps_in
                LEFT JOIN
                (SELECT curr_ps_out, SUM(sum_out) AS tr_out FROM transfers WHERE date <= :date_balance GROUP BY curr_ps_out)
                AS t_out ON p.curr=t_out.curr_ps_out')
           ->bindValue(':date_balance', $date_balance)
           ->queryAll();
            
            foreach ($result3 as $row) {
		array_push($agr,$row);}
            
            array_walk_recursive($agr, 
		function (&$value) {
                    if (is_numeric($value)) {
			$value = round($value / 1000);
                    }
		}
            );
             
            return $this->render('bal', compact('agr', 'date_balance'));
        }
        return $this->render('bal', compact ('model'));
    }
}
