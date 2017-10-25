<?php get_header(); ?>

<div class="container">
	<section id="titrePage" class="row">
		<div class="col-sm-12">
			<div class="contenu">
				<h1>Actualités</h1>
			</div>
		</div>
	</section>
	<section id="category" class="row">
		<div class="col-sm-12">
			<ul id="filtre">
				<li class="current-cat"><a href="">Tous</a></li>
				<?php wp_list_categories(array(
						'title_li' => '',
						'hide_empty' => 0, // vaut 0 car on veut afficher toute les categories mm vide
						'orderby' => 'order'
					)); ?>
			</ul>
		</div>
	</section>
	<div id="articles">
		<div class="row">
		<?php if(have_posts()):while(have_posts()):the_post(); ?>
			<div class="col-sm-4">
				<a class="zoomarticle" href="<?php the_permalink();?>">
					<div class="actu1">
						<?php if ( has_post_thumbnail() ) {
								the_post_thumbnail('medium');
								
							} else { ?>
								<img src="<?php bloginfo('template_directory'); ?>/img/default-image.jpg" alt="<?php the_title(); ?>" />
							
						<?php } ?>

						<div id="description" class="<?php  $cat = get_the_category(); /*print_r($cat);*/echo $cat[0]->slug; ?>">
							<div class="titre">
								<h2><?php the_title(); ?></h2>
							</div>
							<div class="description">
								<p><?php echo excerpt(20);?></p>
							</div>
							
						</div>
					</div>
				</a>
			</div>
		<?php endwhile;else: ?>
			
			<h2>ERREUR</h2>
			<p>Désolé, il n'y pas d'article dans cette catégorie</p>
			<a href="<?php bloginfo('url'); ?>">Retour vers l'accueil</a>
		
		<?php endif; ?>
		</div>
	</div>

</div>


<?php get_footer(); ?>