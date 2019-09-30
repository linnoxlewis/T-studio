<?php

namespace app\models;
use yii\base\Model;

/**
 * Модель таблицы "status".
 *
 * @property int $id
 * @property string $name
 *
 * @property NominatedCourses[] $studentGroupCourseWithTeachers
 */
class Status extends Model
{
    /**
     * Статус "На согласовании".
     *
     * @var int
     */
    const IN_PROCESS = 1;

    /**
     * Статус согласован
     *
     * @var int
     */
    const APPROVED = 2;

    /**
     * Статус отклонен
     *
     * @var int
     */
    const REJECTED = 3;

    /**
     * Правила валидации.
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['id', 'in', 'range' => [static::IN_PROCESS,static::APPROVED,static::REJECTED]],
            ['id', 'required'],
        ];
    }

    /**
     * Лист значений.
     *
     * @return array
     */
    public static function getList()
    {
        return [
            static::IN_PROCESS => "На согласовании",
            static::APPROVED => "Согласовано",
            static::REJECTED=> "'Отклонено'",
        ];
    }
}
