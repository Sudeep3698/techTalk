<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to TechTalk</title>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URI; ?>templates/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URI; ?>templates/css/custom.css">
    <link rel="stylesheet" type="text/css" href="templates/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="templates/css/custom.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="templates/js/bootstrap.js"></script>
    <script type="text/javascript" src="templates/js/ckeditor/ckeditor.js"></script>
    <?php
    //Check if title is set, if not assign it
    if(!isset($title)) {
      $title = SITE_TITLE;
    }
    ?>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">TechTalk</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="index.php">Home</a></li>
            <?php if(!isLoggedIn()) : ?>
              <li><a href="register.php">Create An Account</a></li>
            <?php else : ?>  
              <li><a href="create.php">Create Topic</a></li>
            <?php endif; ?>  
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="main-col">
            <div class="block">
              <h1 class="pull-left"><?php echo $title; ?></h1>
              <h4 class="pull-right">A Simple PHP forum engine</h4>
              <div class="clearfix"></div>
              <hr>
              <?php displayMessage(); ?>