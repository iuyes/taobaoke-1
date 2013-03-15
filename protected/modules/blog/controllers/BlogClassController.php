<?php
	class BlogClassController extends Controller{
		
		public $layout = "blogAdminFrame";
		
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
				'actions'=>array('index,add,view,update,delete'),
				'roles'=>array('admin'),
			),
			array('deny',
				'actions'=>array('index,add,view,update,delete'),
				'users'=>array('*'),
				),   
			);  
		}   
		
		public function actionIndex(){
			$model = new BlogClassModel();
			$dataprovider = new CActiveDataProvider('BlogClassModel',
				array(
					'criteria'=>array(
						'order' => 'Cid asc',
					),
					'pagination'=>array(
						'pagesize'=>20,
					)
				));
			$this->render('classmain',array('dataProvider'=>$dataprovider));
		}
		public function actionadd(){
			$model = new BlogClassModel();
			$tree = new Tree();
			$allclass = $this->getclass();
			$tree->pro($allclass);
			$data = "<ul id='red' class='treeview-default'>".substr($tree->gettree(),4);
			if(isset($_POST['BlogClassModel'])){
				$dataProvider = array_merge($_POST['BlogClassModel'],array('Time'=>time()));
				$model->attributes = $dataProvider;
				if($model->validate()){
					$model->save();
				}
			}

			$file = array('js'=>'/js/jquery-1.7.2.min.js,/protected/modules/blog/js/jquery.cookie.js,
				/protected/modules/blog/js/jquery.treeview.js,
				/protected/modules/blog/js/blog.js',
				'css'=>'/protected/modules/blog/css/jquery.treeview.css');

			$this->addfile($file);
			$this->render('blogclasscreate',array('model'=>$model,'allclass'=>$allclass,'data'=>$data));
		}
		public function actionView($id){
			$this->render('classview',array(
				'model'=>$this->loadModel($id),
			));

		}

		public function actionUpdate($id){
			$model=$this->loadModel($id);

			if(isset($_POST['BlogClassModel']))
			{
				$model->attributes=$_POST['BlogClassModel'];
				if($model->save())
					$this->redirect(array('index'));
			}

			$this->render('update',array(
				'model'=>$model,
			));

		}

		public function actionDelete($id){
			$this->loadModel($id)->delete();

			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));

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
			$model=BlogClassModel::model()->findByPk($id);
			if($model===null)
				throw new CHttpException(404,'The requested page does not exist.');
			return $model;
		}

	}
?>
