<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "group".
 *
 * @property int $id
 * @property string $name
 *
 * @property Student[] $students
 * @property StudentGroupeCourseWithTeacher[] $studentGroupeCourseWithTeachers
 */
class Group extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['name'],'unique','message'=>"группа уже существует"]
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
        return $this->hasMany(StudentGroupeCourseWithTeacher::className(), ['groupId' => 'id']);
    }

    /**
     * Получаем все имеющийся группы.
     *
     * @return array|ActiveRecord[]
     */
    public static function getGroups()
    {
        return self::find()->all();
    }
}
