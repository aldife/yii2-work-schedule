<?php

namespace app\modules\kerja\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\kerja\models\DataPanduan]].
 *
 * @see \app\modules\kerja\models\DataPanduan
 */
class DataPanduanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\modules\kerja\models\DataPanduan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\kerja\models\DataPanduan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}