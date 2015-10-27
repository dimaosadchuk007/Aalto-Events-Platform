<?php
/* @var $this TagsController */
/* @var $model Tags */

$this->breadcrumbs=array(
	'Tags'=>array('index'),
	$model->tags_id=>array('view','id'=>$model->tags_id),
	'Update',
);


?>

<h1>Update Category: "<?php echo $model->tags_name; ?>"</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>