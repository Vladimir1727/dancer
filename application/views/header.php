<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Танцоры</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
</head>
<body>
    <script src="<?php echo base_url(); ?>js/jquery-2.0.0.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>js/verify.js"></script>
<!-- гланое меню -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/main">
		<img src="/img/logo.png" alt="logo">
      </a>

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
          
      	<li <?php if ($_SERVER['REQUEST_URI']=='/registration') echo 'class="active"'; ?>>
          
            <a href="<?php echo base_url(); ?>index.php/auth/registration/" <?php if(isset($_SESSION['name'])) echo 'class="hidden"'; ?>>
	      		
	      		Регистрация
	      	</a>
      	</li>
      	<li <?php if ($_SERVER['REQUEST_URI']=='/login') echo 'class="active"'; ?>>
            <a href="<?php echo base_url(); ?>index.php/auth/login/" <?php if(isset($_SESSION['name'])) echo 'class="hidden"'; ?> >
				
				Войти
			</a>
		</li>
    <li class="dropdown <?php if (!isset($_SESSION['name'])) echo ' hidden';?>">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Кабинет<span class="caret"></span></a>
      <ul class="dropdown-menu">
          <?php
          if (isset($_SESSION['name'])){
            echo '<li><a href="'.base_url().'index.php/cabinet/user/">Кабинет пользователя</a></li>';
            if ($_SESSION['dancer']>0) echo '<li><a href="'.base_url().'index.php/cabinet/dancer/">Кабинет танцора</a></li>';
            if ($_SESSION['trainer']>0) echo '<li><a href="'.base_url().'index.php/cabinet/trainer/">Кабинет тренера</a></li>';
            if ($_SESSION['cluber']>0) echo '<li><a href="'.base_url().'index.php/cabinet/cluber/">Кабинет руководителя клуба</a></li>';
            if ($_SESSION['organizer']>0) echo '<li><a href="'.base_url().'index.php/cabinet/organizer/">Кабинет организатора</a></li>';
            if ($_SESSION['admin']>0) echo '<li><a href="'.base_url().'index.php/cabinet/admin/">Кабинет Админа</a></li>';
          }
          ?>
       </ul>
		</li>
		
	</ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="navbar-text">
			     <?php if (isset($_SESSION['name'])) echo $_SESSION['name']; ?>
	     </li>
        <li <?php if (!isset($_SESSION['name'])) echo 'class="hidden"';?>>
        <a href="<?php echo base_url(); ?>index.php/auth/logout/">ВЫЙТИ</a>
        </li>
      </ul>
    	
    </div>
  </div>
</nav>
<!-- основной раздел -->
<main>