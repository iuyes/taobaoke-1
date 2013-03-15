<?php
/**
 * author  : bland
 * created : 2013-3-7
 *
 * @since 1.0
 * management dashboard 
 * 
 */
class AdminManageController extends CController
{

	public $layout = 'framework';

	public function filters()
	{
		return array(
			'accessControl',
		);
	}	
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
	/**
	 * access control
	 */
	public function actionAccess(){
		
	}
	/**
	 * management mainpage
	 */
	public function actionIndex(){
		$this->render('main');	
	}
	/**
	 * login page , you will skip to this page if you not logged in.
	 */
	public function actionLogin(){
			
	}
	/**
	 * Logs out to current user and reidrect to Homepage.
	 */
	public function actionLogout(){
	
	}
}
?>
