<?php

namespace app\commands;
 
use yii;
use yii\console\Controller;
use app\modules\kerja\models\DataKerja;
 
class MailController extends Controller {
 
    public function actionIndex() {
        echo "cron service runnning";
    }
 
    public function actionSendmail() {

        $models = DataKerja::find()->where(['status' => 1])->all();
        $messages = [];
        foreach ($models as $model) {
            $programmer = strtoupper($model->programmer);
            $marketing  = strtoupper($model->marketing);
            $judul  = strtoupper($model->judul);
            $reminder = explode(',',$model->reminder_email);
            foreach($reminder as $mail){
                $messages[] = Yii::$app->mailer->compose()
                ->setSubject($marketing.' dan '.$programmer.' Ingat '.$judul)
                ->setHtmlBody('Hai '.$marketing.' dan '.$programmer.' Ini adalah pesan pengingat dari job 
                    <b>'. $judul .'</b>, untuk menonaktifkannya silakan login pada panel kerja 
                    dan ubah status menjadi tidak aktif.
                    <br><br><br>
                    <b>JOB : </b> '.$judul.'<br>
                    <b>STATUS : </b> '.$model->status_pekerjaan.'<br>
                    <b>TIPE : </b> '.$model->tipe.'
                    <br><br> SELAMAT BEKERJA !!!')
                ->setTo($mail);
            }
            
        }
        if(Yii::$app->mailer->sendMultiple($messages)){
            echo "sukses send mail";
        }else{
            echo "Failed send mail";
        }
 
    }
 
}
