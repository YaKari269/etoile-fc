
	<div id="LienContact" class="container">
		<div class="footer-col col-md-12">
			<h3>Nos Partenaires</h3>
			<ul>
			<?php $partenaires = new WP_query('post_type=partenaire');
			while($partenaires->have_posts()){
			$partenaires->the_post();
			$post = get_post();?>
				<li><a href="<?= bloginfo('url');?>/partenaires"><?php /*print_r($post);*/ the_post_thumbnail('medium');?></a></li>
			<?php }?>
			</ul>
		</div>
	</div>