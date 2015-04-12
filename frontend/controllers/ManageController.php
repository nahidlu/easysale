<?php

namespace frontend\controllers;

use Yii;
use app\models\Supplier;
use app\models\Productcategory;
use app\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ManageController implements the CRUD actions for Supplier model.
 */
class ManageController extends Controller
{
	public $enableCsrfValidation = false;
   /*  public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    } */

    /**
     * Lists all Supplier models.
     * @return mixed
     */
    public function actionIndex()
    {
		//
		$searchModel = new Product();
		$dataProvider = $searchModel->search(Yii::$app->request->get());
		//
		
		
		$data = Productcategory::find()->asArray()->all();
		$line = "";
		foreach($data as $value){
		$line.="<option value=".$value['CategoryID'].">".$value['CategoryName']."</option>";
		}
				
		return $this->render('index',['line'=>$line,
		'dataProvider' => $dataProvider,
    'searchModel' => $searchModel,
		]);
    }
	
	public function actionTest(){
		return $this->render('create');
	}
	
	public function actionSupplier(){
		
		$data = json_decode(file_get_contents("php://input"));
		if(@$data->sn){
			$model = Supplier::findOne($data->sn);
			$model->SupplierID = $data->sn;
		}else{
			$model = new Supplier();
		}
		$model->SupplierName =  $data->sname;
		$model->Address =  $data->address;
		$model->ContactNo =  $data->contact;
		$model->ContactPerson = $data->contactperson;
		if($model->save()){
		$arr = array('msg' => "Supplier Added Successfully !!!", 'error' => '');
		//sleep(5);
        $jsn = json_encode($arr);
        print_r($jsn);
		
		}
	}
	
	public function actionSupplierdelete(){
		$data = json_decode(file_get_contents("php://input"));
		$user = Supplier::findOne($data->id);
		$user->delete();
		$arr = array('msg' => "User deleted Successfully !!!", 'error' => '');
        $jsn = json_encode($arr);
        print_r($jsn);
		
		
	}
	
	public function actionProductcategorydelete(){
		$data = json_decode(file_get_contents("php://input"));
		$user = Productcategory::findOne($data->id);
		$user->delete();
		$arr = array('msg' => "Product Category Name deleted Successfully !!!", 'error' => '');
        $jsn = json_encode($arr);
        print_r($jsn);
	}
	
	public function actionProductnamedelete(){
		
		$data = json_decode(file_get_contents("php://input"));
		$userd = Product::deleteAll('sn='.$data->id);
		$arr = array('msg' => "Product Name deleted Successfully !!!", 'error' => '');
        $jsn = json_encode($arr);
        print_r($jsn);
	}

	public function actionProductcategory(){
		
		$data = json_decode(file_get_contents("php://input"));
		if(@$data->sn){
			$model = Productcategory::findOne($data->sn);
			$model->CategoryID = $data->sn;
		}else{
			$model = new Productcategory();
		}
		$model->CategoryName =  $data->pname;
		if($model->save()){
		$arr = array('msg' => "Product Category Added Successfully !!!", 'error' => '');
		//sleep(5);
        $jsn = json_encode($arr);
        print_r($jsn);
		
		}
	}
	
	public function actionAddproductname(){
		
		$data = json_decode(file_get_contents("php://input"));
		if(@$data->sn){
			$model = Product::findOne($data->sn);
			$model->sn = $data->sn;
		}else{
			$model = new Product();
		}
		if(@$data->pid){
			
			$model->ProductID = $data->pid;
		}else{
			$pd = strtotime(date("Y-m-d H:i:s"));
			 $model->ProductID = $pd;
		}
		$model->ProductName =  $data->productname;
		$model->CategoryID =  $data->cname;
		if($model->save()){
		$arr = array('msg' => "Product Name Added Successfully !!!", 'error' => '');
        $jsn = json_encode($arr);
        print_r($jsn);
		
		}
		
	}
	
	public function actionProductnamelist(){
		$data = Product::find()->asArray()->all();
		print json_encode($data);
		
	}
	
	
	public function actionProductcategorylist(){
		
		$data = Productcategory::find()->asArray()->all();
		print json_encode($data);
	}
    /**
     * Displays a single Supplier model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
	
	public function actionSupplierlist()
	{
			$data = Supplier::find()->asArray()->all();
			//print_r($data);exit;
			print json_encode($data);
	}

    /**
     * Creates a new Supplier model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Supplier();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->SupplierID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Supplier model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->SupplierID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Supplier model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Supplier model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Supplier the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Supplier::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	public function actionSaveproduct(){
		$product = new Product;
		$product->ProductID = uniqid();		
		$product->ProductName = $_POST['pdname'];
		$product->CategoryID = $_POST['catname'];
		$product->BarcodeNeeded = 1;
		$product->ShopID = 28; 
		$product->save();
		if($product->save()){
		$arr = array('msg' => "Product Added Successfully !!!", 'error' => '');        
		}
		else
		{
			$arr = array('msg' => "Product Not Added !!!", 'error' => $product->getErrors());
        }
		header('Content-type: application/json');
		echo json_encode($arr,JSON_NUMERIC_CHECK);
		
	}
	
}
