<?php

namespace app\controllers;

use app\models\Course;
use app\models\SearchCourse;


/**
 * Контроллер для работы с курсами.
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

    /**
     * Возвращает модель
     *
     * @param int|null $id
     *
     * @return Course
     */
    protected function getModel(int $id = null): Course
    {
        if (null == $id){
            $modelName = $this->getModelName();
            return new $modelName;
        }

        return $this->findModel($id);
    }
}
