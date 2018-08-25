<?php

namespace app\controllers;

use app\models\SearchTeacher;
use app\models\Teacher;

/**
 * Контроллер для работы с преподователями.
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

    /**
     * Возвращает модель
     *
     * @param int|null $id
     *
     * @return Teacher
     */
    protected function getModel(int $id = null): Teacher
    {
        if (null == $id){
            $modelName = $this->getModelName();
            return new $modelName;
        }

        return $this->findModel($id);
    }
}
