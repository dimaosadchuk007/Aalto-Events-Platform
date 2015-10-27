<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);
?>

<h1>Users</h1>




<table class="list">
	<tr>
		<td>User id</td>
		<td>Email</td>
		<td>Password</td>
		<td>Name</td>
		<td>Avatar</td>
		<td>Login</td>
		<td>Group</td>
	</tr>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</table>

<span class="contentNav">
	<a href="/admin/users/create/">Add</a>
	<a href="/admin/users/admin/">Manage</a>
</span>