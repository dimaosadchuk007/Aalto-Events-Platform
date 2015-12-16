 <?php
/* @var $this TagsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Categories',
);
?>

<!-- Tags == Categories -->
<h1>Categories</h1>

<!-- 
/*
		<?php if (isset($dataEvents)) {
			foreach ($dataEvents as $e) {
				echo $e->event_title;
				echo "<br>";
			}
			

		} ?>
*/ 
-->
<!-- <form action="" method="post">
	<input type="text" name="text" value="hello world motherfucker">
	<input type="submit" name="sub" value="submit">
</form> -->

<table class="list">
	<tr>
		<td>#</td>
		<td>Categories</td>
		<td>Edit</td>
		<td>Delete</td>
		<!-- <td>View</td> -->
	</tr>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</table>

<span class="contentNav">
	<a href="/admin/tags/create/">Add</a>
	<a href="/admin/tags/admin/">Manage</a>
</span>