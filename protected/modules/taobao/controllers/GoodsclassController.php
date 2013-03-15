<?php
	class GoodsclassController extends Controller{
	
		public $layout ='goodsFrame';
		
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
					'actions'=>array('index,view,delete,update,classlist'),
					'roles'=>array('admin'),
				),
				array('deny',
					'actions'=>array('index,view,delete,update,classlist'),
					'users'=>array('*'),
				),   
			);  
		}   
		public function actionIndex(){

			$model = new TaobaoclassModel();	

			if(isset($_POST['Taobaoclass'])){
				$model->attributes = array_merge($_POST['Taobaoclass'],array('Time'=>time()));
				if($model->validate()){
					$model->save();
				}
			}
			$this->render('classadd',array('model'=>$model));

		}

		public function actionView($id){
				$this->render('classview',array(
								'model'=>$this->loadModel($id),
										));	
		}

		public function actionDelete($id){
			$this->loadModel($id)->delete();

			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));	
		}

		public function actionUpdate($id){
			$model=$this->loadModel($id);

			if(isset($_POST['TaobaoclassModel']))
			{
				$model->attributes=$_POST['TaobaoclassModel'];
				if($model->save())
					$this->redirect(array('index'));
			}

			$this->render('update',array(
				'model'=>$model,
			));
		}

		public function actionClasslist(){
			$model = new TaobaoclassModel();
			$dataProvider = new CActiveDataProvider('TaobaoclassModel',
				array(
					'criteria'=>array(
						'order' => 'Time Desc',
					),
					'pagination'=>array(
						'pagesize'=>20,
					)

				)
			);

			$this->render('classlist',array('model'=>$model,'dataProvider'=>$dataProvider));
		}

		public function loadModel($id)
		{
			$model=TaobaoclassModel::model()->findByPk($id);
			if($model===null)
				throw new CHttpException(404,'The requested page does not exist.');
			return $model;
		}	

	}
?>
