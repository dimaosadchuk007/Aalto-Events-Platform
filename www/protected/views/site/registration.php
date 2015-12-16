<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Registration';
$this->breadcrumbs=array(
	'Registration',
);
?>

<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">
        <h1 class="text-center login-title">Registration form</h1>
        <div class="account-wall">
            <img class="profile-img" src="/upload/login_logo.jpg"alt="">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'login-form',
				'enableClientValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
				'htmlOptions' => array(
					'class' => 'form-signin',
				),
			)); ?>

			<?php echo $form->textField($model,'username',array('class'=>'form-control','required'=>'required','autofocus'=>'autofocus', 'placeholder'=>'Username')); ?>
			<?php echo $form->textField($model,'email',array('class'=>'form-control','required'=>'required','autofocus'=>'autofocus', 'placeholder'=>'Email')); ?>
			<?php echo $form->textField($model,'login',array('class'=>'form-control','required'=>'required','autofocus'=>'autofocus', 'placeholder'=>'Login')); ?>
			<?php echo $form->passwordField($model,'password',array('class'=>'form-control', 'placeholder'=>'Password')); ?>
			<?php echo CHtml::submitButton('Sign up',array('class'=>'btn btn-lg btn-primary btn-block')); ?>
	      

			<?php $this->endWidget(); ?>
		</div>
    </div>
</div>