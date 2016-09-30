<?php
/**
 * Template Name: Directors Page
 */

get_header(); ?>

<div id="directors" class="home">

	<div class="banner-image" style="background-image: url(<?php the_field('background_director') ?>);"">
		<h2><?php the_title(); ?></h2>
	</div>

	<div class="container">
		<div class="directors clearfix">
			<div class="left">
				<?php 

				//Define your custom post type name in the arguments

				$args = array('post_type' => 'directors', 'orderby' => 'ID', 'order' => 'ASC');

				//Define the loop based on arguments

				$loop = new WP_Query( $args );

				//Display the contents

				while ( $loop->have_posts() ) : $loop->the_post();
				?>
				<a class="name" href="<?php echo post_permalink(); ?>"><?php the_title(); ?></a>
			<?php endwhile;?>
		</div>

		<div class="right">
			<?php 

				//Define your custom post type name in the arguments

			$args = array('post_type' => 'directors', 'orderby' => 'ID', 'order'            => 'ASC', 'posts_per_page'   => 1);

				//Define the loop based on arguments

			$loop = new WP_Query( $args );

				//Display the contents

			while ( $loop->have_posts() ) : $loop->the_post();
			?>
			<iframe src="https://player.vimeo.com/video/<?php the_field('main_video'); ?>?title=0&byline=0&portrait=0" width="600" height="338" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

			<p class="below-text">
				<?php the_field('main_video_client'); ?> | 
				<strong>
					<?php the_field('main_video_title'); ?>
				</strong>
			</p>

			<div class="other-work">

				<?php if( have_rows('directors_work') ): ?>

					<ul class="slides">

						<?php while( have_rows('directors_work') ): the_row(); 

					// vars
						$video = get_sub_field('other_video');
						$client = get_sub_field('other_client');
						$title = get_sub_field('other_title');
						$second = get_sub_field('other_2nd_line');

						?>

						<li class="slide">
						<div class="video">
							<iframe src="https://player.vimeo.com/video/<?php echo $video; ?>?title=0&byline=0&portrait=0" width="287" height="162" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

								<div class="d-video-btn">
									<p class="d-video-client"><?php echo $client; ?></p>
									<p class="d-video-title"><span><?php echo $title; ?><br><?php echo $second; ?></span></p>
								</div>
							</div>
						</li>

					<?php endwhile; ?>

				</ul>
			<?php endif; ?>
		</div>
	<?php endwhile;?>

</div>

</div>

</div>


<script>
	(function($) {
		$(document).ready(function() {
			$("#preNav ul li a, #navigation li a").each(function() {
				var anchor = $(this).attr("href");
				console.log(anchor);
				$(this).attr("href", "<?php echo get_home_url(); ?>/" + anchor);
			});
		});
	})(jQuery);    
</script>


<?php
	//get_sidebar();
get_footer();
?>