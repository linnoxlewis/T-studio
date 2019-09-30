<?php

namespace app\models;

use yii\data\ActiveDataProvider;

/**
 * Поисковая модель занятий
 *
 * Class SearchNominatedCourses
 *
 * @package app\models
 */
class SearchNominatedCourses extends NominatedCourses
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['id', 'teacherId', 'groupId', 'courseId','statusId'],
                'integer'
            ],
        ];
    }

    /**
     * Создание датапровайдера
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = nominatedCourses::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'teacherId' => $this->teacherId,
            'groupId' => $this->groupId,
            'courseId' => $this->courseId,
            'statusId' => $this->statusId
        ]);
        return $dataProvider;
    }
}
