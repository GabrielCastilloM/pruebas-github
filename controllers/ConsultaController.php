<?php

namespace app\controllers;

use Yii;
use app\models\Consulta;
use app\models\ConsultaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ConsultaController implements the CRUD actions for Consulta model.
 */
class ConsultaController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Consulta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConsultaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Consulta model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Consulta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*public function actionCreate()
    {
        $model = new Consulta();

        if ($model->load(Yii::$app->request->post())) {

            $foto = UploadedFile::getInstance($model, 'foto');

            if($model->validate()){
                $model->save();
                if (!empty($foto)) {
                    $foto->saveAs(Yii::getAlias('web/archivos/') . $model->id.'foto.' . $foto->extension);
                    $model->foto = 'foto.' . $foto->extension;
                    $model->save(FALSE);
                }
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                'model' => $model,
            ]);
        }        
    }*/

    public function actionCreate()
    {
        $model = new Consulta(['scenario' => 'create']);

        if ($model->load(Yii::$app->request->post())) {
            try{
               $picture = UploadedFile::getInstance($model, 'foto');                       
               $model->foto = $_POST['Consulta']['estado'].'.'.$picture->extension;//nombre que queda registrado en la bd dependiendo del formulario
               if($model->save()){
                   $picture->saveAs('uploads/' . $model->id.'.'.$picture->extension);//nombre del archivo que  queda registrado en el servidor dependiendo del formulario
                   Yii::$app->getSession()->setFlash('success','Data saved!');
                   return $this->redirect(['view','id'=>$model->id]);
               }else{
                   Yii::$app->getSession()->setFlash('error','Data not saved!');
                   return $this->render('create', [
                         'model' => $model,
                   ]);
               }
          }catch(Exception $e){
              Yii::$app->getSession()->setFlash('error',"{$e->getMessage()}");
          }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    

    /**
     * Updates an existing Consulta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Consulta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Consulta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Consulta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Consulta::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionViewfoto($nama){
        $file = Yii::getAlias('img/' . $nama);
        return Yii::$app->response->sendFile($file, NULL, ['inline' => TRUE]);
    }
}
