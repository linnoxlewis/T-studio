<?php

namespace app\controllers;

use Yii;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Базовый контроллер для CRUD операций.
 */
abstract class CommonController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Список записей.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = $this->getSearchModelName();
        $searchModel = new $searchModel;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Отобращает одну запись модели.
     *
     * @param integer $id id записи.
     *
     * @return mixed
     */
    public function actionView(int $id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Создаёт новую модель.
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = $this->getModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    }

    /**
     * Обновляет текущую запись модели.
     *
     * @param int $id
     *
     * @return string|\yii\web\Response
     */
    public function actionUpdate(int $id)
    {
        $model = $this->getModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' =>$model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Удаляет текущую запись модели.
     *
     * @param int $id  id записи
     *
     * @return \yii\web\Response
     *
     */
    public function actionDelete(int $id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Находит модель.
     *
     * @param int $id
     *
     * @return mixed
     *
     * @throws NotFoundHttpException
     */
    protected function findModel(int $id = null)
    {
        $modelName = $this->getModelName();
        $model = new $modelName;
        $result = call_user_func([
            $model,
            'findOne',
        ], $id);

        if ($result !== null) {
            return $result;
        }

        throw new NotFoundHttpException('Страница не найдена.');
    }

    /**
     * Возвращает имя основной модели.
     *
     * @return string
     */
    abstract protected function getModelName():string;

    /**
     * Возвращает имя модели для поиска.
     *
     * @return string
     */
    abstract protected function getSearchModelName():string;

    /**
     * Возвращает промежуточную модель для работы с основной.
     *
     * @param int|null $id
     *
     * @return Model
     */
    abstract protected function getModel(int $id = null);
}
