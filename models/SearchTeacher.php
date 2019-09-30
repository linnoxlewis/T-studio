<?php

namespace app\models;
use yii\data\ActiveDataProvider;

/**
 * Поисковая модель Преподователей.
 */
class SearchTeacher extends Teacher
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['id'],
                'integer'
            ],
            [
                ['name', 'surname'],
                'safe'
            ],
        ];
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
        $query = Teacher::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
        ]);
        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname]);
        return $dataProvider;
    }
}
