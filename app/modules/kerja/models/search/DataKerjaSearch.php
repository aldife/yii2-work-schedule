<?php

namespace app\modules\kerja\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\kerja\models\DataKerja;

/**
 * DataKerjaSearch represents the model behind the search form about `app\modules\kerja\models\DataKerja`.
 */
class DataKerjaSearch extends DataKerja
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['judul', 'status_pekerjaan','tipe', 'klien', 'marketing', 'programmer', 'reminder_email', 'informasi', 'created_at', 'modified_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DataKerja::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
               
                'sort' => [
                    'defaultOrder' => [
                        'status' => SORT_DESC,
                        'modified_at' => SORT_DESC,
                         
                    ]
                ],
        ]);

         

        $this->load($params);


        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'modified_at' => $this->modified_at,
        ]);
     
        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'tipe', $this->tipe])
            ->andFilterWhere(['like', 'klien', $this->klien])
            ->andFilterWhere(['like', 'marketing', $this->marketing])
            ->andFilterWhere(['like', 'programmer', $this->programmer])
            ->andFilterWhere(['like', 'reminder_email', $this->reminder_email])
            ->andFilterWhere(['like', 'informasi', $this->informasi]);

        return $dataProvider;
    }
}
