<?php

namespace app\models;

use yii\db\ActiveRecord;
/**
 * Модель таблицы "status".
 *
 * @property int $id
 * @property string $name
 *
 * @property NominatedCourses[] $studentGroupCourseWithTeachers
 */
class Status extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
            'name' => 'Статус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentGroupCourseWithTeachers()
    {
        return $this->hasMany(NominatedCourses::className(), ['statusId' => 'id']);
    }

    /**
     * Получаем все статусы.
     *
     * @return array|ActiveRecord[]
     */
    public static function getStatus()
    {
        return self::find()->all();
    }
}
