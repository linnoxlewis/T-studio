<?php

namespace app\controllers;

use app\models\Course;
use app\models\SearchCourse;

/**
 * Контроллер для работы с курсами
 *
 * Class CourseController
 *
 * @package app\controllers
 */
class CourseController extends CommonController
{
    /**
     * Возвращает имя модели
     *
     * @return string
     */
    protected function getModelName():string
    {
        return Course::class;
    }

    /**
     * Возвращает имя поисковой модели
     *
     * @return string
     */
    protected function getSearchModelName():string
    {
        return SearchCourse::class;
    }
}
