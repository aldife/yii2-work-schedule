<?php

namespace app\modules\kerja\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\kerja\models\DataKerja]].
 *
 * @see \app\modules\kerja\models\DataKerja
 */
class DataKerjaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\modules\kerja\models\DataKerja[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\kerja\models\DataKerja|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}