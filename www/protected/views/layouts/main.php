<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles/events.css" rel="stylesheet"> 
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles/events2.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles/details.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles/login.css" rel="stylesheet">
    <!-- first : bootstrap.css, second: resent.css, third: main.css, media.css-->

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
     <!-- jQuery -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>

</head>

<body>
    <div navbar-left>
      <a href="/"><img src="/upload/logo.jpg"></img></a>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <!-- add this login glyphicon -->
                <ul class="nav navbar-nav navbar-right">
                <?php
                        if (Yii::app()->user->isGuest) {
                            ?>
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/login"><span class="glyphicon glyphicon-log-in"></span> login</a>
                                </li> 
                            <?php
                        }else{
                            ?>
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout"><span class="glyphicon glyphicon-log-in"></span> logout</a>
                                </li> 
                            <?php
                        }
                ?>

                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/registration"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="/"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li><a href="/Site/favorite"><span class="glyphicon glyphicon-star"></span> My events</a></li>
                </ul>
                 
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <nav class="primary clearfix">
      <ul class="portfolio-categ filter">

       <li class="intem_list"><a href="/"><span class="glyphicon glyphicon-star-empty"></span> All</a></li>
      <?php 
      $tags= Tags::model()->findAll();
      $counter = 0;
      $arrayOfItems = array("book","education","apple","music","knight");
      foreach($tags as $key => $value){
        echo "<li class='intem_list'><a href='/Site/tags?id=$value->tags_id''><span class='glyphicon glyphicon-$arrayOfItems[$counter]'></span> $value->tags_name</a></li>";
        $counter++;
      }
      ?>
      </ul>
    </nav> 

<!-- старіша версія -->
<!--  -->


    <div class="container">


         <div class="row">
             <ul class="portfolio-area">   
              <?php echo $content; ?>
               <div class="column-clear"></div>
            </ul><!--end portfolio-area -->
         </div>

    </div>
    <!-- /.container -->

 <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Aalto Events Platform 2015</p>
                </div>
            </div>
        </div>
    </footer>

   
</body>
</html>

   