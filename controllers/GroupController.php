<?php

namespace app\controllers;

use app\models\Group;
use app\models\SearchGroup;

/**
 * Контроллер для работы с группами.
 */
class GroupController extends CommonController
{
    /**
     * Возвращает имя модели
     *
     * @return string
     */
    protected function getModelName():string
    {
        return Group::class;
    }

    /**
     * Возвращает имя поисковой модели
     *
     * @return string
     */
    protected function getSearchModelName():string
    {
        return SearchGroup::class;
    }

    /**
     * Возвращает модель
     *
     * @param int|null $id
     *
     * @return Group
     */
    protected function getModel(int $id = null): Group
    {
        if (null == $id){
            $modelName = $this->getModelName();
            return new $modelName;
        }

        return $this->findModel($id);
    }
}
