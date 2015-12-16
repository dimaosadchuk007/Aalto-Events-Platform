
<?php 
        foreach ($model as $key => $value) {
            ?>
                <li class="portfolio-item2" data-id="id-0" data-type="cat-item-3">  
              <div class="panel panel-default">
                
                         <div class="panel-heading">
                                <h4><i class="fa fa-fw fa-check"></i>
                                <div class="event_title">
                                <span class="glyphicon glyphicon-bookmark"></span>
                                    <?php 
                                    if(strlen($value->event_title)>50){
                                        $res = substr($value->event_title,0,50);
                                     echo $res."...";   
                                    }else{
                                    echo $value->event_title;
                                    }
                                ?> 
                                </div>
                               
                                </h4>
                        </div>   
                                 
                <span class="image-block">
                  <a href="/Site/ShowDetail/?id=<?=$value->event_id?>" class="img-responsive img-portfolio img-hover"><img width="225" height="140" src="<?php echo $value->event_image ?>"/>                    
                  </a>
                </span>
                <div class="panel-body">
                <div class="home-portfolio-text">
                  <p><span class="glyphicon glyphicon-calendar"></span><?php echo $value->event_date ?></p>
                </div>
                </div>
              </div>    
            </li>   
            <?
         } 
 ?>
      