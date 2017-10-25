<?php get_header(); ?>

<div class="container">
	<section id="titrePage" class="row">
		<div class="col-sm-12">
			<div class="contenu">
				<h1><?php /*print_r($post);*/ echo $post -> post_title; ?></h1>
			</div>
		</div>
	</section>
	<div id="contenu" class="row">
	
		<div id="p" class="col-sm-12">
		
			<?php if(have_posts()):while(have_posts()):the_post(); ?>
			
				<?php the_content(); ?>
				
			<?php endwhile;else: ?>
			
				<h2>ERREUR</h2>
				<p>Désolé, mais la page que vous recherchez n'existe pas ou plus.</p>
				<a href="<?php bloginfo('url'); ?>">Retour vers l'accueil</a>
				
			<?php endif; ?>
	
		</div>	
		
	</div> 
</div>


<?php get_footer(); ?>