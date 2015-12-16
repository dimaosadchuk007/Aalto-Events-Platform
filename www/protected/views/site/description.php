<div id="fb-root"></div>
    <!-- facebook -->
    <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
   	</script>

    <!-- google map scritp -->
    <script>
      function initialize() {
        var myLatlng = new google.maps.LatLng("<?php echo $model->event_x;?>","<?php echo $model->event_y;?>");
        var mapCanvas = document.getElementById('map');
        var mapOptions = {
          center: myLatlng,
          zoom: 15,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
        var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        draggable:false,
      });
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

         <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Description
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7">
                <a href="#">
                   <img class="img-responsive img-portfolio img-hover" src="<?php echo $model->event_image;?>" height="auto" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3><i class="fa fa-fw fa-check"></i> Details</h3>
                    </div>
                    <div class="panel-body">
                        <p><?php echo $model->event_description; ?></p>
                  		<meta name="description" content="<?php echo $model->event_description; ?>">
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3><i class="fa fa-fw fa-check"></i> WHEN AND WHERE</h3>
                    </div>
                    <div class="panel-body">
                        <div id="map" ></div>
                        <hr>
                        <p><span class="glyphicon glyphicon-time"></span><?php echo $model->event_date; ?></p>
                    </div>
                </div>
                
     
				<input type="hidden" name="action_id" value="<?=$model->event_id?>">
				<?php
					if (!Yii::app()->user->isGuest) {
						$find = Favorites::model()->findAllByAttributes(array('fav_user'=>$user_id, 'fav_event'=>$model->event_id));
						if(count($find)==0){
							echo '<a class="btn btn-primary" act="1" id="addToFavorite">Add to favorite</a>';
						}else{
							echo '<a class="btn btn-primary" act="0" id="addToFavorite">Remove from favorites</a>';
						}
					}
				?>
<!--     add to/ reomve from favorite -->
	<script type="text/javascript">
		$(document).ready(function() {
			$("#addToFavorite").click(function(){
				$.get("/site/Api",{
					action: 1,
					events: $("input[name='action_id']").val()
				});
				$(this).toggleClass("btn-success");
				var act = $(this).attr("act");
				if(act == 0){
					$("#addToFavorite").text("Add to favorite");
					$("#addToFavorite").attr("act",1);
				}else{
					$("#addToFavorite").text("Remove from favorites");
					$("#addToFavorite").attr("act",0);
				}
			});
		});
	</script>
    
    <div class="fb-share-button" data-href="http://aalto_events.ua/Site/ShowDetail/?id=<?php echo $model->event_id;?>" data-layout="button_count"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3><i class="fa fa-fw fa-check"></i>What is on your mind?</h3>
                    </div>
                    <div class="panel-body">
                        <div class="input-group">
                            <form action="" method="POST">
                            	<input type="text" class="form-control input-sm chat-input" name="text" required placeholder="Write your message here..." />
                            	<input type="submit" class="btn btn-primary btn-sm" value="Add Comment" name="addComm">
                            </form>
                        </div>
                        <div class="commBody">
                        	<?php
                        		foreach ($comments as $key => $value) {
                        			?>
										<div>
											<div>
												<?php
													$author = Users::model()->findByPk($value->comm_author);
													echo "<b>$author->user_login</b> (".date("d.m.Y H:i:s",$value->comm_date)."):";
												?>
												<span><?=$value->comm_text?></span>
											</div>
										</div>
                        			<?php
                        		}
                        	?>
                        </div>
                    </div>
                </div>
            </div>
        </div> 