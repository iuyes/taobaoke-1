<?php
	class BlogTableModel extends CActiveRecord{

		public $Title; // blog title
		public $Content; // blog content
		public $Time;// publish time
		public $Cid;// class id
		public $Uid;// user id

		public static function model($className = __CLASS__){
			return parent::model($className);
		}

		public  function tableName(){
			return 'Blog';
		}

		public  function primaryKey(){
			return 'Bid';
		}
		public	function attributeLabels(){
			return array(
				'Title'=>'标题',
				'Content'=>'内容',
			);
		
		}
		public function rules(){
			return array(
				array(
					'Title,Content,Time,Cid,Uid',
					'required'
				),
				array(
					'Time',
					'numerical',
					'integerOnly' => true,
				),
				array(
					'Title',
					'length',
					'min' => 1,
				),
			);		
		}
	}
?>
