<?php /* Template Name: Accueil */ ?>
<?php get_header(); ?>

<div class="container">

	<section id="classement" class="row">
		<div class="col-sm-7">
		  <div class="contenu">
			<span class="ligue">Classement <?= get_option('division');?><br></span>
			<span class="poule">Poule <?= get_option('poule');?></span>
			<span class="place"><?= get_option('position');?></span>
		  </div>
		</div>
		<div class="col-sm-5">
		  <div class="resume">
			<div class="blockResume highlightBlock"><span class="pts">pts</span><span class="contain"><?= get_option('point');?></span></div>
			<div class="blockResume"><span class="journee">j</span><span class="contain"><?= get_option('journee');?></span></div>
			<div class="blockResume"><span class="victoire">v</span><span class="contain"><?= get_option('victoire');?></span></div>
			<div class="blockResume"><span class="nul">n</span><span class="contain"><?= get_option('egalite');?></span></div>
			<div class="blockResume"><span class="defaite">d</span><span class="contain"><?= get_option('defaite');?></span></div>
		  </div>
		</div>
	</section>
	
	<div class="row">
		<?php sliderhome_show(); ?>
	</div>
	<div id="contenu">
		<div class="row">
			<div class="col-md-7 cases">
				<div class="row">
					<?php 
					$pages = array(
						get_option("bloc1"),
						get_option("bloc2")
					);
					foreach ($pages as $pagename) { 
					
					query_posts('pagename='.$pagename.'');?>
					<?php while (have_posts()) : the_post(); ?>
					<div class="col-md-6">
						<div class="case-page">
							<a class="link-page" href="<?php the_permalink();?>">
								<div class="titre">
									<h2><?php the_title(); ?></h2>
								</div>
							</a>
						</div>
					</div>
					<?php endwhile;?>
					<?php wp_reset_query();} ?>
					
					<?php query_posts('showposts=2'); ?>
					<?php while (have_posts()) : the_post(); ?>
					<div class="col-md-6">
						<a class="zoomarticle" href="<?php the_permalink();?>">
							<div class="case">
								<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail();
										
									} else { ?>
										<img src="<?php bloginfo('template_directory'); ?>/img/default-image-black.jpg" alt="<?php the_title(); ?>" />
									
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
					<?php endwhile;?>
					<?php wp_reset_query(); ?>
				</div>
			</div>
			
			<?php get_sidebar(); ?>
		</div>
		
	</div>
</div>


<?php get_footer(); ?>