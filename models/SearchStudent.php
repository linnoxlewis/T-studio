<?php

namespace app\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Поисковая модель Студентов.
 */
class SearchStudent extends Student
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['id', 'groupId'],
                'integer'
            ],
            [
                ['name', 'surname', 'photo'],
                'safe'
            ],
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
     * Создание датапровайдера.
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Student::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'groupId' => $this->groupId,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'photo', $this->photo]);

        return $dataProvider;
    }

    /**
     * Поиск студентов по группе.
     *
     * @param int $id id группы.
     *
     * @return ActiveDataProvider
     */
    public function searchStudent(int $id)
    {
        $query = Student::find()
            ->where([
                "groupId"=>$id
            ]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }
}
