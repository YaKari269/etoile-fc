<?php /* Template Name: Partenaire */ ?>
<?php get_header(); ?>

<div class="container">
	<section id="titrePage" class="row">
		<div class="col-sm-12">
			<div class="contenu">
				<h1><?php echo $post -> post_name; ?></h1>
			</div>
		</div>
	</section>
	
	<section id="partenaire">
		<div id="partImg" class="row">
			<?php $partenaires = new WP_query('post_type=partenaire');
			while($partenaires->have_posts()){
			$partenaires->the_post();?>
				<div class="col-sm-4 portfolio-item">
					<a href="#<?php $post = get_post(); echo $post->post_name;?>" class="portfolio-link" data-toggle="modal">
						<div class="caption">
							<div class="caption-content">
								 <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							</div>
						</div>
						<?php the_post_thumbnail(); ?>
					</a>
				</div>
			<?php }?>
		</div>
	</section>
</div>

<?php get_footer(); ?>

<!-- Portfolio Modals -->
<?php $partenaires = new WP_query('post_type=partenaire');
while($partenaires->have_posts()){
$partenaires->the_post();?>
	<div class="portfolio-modal modal fade" id="<?php $post = get_post(); echo $post->post_name;?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<div class="close-modal" data-dismiss="modal">
				<div class="lr">
					<div class="rl">
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="modal-body">
							<h2><?php the_title();?></h2>
							<hr class="star-primary">
							<?php the_post_thumbnail("medium"); ?>
							<p><?php the_content(); ?></p>
							<ul class="list-inline item-details">
								<li>
									<strong><a href="<?= esc_attr(get_post_meta($post->ID, 'part_link', true));?>">Plus d'infos</a>
									</strong>
								</li>
							</ul>
							<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php }?>