<?php

namespace app\controllers;

use Yii;
use app\models\Propietario;
use app\models\PropietarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * PropietarioController implements the CRUD actions for Propietario model.
 */
class PropietarioController extends Controller
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
     * Lists all Propietario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PropietarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Propietario model.
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
     * Creates a new Propietario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Propietario();

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $studentId =$model->id;
            $image = UploadedFile::getInstance($model, 'student_image');//creo instacia que cargo en formulario 
            $imgName = 'stu_'.$studentId.'.'.$image->getExtension();//el nombre del archivo
            $image->saveAs(Yii::getAlias('@studentImgPath').'/'.$imgName);//guardo en carpeta del proyecto
            Yii::$app->getSession()->setFlash('success','Data saved!');//mensaje 
            $model->student_image = $imgName;//guardo el la base de datos
            $model->save();                 
            
            return $this->redirect(['view', 'id' => $model->id]);
        }
        

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Propietario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        //if ($model->load(Yii::$app->request->post()) && $model->save()) { 
        
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $studentId =$model->id;
            $image = UploadedFile::getInstance($model, 'student_image');//creo instacia que cargo en formulario 
            if ($image != null) {                
            $imgName = 'stu_'.$studentId.'.'.$image->getExtension();//el nombre del archivo
            $image->saveAs(Yii::getAlias('@studentImgPath').'/'.$imgName);//guardo en carpeta del proyecto
            Yii::$app->getSession()->setFlash('success','Data saved!');//mensaje 
            $model->student_image = $imgName;//guardo el la base de datos
            $model->save(); 
            }else

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Propietario model.
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
     * Finds the Propietario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Propietario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Propietario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
