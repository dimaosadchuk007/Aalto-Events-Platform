<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<!-- тут крутяться лише рядки -->
<tr>
	<td><?=$data->user_id ?></td>
	<td><?=$data->user_email ?></td>	
	<td><?=$data->user_password ?></td>
	<td><?=$data->user_name ?></td>
	<td><?=$data->user_avatar ?></td>
	<td><?=$data->user_login ?></td>
	<td><?=$data->group ?></td>
	<td class="text-center"><a href="/admin/users/update/?id=<?=$data->user_id?>"><img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_edit_pen_pencil_-48.png" height="25" width="25" alt="edit"></a></td>
	<td class="text-center"><a href="/admin/users/delete/?id=<?=$data->user_id?>"><img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-48.png" height="25" width="25" alt="delete"></a></td>
	<!-- <td class="text-center"><a href="/admin/events/view/?id=<?=$data->user_id?>"><img src="https://cdn2.iconfinder.com/data/icons/flat-ui-icons-24-px/24/eye-24-48.png" height="25" width="25" alt="view"></a></td> -->
</tr>