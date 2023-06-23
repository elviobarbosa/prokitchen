<?php 
	$loop = new WP_Query( array(
		'meta_key'          => '_thumbnail_id', 
		'post_type'         => 'post_produtos', 
		'posts_per_page'    => 1,
		'orderby'   => 'rand',
	));
?>

<section class="hero">
	<div class="hero__container">
		<div class="hero__content">
			<div class="hero__text">
				<h1></h1>
			</div>
			<div class="hero__cover">
				<div class="hero__little-prod">
					<?php
						while($loop->have_posts()) : $loop->the_post();
							the_post_thumbnail();
							wp_reset_postdata();
						endwhile;
					?>
				</div>
			</div>
		</div>
	</div>
</section>