<?php

namespace app\controllers;

use app\models\Group;
use app\models\SearchGroup;

/**
 * Контроллер для работы с группами.
 *
 * Class GroupController
 *
 * @package app\controllers
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
}
