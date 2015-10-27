<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/template/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/template/css/events.css" rel="stylesheet">
    <!-- first : bootstrap.css, second: resent.css, third: main.css, media.css-->

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="brand">Aalto Events</div>
    <div class="address-bar">Alone we can do so little; together we can do so much - Helen Keller</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
    <h3 class="text-center"> Welcome to admin page</h3>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
                

        </div>

     <div class="row">
      
            <div class="col-md-3 nav_admin">
            <div class="avatar">    <img src="<?php echo Yii::app()->request->baseUrl; ?>/template/img/avatar.png" alt=""></div>
                 <ul class="nav navbar-nav">
                    <li>
                        <a href="/admin/">Home</a>
                    </li>
                    <li>
                        <a href="/admin/tags/">Categories</a>
                    </li>
                     <li>
                        <a href="/admin/users/">Users</a>
                    </li>
                      <li>
                        <a href="#">Categories</a>
                    </li>
                    
                </ul>
            </div>
            
            <div class="col-md-9">
                  <?php echo $content; ?>
            </div>

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
