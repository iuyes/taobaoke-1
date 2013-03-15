<?php
	class BlogClassModel extends CActiveRecord{
		
		public static function model( $classname = __CLASS__)
		{
			return parent::model($classname);
		}

		public function tableName(){
			return 'BlogClass';
		}

		public function primaryKey(){
			return 'Cid';
		}

		public function rules(){
			return array(
				array('Fid,ClassName,Time',
				'required'),
			);
		}

	
	}
