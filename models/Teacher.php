<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Модель таблицы "teacher".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property NominatedCourses $studentGroupeCourseWithTeachers
 */
class Teacher extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%teacher}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['name', 'surname'],
                'string',
                'max' => 255
            ],
            [
                ['name', 'surname'],
                'required',
                'message'=>'{attribute} не может быть пустым'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentGroupeCourseWithTeachers()
    {
        return $this->hasMany(NominatedCourses::className(), ['teacherId' => 'id']);
    }
}
