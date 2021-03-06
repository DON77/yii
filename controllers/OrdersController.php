<?php

namespace app\controllers;

use Yii;
use app\models\Orders;
use app\models\search\SearchOrders;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SearchOrders();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orders model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Orders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
         $model = new Orders();
        if (Yii::$app->request->isAjax) {
            $last_order = Orders::find()->orderBy(['id'=>SORT_DESC])->one();
            $last_order_id = $last_order ? $last_order->order_id+1 : 1;
            $orders = Yii::$app->request->post('orders');
            foreach ($orders as $order) {
                $order['order_id'] = $last_order_id;
                $model = new Orders();
                $model->order_id = $last_order_id;
                $model->price = $order['price'];
                $model->description = $order['descr'];
                $model->available = (int)$order['available'];
                if (!$model->save()) {
                    return $this->render('create', [
                                'model' => $model,
                    ]);
                }else {
                    $this->redirect('/orders/index');
                }
            }
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $order_ = Orders::findOne(['id'=>$id]);
        $orders = Orders::findAll(['order_id'=>$order_->order_id]);
        

        $post = Yii::$app->request->post('Orders');
        if(!empty($post))
        {
           // echo "<pre>";            var_dump($post); die;
            foreach($post as $id => $row)
            {
                $order = Orders::findOne(['id'=>$id]);
                $order->price = $row['price'];
                $order->description = $row['description'];
                $order->available = (int)$row['available'];
                $order->save();
            }
            $this->redirect('/orders/index');
        }
        return $this->render('update', [
            'orders' => $orders,
        ]);
    }

    /**
     * Deletes an existing Orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
