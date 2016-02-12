<?php

namespace app\modules\kerja\models;

use Yii;

/**
 * This is the model class for table "data_kerja".
 *
 * @property integer $id
 * @property string $judul
 * @property string $tipe
 * @property string $klien
 * @property string $marketing
 * @property string $programmer
 * @property string $reminder_email
 * @property string $informasi
 * @property integer $status
 * @property string $created_at
 * @property string $modified_at
 */
class DataKerja extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_kerja';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judul', 'tipe', 'klien', 'marketing', 'programmer', 'reminder_email', 'informasi', 'status'], 'safe'],
            [['informasi'], 'string'],
            [['status'], 'integer'],
            [['created_at', 'modified_at', 'status_pekerjaan'], 'safe'],
            [['judul', 'tipe', 'klien', 'marketing', 'programmer'], 'string', 'max' => 200],
            [['reminder_email'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'judul' => Yii::t('app', 'Judul'),
            'tipe' => Yii::t('app', 'Tipe'),
            'klien' => Yii::t('app', 'Klien'),
            'marketing' => Yii::t('app', 'Marketing'),
            'programmer' => Yii::t('app', 'Programmer'),
            'reminder_email' => Yii::t('app', 'Reminder Email'),
            'informasi' => Yii::t('app', 'Informasi'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'modified_at' => Yii::t('app', 'Modified At'),
        ];
    }

    # @beforeSave  - sebelum save
    # @isNewRecord - jika record baru
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) { 
            if ($this->isNewRecord){
                $this->setAttribute('created_at',date("Y-m-d H:i:s"));
             
            }  
            
            $this->setAttribute('modified_at',date("Y-m-d H:i:s")); 
            return true;
        } else { 
            return false;
        }
    }
    

    public static function status()
    {
        return [1=>"Aktif",0=>"Tidak Aktif"];
    }

    public static function data_status($data)
    {
        if($data->status == 1){
            return "<label class='label label-success'>Aktif</label>";
        }else{
                return "<label class='label label-default'>Tidak Aktif</label>";
        }
  
    }


    public static function tipe()
    {
        return ["Android"=>"Android",
                "Android & Website"=>"Android & Website",
                "Website"=>"Website", 
                "Lainnnya" => "Lainnnya",
                ];
    }

    /**
     * @inheritdoc
     * @return \app\modules\kerja\models\query\DataKerjaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\kerja\models\query\DataKerjaQuery(get_called_class());
    }
}
