<?php get_header(); ?>

<div class="container">
	<section id="titrePage" class="row">
		<div class="col-sm-12">
			<div class="contenu">
				<h1>Galerie : <?php echo $post -> post_title; ?></h1>
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
		
		<div id="navig-left" class="navig-single"><?php previous_post_link('%link', '&larr; Galerie précédent'); ?></div>
		<div id="navig-right" class="navig-single"> <?php next_post_link('%link', 'Galerie suivant &rarr;'); ?> </div>
		
		<div id="clear"></div>
	</div> 
</div>


<?php get_footer(); ?>