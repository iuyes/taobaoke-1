<?php
	//Unified entrance
class TheBlog{
	//related to blog
	public static function createblog($data){
		$blog = new BlogTableModel();
		$blog->attributes = $data;
		$blog->save();		
	}

	public static function deleteblog(){

	}

	public static function updateblog(){

	}

	public static function getblog(){

	}
	//related class	
	public static function createclass(){

	}

	public static function updateclass(){

	}

	public static function getclass(){

	}

	public static function deleteclass(){

	}


}
?>
