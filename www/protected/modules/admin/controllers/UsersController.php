<?php

class UsersController extends Controller
{
	public $layout = 'admin.views.layouts.main';
	
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		//	'postOnly + delete', // we only allow deletion via POST request
		);
	}
	public function actionHello(){
		$var = "hello world";
		$this->render('hello',array('sendHello'=>$var));
	}


	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','index','view','admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$group = $this->getUserGroup();
		if($group == 1){
			$this->render('view',array(
				'model'=>$this->loadModel($id),
			));
		}else{
			$this->redirect('/site');
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

	public function actionCreate()
	{
		$group = $this->getUserGroup();
		if($group == 1){
			$model=new Users;
			$date = strtotime(date("d.m.Y H:i:s"));
			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Users']))
			{
				$model->attributes=$_POST['Users'];
				$uploadedFile = CUploadedFile::getInstance($model,'user_avatar');
				$model->user_avatar = '/upload'.$date.$uploadedFile;
				if($model->save()){
					$path = Yii::getPathOfAlias('webroo').'/upload/'.$date.$uploadedFile;
					$uploadedFile->saveAs($path);
					$this->redirect(array('/admin/users/'));
				}
			}

			$this->render('create',array(
				'model'=>$model,
			));
		}else{
			$this->redirect('/site');
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$group = $this->getUserGroup();
		if($group == 1){
			$model=$this->loadModel($id);
			$date = date_format(new DateTime(), 'Y-m-d-H-i-s');

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);
			$imageTmp = $model->user_avatar;
			if(isset($_POST['Users']))
			{
				$model->attributes=$_POST['Users'];
				$uploadedFile = CUploadedFile::getInstance($model,'user_avatar');

			if (!empty($uploadedFile)) {
					$model->user_avatar = '/upload/'.$date.$uploadedFile;
						$uploadedFile->saveAs(Yii::getPathOfAlias('webroot').'/upload/'.$date.$uploadedFile);
			}else{
				$model->user_avatar=$imageTmp;
			}


				if($model->save())
					$this->redirect(array('view','id'=>$model->user_id));
			}

			$this->render('update',array(
				'model'=>$model,
			));
		}else{
			$this->redirect('/site');
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
/*	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}*/

	public function actionDelete($id)
	{
		$group = $this->getUserGroup();
		if($group == 1){
			$this->loadModel($id)->delete();
			$this->redirect(array('/admin/users/'));
		}else{
			$this->redirect('/site');
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$group = $this->getUserGroup();
		if($group == 1){
			$dataProvider=new CActiveDataProvider('Users');
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
			));
		}else{
			$this->redirect('/site');
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$group = $this->getUserGroup();
		if($group == 1){
			$model=new Users('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Users']))
				$model->attributes=$_GET['Users'];

			$this->render('admin',array(
				'model'=>$model,
			));
		}else{
			$this->redirect('/site');
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	public function getUserGroup(){
		$model = Users::model()->findByAttributes(array('user_login'=>trim(Yii::app()->user->id)));
		return $model->group;
	}
}