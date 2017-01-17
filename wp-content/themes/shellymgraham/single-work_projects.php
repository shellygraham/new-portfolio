<?php
/**
 * The Template for displaying all single posts.
 *
 * @package some_like_it_neat
 */

get_header(); ?>

<div id="intro" class="project">

		<?php while ( have_posts() ) : the_post(); ?>

	<div class="intro-container">

		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>

	</div>
	
		<?php if( get_field('site_url')) { ?>
	
		<div class="media-container">
	
			<a href="<?php echo get_field('site_url'); ?>" target="_blank"><?php the_post_thumbnail(); ?><span>Visit Site</span></a>
	
		</div>
		
		<?php } else { ?>
		
		<div class="media-container">
	
			<?php the_post_thumbnail(); ?>
	
		</div>		
	
		<?php } ?>
	
		<?php endwhile; // end of the loop. ?>

</div>
<section id="more-projects">
	<h3>Related Projects</h3>
	<div class="more-container">
		<div class="thumbs-content">
			<?php $posts = get_field('related_project');
			if( $posts ): ?>
			    <ul>
			    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
			        <?php setup_postdata($post); ?>
			        <li><span class="burns" style="background-image:url(<?php the_field('work-thumb'); ?>)"></span>
			            <a href="<?php the_permalink(); ?>" style="background-image:url(<?php the_field('work-thumb'); ?>)">
							<div class="knockout">
							  	<svg viewBox="0 0 200 125">
							    	<rect fill="#441D31" x="0" y="0" width="200" height="125" fill-opacity=".7" mask="url(#<?php the_permalink(); ?>)"/>
									<mask id="<?php the_permalink(); ?>">
									<rect fill="#fff" x="0" y="0" width="200" height="125"></rect>
								  	<?php if(get_field('title_top')) { ?>
										<text y="35" fill="#000" text-anchor="left" x="15">
											<?php echo get_field('title_top'); ?>
										</text>
									<?php } ?>
								  	<?php if(get_field('title_middle')) { ?>
										<text y="60" fill="#000" text-anchor="left" x="15">
											<?php echo get_field('title_middle'); ?>
										</text>
									<?php } ?>
								  	<?php if(get_field('title_bottom')) { ?>
										<text y="85" fill="#000" text-anchor="left" x="15">
											<?php echo get_field('title_bottom'); ?>
										</text>
									<?php } ?>
								</svg>
							</div>
						</a>
						<div class="mobile-only">
							<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
						</div>
			        </li>
			    <?php endforeach; ?>
			    </ul>
			    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif; ?>
		</div>
	</div>
</section><!-- container -->
<div id="cta" class="light">
	<a href="/work" class="all-work"><h3>More Projects</h3></a>
</div>
<?php get_footer(); ?>
