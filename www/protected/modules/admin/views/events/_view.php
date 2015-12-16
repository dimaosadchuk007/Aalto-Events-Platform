<?php
/* @var $this EventsController */
/* @var $data Events */
?>
<!-- тут крутяться лише рядки -->

	<tr>
	    <td> <?=$data->event_id ?></td>
        
        <td>
			<span class="title">
       		 <?=$data->event_title ?>
       		 </span>
        </td> 
        
        <td>
			<span class="description">
        		<?=$data->event_description ?>
       		</span>
        </td>
        
        <td> 
			
				<span class="image">
        		 <!--  <?=$data->event_image ?> -->
              <img src="<?=$data->event_image ?>" class="img-responsive" alt="show me image please">
       			</span>
       </td>
        <td> <?=$data->event_date ?></td>
        <td class="text-center"><a href="/admin/events/update/?id=<?=$data->event_id?>"><img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_edit_pen_pencil_-48.png" height="25" width="25" alt="edit"></a></td>
		<td class="text-center"><a href="/admin/events/delete/?id=<?=$data->event_id?>"><img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-48.png" height="25" width="25" alt="delete"></a></td>
	<!--   <td class="text-center"><a href="/admin/events/view/?id=<?=$data->event_id?>"><img src="https://cdn2.iconfinder.com/data/icons/flat-ui-icons-24-px/24/eye-24-48.png" height="25" width="25" alt="view"></a></td> -->
     </tr>