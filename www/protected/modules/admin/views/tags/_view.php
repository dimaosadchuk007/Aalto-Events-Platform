<?php
/* @var $this TagsController */
/* @var $data Tags */
?>

<!-- тут крутяться лише рядки -->
<tr>
	<td><?=$data->tags_id ?></td>
	<td><?=$data->tags_name ?></td>
	<td class="text-center"><a href="/admin/tags/update/?id=<?=$data->tags_id?>"><img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_edit_pen_pencil_-48.png" height="25" width="25" alt="edit"></a></td>
	<td class="text-center"><a href="/admin/tags/delete/?id=<?=$data->tags_id?>"><img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-48.png" height="25" width="25" alt="delete"></a></td>
	<td class="text-center"><a href="/admin/tags/view/?id=<?=$data->tags_id?>"><img src="https://cdn2.iconfinder.com/data/icons/flat-ui-icons-24-px/24/eye-24-48.png" height="25" width="25" alt="view"></a></td>
</tr>
