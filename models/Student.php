<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * Модель таблицы "Student".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property int $groupId
 * @property string $photo
 * @property string $prePhoto
 *
 * @property Group $group
 */
class Student extends ActiveRecord
{
    /**
     * Предварительный показ фотографии
     *
     * @var string
     */
    public $prePhoto;
    /**
     * Событие добавления студента
     */
    public const EVENT_ADD_NEW_STUDENT = '';
    /**
     * Событие удаление студента
     *
     * @var string
     */
    public const EVENT_REMOVE_STUDENT = '';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['name', 'surname'],
                'required',
                'message'=>'{attribute} не может быть пустым'
            ],
            [
                ['prePhoto'],
                'file',
                'extensions' => 'jpg, gif, png'
            ],
            [
                ['groupId'],
                'integer'
            ],
            [
                ['photo'],
                'string'
            ],
            [
                ['name', 'surname'],
                'string',
                'max' => 255
            ],
            [
                ['groupId'],
                'exist',
                'skipOnError' => true, 'targetClass' => Group::className(),
                'targetAttribute' => ['groupId' => 'id']
            ],
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
            'groupId' => 'Группа',
            'photo' => 'Фото',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'groupId']);
    }

    /**
     * Вывод названия группы после выборки
     */
    public function afterFind()
    {
        $this->groupId = $this->group->name;
    }

    /**
     * Логирование удаления студента
     */
    public function afterDelete()
    {
        $messageLog = "Студент " . $this->name . " " . $this->surname . " удален";
        $this->on(Student::EVENT_ADD_NEW_STUDENT, [$this, Yii::info($messageLog, 'student')]);
    }
}
