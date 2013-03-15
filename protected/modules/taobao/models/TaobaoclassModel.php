<?php
	class TaobaoclassModel extends CActiveRecord{
		
		public static function model( $classname = __CLASS__)
		{
			return parent::model($classname);
		}

		public function tableName(){
			return 'Taobao_class';
		}

		public function primaryKey(){
			return 'Cid';
		}

		public	function attributeLabels(){
			return array(
				'CName'=>'分类名',
			);

		}

		public function rules(){
			return array(
				array('CName,Time',
				'required'),
			);
		}	
	
	}
?>
