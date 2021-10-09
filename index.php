<?php
require_once 'db.php';
$user = R::findOne('users', 'id = ?', array($_SESSION['user']->id));
?>


<?php if ($user) : ?>
    <!DOCTYPE html>
    <html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="/css/style.css">

        <title>Регистрация и авторизация</title>
    </head>

    <body>
        <div class="navbar-wrapper">
            <div class="container-fluid">
                <nav class="navbar navbar-fixed-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Logo</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#" class="">Home</a></li>
                                <li class=" dropdown">
                                    <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Departments <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li class=" dropdown">
                                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View Departments</a>
                                        </li>
                                        <li><a href="#">Add New</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Add New</a></li>
                            </ul>
                            <ul class="nav navbar-nav pull-right">
                                <li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Signed in as <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Change Password</a></li>
                                        <li><a href="#">My Profile</a></li>
                                    </ul>
                                </li>
                                <li class=""><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="container">

            <div class="resume">
                <header class="page-header">
                    <h1 class="page-title">Welcome, <?php echo $user->firstname; ?></h1>
                    <small>  Last Updated on: <time><?php echo date("l dS  F - Yг.  H:i:s"); ?></time></small>
                </header>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading resume-heading">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-xs-12 col-sm-4">
                                            <figure>
                                                <img class="img-circle img-responsive" alt="" src="http://www.canozelsaglik.com/wp-content/uploads/2015/02/smiley-face-300x300.png">
                                            </figure>

                                        </div>

                                        <div class="col-xs-12 col-sm-8">
                                            <ul class="list-group">
                                                <li class="list-group-item"><?php echo $user->firstname; ?></li>
                                                <li class="list-group-item">Software Engineer</li>
                                                <li class="list-group-item">Google Inc. </li>
                                                <li class="list-group-item"><i class="fa fa-phone"></i> 000-000-0000 </li>
                                                <li class="list-group-item"><i class="fa fa-envelope"></i> <?php echo $user->email; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>

    </html>
<?php else : ?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <!--links para o funcionamento da pág-->
        <meta charset="utf-8">


        <title>Регистрация и авторизация на PHP / RedBeanPHP</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="estilos/estilopag/sty.css">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="estilos/estilopag/estilo1.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
        <link rel="stylesheet" href="/css/style.css">

    </head>

    <body>


        <!--carrosel com informações sobre o app-->
        <div id="home" class="slider">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#main_slider" data-slide-to="0" class="active"></li>
                    <li data-target="#main_slider" data-slide-to="1"></li>
                    <li data-target="#main_slider" data-slide-to="2"></li>
                </ol>
                
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="https://www.lotescbl.com.br/wp-content/uploads/2019/11/conheca-sete-praias-de-aracruz-1280x720.jpg" alt="slider_img">
                        <div class="ovarlay_slide_cont">
                            <h2>PHP / RedBeanPHP</h2>
                            <h4>Registration and authorization</h4>
                            <p>Регистрация и авторизация с использованием PHP / RedBeanPHP</p>
                            <a href="signin.php"><button class="button button2">Войти</button></a> <a href="signup.php"><button class="button button2">Зарегистрироваться</button></a>
                        </div>
                    </div>


                    
             

            </div>
        </div>

            <!--script para o funcionamento do carrosel-->
            <script src="js/jquery-3.3.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>




    </body>

    </html>
<?php endif; ?>