<?php

namespace app\controllers;

use app\models\Student;
use app\models\SearchStudent;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends CommonController
{
    /**
     * Возвращает имя модели
     *
     * @return string
     */
    protected function getModelName():string
    {
        return Student::class;
    }

    /**
     * Возвращает имя поисковой модели
     *
     * @return string
     */
    protected function getSearchModelName():string
    {
        return SearchStudent::class;
    }

    /**
     * Возвращает модель
     *
     * @param int|null $id
     *
     * @return Student
     */
    protected function getModel(int $id = null): Student
    {
        if (null == $id){
            $modelName = $this->getModelName();
            return new $modelName;
        }

        return $this->findModel($id);
    }
}
