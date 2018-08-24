<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "student".
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
            [['groupId'], 'integer'],
            [['photo'], 'string'],
            [['name', 'surname'], 'string', 'max' => 255],
            [['groupId'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['groupId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'groupId' => 'Группа',
            'photo' => 'Фото',
        ];
    }
    public function afterFind()
    {
        $this->groupId = $this->group->name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'groupId']);
    }
}
