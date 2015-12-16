<?php

class SiteController extends Controller
{
	

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
					'actions'=>array('index','api','showdetail','login','logout','favorite','tags','registration'),
					'users'=>array('*'),
				),
				array('deny',  // deny all users
					'users'=>array('*'),
				),
			);
		}
	
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$criteria = new CDbCriteria;
		$criteria->order="event_id DESC";

		$model=Events::model()->findAll($criteria);

		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index',array(
			'model'=>$model,
			));
	}


	public function actionFavorite()
	{
		$user_id =$this->getUserId();
		$fav = Favorites::model()->findAllByAttributes(array('fav_user'=>$user_id));
		foreach ($fav as $key => $value) {
			$params[] = $value->fav_event;
		}
		$criteria = new CDbCriteria;
		$criteria->order="event_id DESC";
		$model=Events::model()->findAllByAttributes(array('event_id'=>$params),$criteria);
		$this->render('index',array(
			'model'=>$model,
		));

	}


	public function actionTags($id)
	{
		$fav = EventTag::model()->findAllByAttributes(array('et_tag'=>$id));
		foreach ($fav as $key => $value) {
			$params[] = $value->et_event;
		}
		$criteria = new CDbCriteria;
		$criteria->order="event_id DESC";
		$model=Events::model()->findAllByAttributes(array('event_id'=>$params),$criteria);
		$this->render('index',array(
			'model'=>$model,
		));

	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionRegistration()
	{
 
		$model=new RegistrationForm;
		$newUser = new Users;
       // if it is ajax validation request
                if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
                {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }

		// collect user input data
		if(isset($_POST['RegistrationForm']))
		{
						$model->attributes=$_POST['RegistrationForm'];
			 			$newUser->user_name = $model->username;
                        $newUser->user_password = md5($model->password);
                        $newUser->user_email = $model->email;
                        $newUser->user_login = $model->login;
                        $newUser->group = '0';
                      
                                
                        if($newUser->save()) {
                                $identity=new UserIdentity($newUser->user_login,$model->password);
                                $identity->authenticate();
                                Yii::app()->user->login($identity,0);
                                //redirect the user to page he/she came from
                                $this->redirect('/site');
                        }
		}
		// display the register form
		  $this->render('registration',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionShowDetail($id){
		$model=Events::model()->findByPk($id);
		$user_id = $this->getUserId();
		$criteria = new CDbCriteria();
		$criteria->order = "comm_id DESC";
		$comments = Comments::model()->findAllByAttributes(array('comm_event'=>$id),$criteria);
		$user_id = $this->getUserId();
		if(isset($_POST['addComm'])){
			$text = $_POST['text'];
			if(!empty($text)){
				$comment = new Comments();
				$comment->comm_text = $text;
				$comment->comm_date = strtotime(date("d.m.Y H:i:s"));
				$comment->comm_author = $user_id;
				$comment->comm_event = $id;
				$comment->save();
			}
		}

		$this->render('description',array(
			'model'=>$model,
			'comments'=>$comments,
			'user_id'=>$user_id
		));
	}

	public function actionApi($action, $events=0){
		if(trim($action == 1)){
			$user_id = $this->getUserId();
			$find = Favorites::model()->findAllByAttributes(array('fav_user'=>$user_id, 'fav_event'=>$events));
			if(count($find) == 0){
				$add_event = new Favorites();
				$add_event->fav_user = $user_id;
				$add_event->fav_event = trim($events);
				$add_event->save();
			}else{
				Favorites::model()->deleteAllByAttributes(array('fav_user'=>$user_id, 'fav_event'=>$events));
			}
		}
	}

	public function getUserId(){
		$model = Users::model()->findByAttributes(array('user_login'=>trim(Yii::app()->user->id)));
		return $model->user_id;
	}
}