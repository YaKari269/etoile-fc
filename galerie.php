<?php /* Template Name: Galerie */ ?>
<?php get_header(); ?>

<div class="container">
	<section id="titrePage" class="row">
		<div class="col-sm-12">
			<div class="contenu">
				<h1><?php echo $post -> post_name; ?></h1>
			</div>
		</div>
	</section>
	
	<section id="galerie">
		<div id="partImg" class="row">
		
			<?php query_posts('showposts=-1&post_type=galerie'); ?>
			<?php while (have_posts()) : the_post(); ?>
			
				<div class="col-sm-4 portfolio-item">
					<a href="<?php the_permalink(); ?>" class="portfolio-link" data-toggle="modal">
						<div class="caption">
							<div class="caption-content">
								 <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							</div>
						</div>
						<?php the_post_thumbnail(); ?>
						<h2><?php the_title(); ?></h2>
					</a>
				</div>
				
			<?php endwhile;?>
			<?php wp_reset_query(); ?>
			
		</div>
	</section>
</div>

<?php get_footer(); ?>