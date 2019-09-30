<?php

namespace app\controllers;

use app\models\SearchTeacher;
use app\models\Teacher;

/**
 * Контроллер для работы с преподователями.
 *
 * Class TeacherController
 *
 * @package app\controllers
 */
class TeacherController extends CommonController
{
    /**
     * Возвращает имя модели
     *
     * @return string
     */
    protected function getModelName():string
    {
        return Teacher::class;
    }

    /**
     * Возвращает имя поисковой модели
     *
     * @return string
     */
    protected function getSearchModelName():string
    {
        return SearchTeacher::class;
    }
}
