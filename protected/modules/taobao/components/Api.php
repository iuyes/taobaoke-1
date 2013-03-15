<?php
$dir = dirname(__FILE__);
$pos = strrpos($dir,DIRECTORY_SEPARATOR,-1);
$dir = substr($dir,0,$pos);
require($dir.DIRECTORY_SEPARATOR.'include/TopClient.php');

class Api{
		
	//instance of TopClient
	protected  $c;
	//appKey 
	protected $appKey;
	//secretKey
	protected $secretKey;
	//
	protected $req;

	protected $fields;

	protected $pid;

	function __construct(){
		$this->c = new TopClient;
		$this->setkey();
	}
	
	public function getfields(){
		return explode(',',$this->fields);
	}

	protected function setkey(){
		$this->c->appkey = Yii::app()->params['appkey'];
		$this->c->secretKey = Yii::app()->params['secretkey'];
	}	

	public	function get_itemcats(){
		
	}

	public  function get_item($params){
	
		$this->req = new TaobaokeItemsGetRequest;
		//!! notice fields
		$this->fields = "num_iid,title,nick,pic_url,price,click_url,commission,
			commission_rate,commission_num,commission_volume,shop_click_url,seller_credit_score,item_location,volume";
		
		if (isset($this->req) && $this->c instanceof TopClient){
			$this->req->setFields($this->fields);

			if(isset(Yii::app()->params['nick'])&&!empty(Yii::app()->params['nick'])){
				$this->req->setNick(Yii::app()->params['nick']);
			}
			if(isset(Yii::app()->params['pid'])&&!empty(Yii::app()->params['pid'])){
				$this->req->setPid(Yii::app()->params['pid']);
			}
			if(isset($params['keyword'])&&!empty($params['keyword'])){
				$this->req->setKeyword($params['keyword']);
			}
			if(isset($params['cid'])&&!empty($params['cid'])){
				$this->req->setCid($params['cid']);
			}
			$resp = $this->c->execute($this->req);
			return $resp;
		}
	}	


	public  function get_coupon(){
	
	}


}
?>
