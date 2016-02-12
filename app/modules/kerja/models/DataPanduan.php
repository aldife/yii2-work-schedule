<?php

namespace app\modules\kerja\models;

use Yii;

/**
 * This is the model class for table "data_panduan".
 *
 * @property integer $id
 * @property string $judul
 * @property string $content
 */
class DataPanduan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_panduan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judul', 'content'], 'required'],
            [['judul', 'content'], 'string']
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
            'content' => Yii::t('app', 'Content'),
        ];
    }

    /**
     * @inheritdoc
     * @return \app\modules\kerja\models\query\DataPanduanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\kerja\models\query\DataPanduanQuery(get_called_class());
    }
}
