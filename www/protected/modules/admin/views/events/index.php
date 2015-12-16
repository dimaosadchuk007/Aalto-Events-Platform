<?php
/* @var $this EventsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Events',
);

/*$this->menu=array(
	array('label'=>'Create Events', 'url'=>array('create')),
	array('label'=>'Manage Events', 'url'=>array('admin')),
);*/
?>

<h1>Events</h1>


<table class="list .table-responsive">
	<tr>
	    <th>id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Image</th>
        <th>Date</th>
        <td>Edit</td>
		<td>Delete</td>
		<!-- <td>View</td> -->
	</tr>

<!-- віджет відіграє роль циклу -->
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

</table>


<span class="contentNav">
	<a href="/admin/events/create/">Add</a>
	<a href="/admin/events/admin/">Manage</a>
</span>

