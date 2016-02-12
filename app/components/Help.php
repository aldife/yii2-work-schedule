<?php

namespace app\components;
use Yii;
use yii\helpers\Html;
use dektrium\user\Finder;
use app\modules\dokter\models\view\AdminView as Dokter;
use app\modules\pasien\models\view\AdminView as Pasien;

class Help{

	// GET USER
	public static function getProfile(){ 
		$profile = self::finder()->findProfileById(Yii::$app->user->identity->getId());
		return $profile; 
	} 

	public static function getUser(){   

		$user = self::finder()->findUserById(Yii::$app->user->identity->getId());
		return $user; 
	}

	public static function getUserById($id){    
		$user = self::finder()->findUserById((int)$id);
		if($user !== null){
			return $user; 
		} else {
            throw new NotFoundHttpException('The requested page does not exist.');
        } 
	}

	public static function getProfileById($id){    
		$user = self::finder()->findProfileById((int)$id);
		if($user !== null){
			return $user; 
		} else {
            throw new NotFoundHttpException('The requested page does not exist.');
        } 
	}


	public static function finder(){

		$finder = Yii::createObject(Finder::className());
		return $finder;
	}

}