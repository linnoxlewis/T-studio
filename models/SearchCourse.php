<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Поисковая модель курсов.
 */
class SearchCourse extends Course
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'duration'], 'integer'],
            [['name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * СОздание датапровайдера.
     *
     * @param array $params параметры
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Course::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'duration' => $this->duration,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
