<!DOCTYPE html>
<html <?php language_attributes();?>>
  <head>
    <title><?php bloginfo("title");?></title>
    <meta charset="<?php bloginfo("charset");?> ">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Etoile Football Club de Bobigny - EFC BOBIGNY" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php bloginfo("template_directory");?>/img/logo.png" />
    <!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /><![endif]-->

    <link href="<?php bloginfo("stylesheet_url");?>" rel="stylesheet">
    <link href="<?php bloginfo("stylesheet_directory");?>/flexslider.css" rel="stylesheet">
    <link href="<?php bloginfo("stylesheet_directory");?>/css/menu.css" rel="stylesheet">
    <link href="<?php bloginfo("stylesheet_directory");?>/css/contenu.css" rel="stylesheet">
    <link href="<?php bloginfo("stylesheet_directory");?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php bloginfo("stylesheet_directory");?>/fonts/genericons/genericons.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<?php wp_head(); ?>
  </head>

  <body>
	<div id="header">
		<div id="ssh" class="container">
			<header id="social" class="row">
				<div class="col-lg-12">
					<p class="txt">SITE OFFICIEL DE L'ETOILE FOOTBALL CLUB DE BOBIGNY</p>
				
					<div id="icon-social">
						<p>SUIVEZ-NOUS !
						<a href="www.facebook.fr"><img src="<?php bloginfo("template_directory");?>/img/icon/fb.png" alt="Facebook"/></a></p>
					</div>
				</div>
			</header>
		</div>
		<div id="menu" class="row">
			<div class="col-sm-12">
				<div class="navbar navbar-inverse" role="navigation">
					<div id="logo">
							<a href="<?php bloginfo("url");?>"><img src="<?php bloginfo("template_directory");?>/img/logo.png"/></a>
					</div>

					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							  <span class="sr-only">Toggle navigation</span>
							  <span class="icon-bar"></span>
							  <span class="icon-bar"></span>
							  <span class="icon-bar"></span>
							</button>
						</div>
						<?php wp_nav_menu(array(
							
							'theme_location' 	=> 'main',
							'container' 		=> 'div',
							'container_class' 	=> 'navbar-collapse collapse',
							'items_wrap'		=> '<ul class="nav navbar-nav navbar-right">%3$s</ul>',
							'depth' 			=> 2,
							'walker'			=> new bootstrap_4_walker_nav_menu()
						)); ?>
					</div>
				</div>
			</div>
		</div>
	</div>