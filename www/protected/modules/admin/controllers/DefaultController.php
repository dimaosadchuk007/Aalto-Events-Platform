<?php

class DefaultController extends Controller
{
	public $layout = 'admin.views.layouts.main';
	public function actionIndex()
	{
		$this->render('index');
	}
}