<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?=(isset($title))? $title : 'lanparty()'?></title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	    <?php
    	if (isset($css)){
    	foreach ($css as $css){?>
			<link rel="stylesheet" type="text/css" media="all" href="<?=base_url().'assets/css/'.$css.'.css'?>"/>
		<?php }}?>
	</head>
	<body>
		<p style="font-size:18px;">Ayuda para corregir fallos</p>
		<?=(isset($title))? '' : '<p style="color:red;">falta introducir la variable $title</p>'?>
		<div style="font-size:9px;">
			<p>La variable site_url() es:<?=site_url()?></p>
			<p>La variable base_url() es:<?=base_url()?></p>
			<p>La variable current_url() es:<?=current_url()?></p>
			<p>La variable uri_string() es:<?=uri_string()?></p>
			<p>La variable index_page() es:<?=index_page()?></p>
		</div>
		<?php if($this->session->userdata('login')){ ?>
		<div style="font-size:11px;">
			<p>session_id <?=$this->session->userdata('session_id') ?></p>
			<p>ip_address <?=$this->session->userdata('ip_address') ?></p>
			<p>user_agent <?=$this->session->userdata('user_agent') ?></p>
			<p>last_activity <?=$this->session->userdata('last_activity') ?></p>
			<p>nickname <?=$this->session->userdata('nickname') ?></p>
			<p>nombre <?=$this->session->userdata('nombre') ?></p>
			<p>apellidos <?=$this->session->userdata('apellidos') ?></p>
			<p>email <?=$this->session->userdata('email') ?></p>
			<p>login <?=$this->session->userdata('login') ?></p>
			<p>active <?=$this->session->userdata('activo') ?></p>
		</div>
		<?php }else{?>
		<div style="font-size:11px;">
			<p>session_id</p>
			<p>ip_address</p>
			<p>user_agent</p>
			<p>last_activity</p>
		</div>
		<?php }?>
		<div>
			<?php
				if(empty(uri_string())){
			?>
					<a href="<?=site_url(). '/auth/salir' ?>">boton que hace logout</a>
			<?php 
				}else{
					$uri = uri_string();
					for($i=0;$i<strlen($uri);$i++)
						if($uri[$i] == '/')
							$uri[$i] = '_';
					
			?>
					<a href="<?=site_url(). '/auth/salir/' . $uri?>">boton que hace logout</a>
			<?php 
				}
			?>
		</div>
		<header>
			<div class="header">
				esto es el header
			</div>
		</header>