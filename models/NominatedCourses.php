<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Модель таблицы "studentGroupCourseWithTeacher".
 *
 * @property int $id
 * @property int $teacherId
 * @property int $groupId
 * @property int $courseId
 * @property string $status
 *
 * @property Course $course
 * @property Group $group
 * @property Teacher $teacher
 */
class NominatedCourses extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'studentGroupCourseWithTeacher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['teacherId', 'groupId', 'courseId'],
                'required'
            ],
            [
                ['teacherId', 'groupId', 'courseId','statusId'],
                'integer'
            ],
            [
                ['courseId'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Course::className(),
                'targetAttribute' => ['courseId' => 'id']
            ],
            [
                ['groupId'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Group::className(),
                'targetAttribute' => ['groupId' => 'id']
            ],
            [
                ['teacherId'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Teacher::className(),
                'targetAttribute' => ['teacherId' => 'id']
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'teacherId' => 'Преподователь',
            'groupId' => 'Группа',
            'courseId' => 'Курс',
            'statusId' => 'Статус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'courseId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'groupId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'teacherId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'statusId']);
    }
}
