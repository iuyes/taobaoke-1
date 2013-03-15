<?php
/**
 * if you see these codes , you alreay know me !
 * your friend : bland !
 * @since 1.0
 *
 * the controller about blog 
 */
class GoodsController extends  Controller{

	public $layout = 'goodsFrame';	
	
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
				'actions'=>array('index,search,classsearch,storage,coupon,allsee,view,delete,update'),
				'roles'=>array('admin'),
			),
			array('deny',
				'actions'=>array('index,search,classsearch,storage,coupon,allsee,view,delete,update'),
				'users'=>array('*'),
			),   
		);  
	}   
	public function actionIndex(){
		$api = new Api();
		$result = $api->get_item(array('keyword'=>'衣服'));
		$this->checkerror($result);

		$result = $result->taobaoke_items->taobaoke_item;
		$keys   = $api->getfields();

		$dataProvider=new CArrayDataProvider($result, array(
			'id'=>'user',
			'sort'=>array(
				'attributes'=>array(
					'id', 'username', 'email',
				),
			),
			'pagination'=>array(
				'pageSize'=>10,
			),
		));
		$this->render('goodsmain',array('result'=>$result,'keys'=>$keys));
	}
	
	public function actionSearch(){

		// 搜索页面
		$params = array();
		
		$params['items'] = '';
		if(isset($_POST['goodssearch'])){
			
			$api = new Api($_POST['goodssearch']);
			$goods = $api->get_item($_POST['goodssearch']);	
			
			if($error = $this->checkerror($goods)){
				$this->savetem($error);				
				$params['error'] = $error;
			}else{
				$goods = $this->changetype($goods->taobaoke_items->taobaoke_item);
				$this->savetem(json_encode($goods));
				$keys   = $api->getfields();
				if(isset($keys)&&!empty($keys)){
					$params['keys'] = $keys;
				}else{
					$params['error']= 'key not exits';
				}
				if($goodsclass = $this->getgoodsclass()){
					$params['goodsclass'] = $goodsclass;
				}else{
					$params['error'] = 'class can not get';
				}
			}
		}
		
		if(isset($_POST['num_iid'])&&isset($_POST['goods_class'])){
			$items = array();
			$class = $_POST['goods_class'];
			$tem = $this->gettem();
			foreach($_POST['num_iid'] as $num_v){
				if(isset($tem[$num_v])){
					$title = addslashes(htmlspecialchars($tem[$num_v]['title']));
					$this->saveitem(json_encode($tem[$num_v]),$class,$title);
				}
			}
		}

		if(isset($goods)&&!empty($goods)){
			$params['goods'] = $goods;
		}
		//template goodssearch
		$this->addfile(array('js'=>'/js/jquery-1.7.2.min.js,/protected/modules/taobao/js/taobao.js'));
		$baseUrl = Yii::app()->baseUrl;
		$cs = Yii::app()->getClientScript();
		$this->render('goodssearch',$params);
	}

	public function actionClassSearch(){
		
		$this->render('gcsearch');
			
	}

	public function actionStorage(){
		$class = $this->getgoodsclass();
		foreach ($class as $key => $class_val){
			$num = $this->getgoodsnumbycid($class_val['Cid']);
			$class[$key]['goodsnum'] = $num;
		}

		if(isset($_POST['emptyclass'])){
			if(isset($_POST['cid'])&&!empty($_POST['cid'])){
				$this->delgoodsbycid($_POST['cid']);	
			}
		}
		$this->addfile(array('js'=>'/js/jquery-1.7.2.min.js,/protected/modules/taobao/js/taobao.js'));
		$this->render('storage',array('class'=>$class));
	}
	
	public function actionCoupon(){
		$this->render('coupon');
	}

	public function actionAllsee(){
		
		$condition = '';
		$class=$this->getgoodsclass();
		if(isset($_POST['form_allgoods'])){
			$condition = '1=1';
			$keyword = !empty($_POST['keyword'])?$_POST['keyword']:"";
			if(!empty($keyword)){
				$condition .= ' and  title like "%'.$keyword.'%"';
			}
			$cid = (int)$_POST['class'];
			if($cid !=0){
				$condition .= ' and Cid = '.$cid;
			}
		}
		if(isset($_POST['deletegid'])){
			if(isset($_POST['gid'])&&!empty($_POST['gid'])){
				$gid = (int)$_POST['gid'];
				$this->delgoodsbygid($gid);
			}
		}
		if(!empty($condition)){
			$goods=Yii::app()->db->createCommand('SELECT * FROM `Taobao_goods` where '.$condition)->queryAll();
		}else{
			$goods=Yii::app()->db->createCommand('SELECT * FROM `Taobao_goods`')->queryAll();
		}
		$goods = $this->getgoodsdata($goods);
		$this->addfile(array('js'=>'/js/jquery-1.7.2.min.js,/protected/modules/taobao/js/taobao.js'));
		$this->render('allgoods',array('goods'=>$goods,'class'=>$class));
	}

	public function actionView(){
	
	}
	
	public function actionDelete(){
	
	}

	public function actionUpdate(){
	
	}

	private function checkerror($data){
		if(isset($data->msg)){
			$error = @$data->code." : ".$data->msg;
			return $error;
		}
			return false;
	}
	
	private function savetem($tem){
		$tem = addslashes(htmlspecialchars($tem));
		$sql = "UPDATE `Taobao_tem` SET  `Tem` =  '".$tem."' WHERE `Tid` =1;";
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$command->execute();
	}
	private function gettem(){
		$sql = "select * from `Taobao_tem` where `Tid` = 1";
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$result = $command->queryAll();
		$result = json_decode($result[0]['Tem'],true);
		return $result;
	}

	private function getgoodsclass(){
		$sql = "select * from `Taobao_class`";
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$result = $command->queryAll();
		return $result;	
	}
	
	private function changetype($data){
		
		$current = array();
		foreach($data as $data_val){
			$data_val = (array)$data_val;
			$current[$data_val['num_iid']] = $data_val;
		}
		return $current;
	}

	private function saveitem($item,$class,$title){
		$item = addslashes($item);
		$sql = "insert into `Taobao_goods` (`Goods`,`Cid`,`Title`,`Uid`,`Time`) values('{$item}',{$class},'{$title}','1',".time().")";
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$command->execute();
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
	
	protected function delgoodsbycid($id){
		$sql = "delete from `Taobao_goods` where `Cid` ={$id}";
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$command->execute();

	}

	protected function delgoodsbygid($id){
		$sql = "delete from `Taobao_goods` where `Gid` ={$id}";
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$command->execute();

	}

	protected function getgoodsnumbycid($id){
		$sql = "select count(*) from `Taobao_goods` where `Cid`={$id}";
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$result = $command->queryAll();
		return $result[0]['count(*)'];
	}

	protected function char($data){
		if(is_array($data)){
			foreach($data as $key => $data_val){
				$utf = $this->gbk_utf($data_val);
				$data[$key] = $utf;
			}
			return $data;
		}else{
			return iconv("gb2312","utf-8//TRANSLIT",$data);
		}
	}

	protected function getgoodsdata($data){
		foreach($data as $key =>  $data_val){
			$goodsdetail = json_decode($data_val['Goods'],true);
			$data[$key]['title'] = $goodsdetail['title'];
			$data[$key]['nick']  = $goodsdetail['nick'];
			$data[$key]['price'] = $goodsdetail['price'];
			$data[$key]['pic_url'] = $goodsdetail['pic_url'];
			$data[$key]['click_url'] = $goodsdetail['click_url'];
		}
		return $data;
	}
}
?>
