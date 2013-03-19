<?php
	class DataDistributionController extends CController{
	/**
	 * if you see these codes , you alreay know me !
	 * your friend : bland !
	 * @since 1.0
	 *
	 * the controller about blog 
	 */
		
		public $layout = "";

		//default controll

		public function actionIndex(){


		}

		//classid : 分类ID ; num : 商品数量
		public function actionList($classid = null){

			$querystring ="";
			
			if(!is_null($classid)){
				$querystring .= 'and Cid='.$classid;
			}

			$allgoods = Yii::app()->db->createcommand("select * from `Taobao_goods` where 1=1 ".$querystring)
				->queryAll();

			$goodsarr = array();
			foreach($allgoods as $row){
				$gid = $row['Gid'];
				$cid = $row['Cid'];
				$goods = json_decode($row['Goods']);
				$goodsarr[] = array('gid'=>$gid,'cid'=>$cid,'goods'=>$goods);
			}

			$json = $this->toJson($goodsarr);
			print_r($json);
		}

		//详细信息
		public function actionView(){
		
		}
	
		public function actionClasslist(){
			
		}
		
		public function actionClassview(){
		
		}

		private function toJson($data){
			return json_encode($data);
		}

	}
