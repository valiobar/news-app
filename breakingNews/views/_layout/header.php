<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="icon" href="<?=APP_ROOT?>/content/images/favicon.ico" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=APP_ROOT?>/content/bootstrap.min.css">
    <link rel="stylesheet" href="<?=APP_ROOT?>/content/styles.css" />
    <script src="<?=APP_ROOT?>/content/scripts/jquery-3.0.0.min.js"></script>
    <script src="<?=APP_ROOT?>/content/scripts/blog-scripts.js"></script>
    <script src="<?=APP_ROOT?>/content/bootstrap.min.css"></script>
    <?php header("Content-Type: text/html");?>
    <title><?php if (isset($this->title)) echo htmlspecialchars($this->title) ?></title>
    <?php header("Content-Type: text/html");?>
</head>

<body>
<header>

<div style="min-height: 150px" class="tashak col-md-12">
    </div>
<div class="headerHome col-md-12">
    <nav class=" topNav navbar navbar-inverse navbar-fixed-top sticky col-md-12" >

            <div class=" col-md-2 navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand " href="<?=APP_ROOT?>"><img src="/breakingNews/content/images/blog_images/logo.png" width="80" height="50"></a>

            </div>
            <div class=" collapse navbar-collapse" id="myNavbar">

                <ul class="homeNav nav navbar-nav col-md-10">
                    <li class="active"><a href="<?=APP_ROOT?>/">Home</a></li>
                    <?php if ($this->isLoggedIn) : ?>
                    <li> <a href="<?=APP_ROOT?>/news">News</a></li>
                    <li> <a href="<?=APP_ROOT?>/news/create">Create Post</a></li>
                    <li>  <a href="<?=APP_ROOT?>/users">Users</a></li>

                    <div class=" home dropdown col-md-3">
                        <div class="hello col-md-8 ">
                            <span>Hello, <b><?=htmlspecialchars($_SESSION['username'])?></b></span>
                        </div>
                       <div class="col-md-4">


                        <ul class="dropdown-menu">
                            <li><a href="<?=APP_ROOT?>/users/logout">Logout</a></li>
                            <li><a href="<?=APP_ROOT?>/users/profile/<?= $_SESSION['user_id']?>">
                                    Profile
                                </a></li>

                        </ul>
                    </div>

              </div  >

                <?php else: ?>
                </ul>

                <ul style="margin-right: 5px" class=" nav navbar-nav navbar-right">
                    <li><a href="<?=APP_ROOT?>/users/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="<?=APP_ROOT?>/users/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php endif; ?>
                </ul>

            </div>

    </nav>
</div>
</header>

<?php require_once('show-notify-messages.php'); ?>
