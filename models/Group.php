<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Модель таблицы "group".
 *
 * @property int $id
 * @property string $name
 * @property Student[] $students
 * @property nominatedCourses[] $studentGroupeCourseWithTeachers
 */
class Group extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%group}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [
                ['name'],
                'required',
                'message'=> '{attribute} не может быть пустым'
            ],
            [
                ['name'],
                'string',
                'max' => 255
            ],
            [
                ['name'],
                'unique',
                'message'=>"группа уже существует"
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Название группы',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['groupId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentGroupeCourseWithTeachers()
    {
        return $this->hasMany(nominatedCourses::className(), ['groupId' => 'id']);
    }
}
