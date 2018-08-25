<?php

namespace app\controllers;

use app\models\nominatedCourses;
use app\models\SearchNominatedCourses;
use Yii;

/**
 * Контроллер для работы с назначением занятий.
 */
class NominatedCoursesController extends CommonController
{
    /**
     * Создаёт новую модель. Перегрузка метода ввиду дополнительной логики.
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $groupId = null;

        if(Yii::$app->request->get('idGroup') !== null)
        {
            $groupId = Yii::$app->request->get("idGroup");
        }
        $model = $this->getModel();

        if ($model->load(Yii::$app->request->post())) {
            $model->statusId = 1;
           if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'group' => $groupId,
        ]);
    }

    /**
     * Возвращает имя модели
     *
     * @return string
     */
    protected function getModelName(): string
    {
        return NominatedCourses::class;
    }

    /**
     * Возвращает имя поисковой модели
     *
     * @return string
     */
    protected function getSearchModelName(): string
    {
        return SearchNominatedCourses::class;
    }

    /**
     * Возвращает модель
     *
     * @param int|null $id
     *
     * @return NominatedCourses
     */
    protected function getModel(int $id = null): NominatedCourses
    {
        if (null == $id) {
            $modelName = $this->getModelName();
            return new $modelName;
        }

        return $this->findModel($id);
    }

    /**
     * Установление статуса у занятия.
     *
     * @param int $id id занятия.
     *
     * @return string|\yii\web\Response
     */
    public function actionSetStatus(int $id)
    {
        $model = NominatedCourses::findOne($id);

        if(Yii::$app->request->isPost)
        {
            $model->statusId = Yii::$app->request->post()['NominatedCourses']['statusId'];;
            if($model->save()) {
                return $this->redirect(['index']);
            }
        }
        return $this->render('set-status', [
            'model' => $model,
        ]);

    }
}
