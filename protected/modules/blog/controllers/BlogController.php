<?php
/**
 * if you see these codes , you alreay know me !
 * your friend : bland !
 * @since 1.0
 *
 * the controller about blog 
 */

class BlogController extends Controller{

	public $layout = 'blogAdminFrame';

	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	//access controll
	public function accessRules()
	{   
		return array(
			array('allow',
				'actions'=>array('index'),
				'roles'=>array('admin'),
			),
			array('deny',
				'actions'=>array('index'),
				'users'=>array('*'),
			),   
		);  
	}   

	public function actionIndex(){
		$model = new BlogTableModel();
		$dataProvider = new CActiveDataProvider('BlogTableModel',
			array(
				'criteria'=>array(
					'order' => 'Time Desc',
				),
				'pagination'=>array(
					'pagesize'=>20,
				)

			)
		);
		$this->render('blogmain',array('dataProvider'=>$dataProvider,'model'=>$model));
	}
	public function actionView($id){
		$this->render('blogview',array(
			'model'=>$this->loadModel($id),
		));	
	}

	public function actionCreate(){
		$class = $this->getclass();
		$blogmodel = new BlogTableModel();
		if(isset($_POST['BlogTableModel'])){
			$uid = Yii::app()->user->id;
			$dataProvider = array_merge($_POST['BlogTableModel'],array('Time'=>time(),'Uid'=>$uid));
			$blogmodel->attributes = $dataProvider;			
			if($blogmodel->validate()){
				$blogmodel->save();
			}
		}
		$this->render('blogcreate',array('model'=>$blogmodel,'class'=>$class));
	}

	public function actionDelete($id){
		$this->loadModel($id)->delete();

		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));	
	}
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['BlogTableModel']))
		{
			$model->attributes=$_POST['BlogTableModel'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	protected function getclass(){
		$allclass = Yii::app()->db->createcommand("select * from `BlogClass`")
			->queryAll();
		return $allclass;
	}

	protected function addfile($arr){
		$baseUrl = Yii::app()->baseUrl;
		$cs = Yii::app()->getClientScript();
		if(!empty($arr['js'])){
			$js = explode(",",$arr['js']);
			foreach($js as $v){
				$cs->registerScriptFile($baseUrl.$v);
			}
		}
		if(!empty($arr['css'])){
			$css = explode(",",$arr['css']);
			foreach($css as $v){
				$cs->registerCssFile($baseUrl.$v);
			}
		}
	}
	public function loadModel($id)
	{
		$model=BlogTableModel::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}
?>
