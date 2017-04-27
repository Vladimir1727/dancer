<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Танцоры</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style0.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
</head>
<body>
    <script src="<?php echo base_url(); ?>js/jquery-2.0.0.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>js/verify.js"></script>
<!-- главное меню -->

<div id="header_new">
 <div id="logo">
  <img src="/img/logo.png">
             <!-- /ambientlounge.com.ua/dancer/wp-content/themes/Impreza/framework/img/ -->
 </div>
 <div id="nav_bar">
  <div class="nav_bar_element">
   <a href="http://dancer.ambientlounge.com.ua"> главная</a>
  </div>
  <div class="nav_bar_element">
   <a href=""> новости</a>
  </div>
  <div class="nav_bar_element">
   <a href="<?php echo base_url(); ?>index.php/cabinet/"> конкурсы и регистрация</a>
   </div>
  <div class="nav_bar_element">
   <a href=""> результаты</a>
  </div>
  <div class="nav_bar_element">
   <a href=""> медиа</a>
  </div>
  <div class="nav_bar_element">
   <a href=""> контакты</a>
  </div>
  <div class="nav_bar_element">
   <a href=""> об организации</a>
  </div>
  
    <div class="nav_bar_element">
        <a href="<?php echo base_url(); ?>index.php/auth/registration/" <?php if(isset($_SESSION['name'])) echo 'class="hidden"'; ?>>
	    Регистрация
     	</a>
    </div>
    <div class="nav_bar_element">
        <a href="<?php echo base_url(); ?>index.php/auth/login/" <?php if(isset($_SESSION['name'])) echo 'class="hidden"'; ?> >
            Войти
	</a>
    </div>
    <div class="nav_bar_element dropdown <?php if (!isset($_SESSION['name'])) echo ' hidden';?>">
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
    </div>
     
    <div class="nav_bar_element <?php if (!isset($_SESSION['name'])) echo ' hidden';?>">
         <a href="<?php echo base_url(); ?>index.php/auth/logout/">ВЫЙТИ</a>
    </div>
   
 </div>
    
 <div id="soc_buttons_header">
   <div class="soc_cirkle">
   <i class="fa fa-facebook" aria-hidden="true"></i>
  </div>
  <div class="soc_cirkle">
   <i class="fa fa-vk" aria-hidden="true"></i>
  </div>
  <div class="soc_cirkle">
   <i class="fa fa-youtube-play" aria-hidden="true"></i>
  </div>
 </div>
</div>
<!-- основной раздел -->
<main>