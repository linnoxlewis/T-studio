<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Модель курсов
 *
 * @property int $id
 * @property string $name
 * @property int $duration
 *
 * @property NominatedCourses[] $nominatedCourses
 */
class Course extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%course}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['name','duration'],
                'required',
                'message'=>'{attribute} не может быть пустым'
            ],
            [
                ['name'],
                'unique',
                'message'=>'{attribute} уже присутствует в системе'
            ],
            [
                ['duration'],
                'integer'
            ],
            [
                ['name'],
                'string',
                'max' => 255
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Название курса',
            'duration' => 'Продолжительность курса(в часах)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentGroupeCourseWithTeachers()
    {
        return $this->hasMany(SearchNominatedCourses::className(), ['courseId' => 'id']);
    }
}
