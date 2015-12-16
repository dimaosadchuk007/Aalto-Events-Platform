<?php

class EventsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = 'admin.views.layouts.main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
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
			$this->redirect('/site/rooms/');
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
			$model=new Events;
			$date = strtotime(date("d.m.Y H:i:s"));
			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Events']))
			{

				$model->attributes=$_POST['Events'];
				$uploadedFile = CUploadedFile::getInstance($model, 'image');

				$model->event_image = '/upload/'.$date.$uploadedFile;

				if($model->save()){
					$path =Yii::getPathOfAlias('webroot').'/upload/'.$date.$uploadedFile;
					$uploadedFile->saveAs($path);
					$this->redirect(array('/admin/events/'));
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
			$imageTmp=$model->event_image;
			if(isset($_POST['Events']))
			{	
				
				$model->attributes=$_POST['Events'];
				$uploadedFile = CUploadedFile::getInstance($model,'image');
				
				if (!empty($uploadedFile)){
						$model->event_image = '/upload/'.$date.$uploadedFile;
						$uploadedFile->saveAs(Yii::getPathOfAlias('webroot').'/upload/'.$date.$uploadedFile);
					}else{
						$model->event_image=$imageTmp;
					}

				if($model->save()){
					$this->redirect(array('view','id'=>$model->event_id));
				}
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
/*	
public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
*/
	public function actionDelete($id)
    {
    	$group = $this->getUserGroup();
		if($group == 1){
			Events::model()->deleteByPk($id);
			$this->redirect(array('/admin/events/'));
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
			$dataProvider=new CActiveDataProvider('Events', array(
		    'criteria'=>array(
		        'order'=>'event_id DESC',
		    )));
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
			$model=new Events('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Events']))
				$model->attributes=$_GET['Events'];

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
	 * @return Events the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Events::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Events $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='events-form')
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
