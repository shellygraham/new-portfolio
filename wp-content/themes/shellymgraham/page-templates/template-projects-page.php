<?php
/**
 * Template Name: Projects page
 *
 * This template display content at full with, with no sidebars.
 * Please note that this is the WordPress construct of pages and that other 'pages' on your WordPress site will use a different template.
 *
 * @package some_like_it_neat
 */

get_header(); ?>

<div id="work" class="all-projects">
	<div class="work-container">
		<div class="work-grid">
			<h2>All Projects</h2>
			<ul>
				<?php $args = array( 'post_type' => 'work_projects', 'posts_per_page' => -1 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<li><span class="burns" style="background-image:url(<?php the_field('work-thumb'); ?>)"></span>
						<a href="<?php the_permalink(); ?>" style="background-image:url(<?php the_field('work-thumb-dk'); ?>)">
							<div class="knockout">
							  	<svg viewBox="0 0 200 125">
							    	<rect fill="#c06718" x="0" y="0" width="200" height="125" fill-opacity="1" mask="url(#<?php the_permalink(); ?>)"/>
									<mask id="<?php the_permalink(); ?>">
									<rect fill="#fff" x="0" y="0" width="200" height="125"></rect>
									
								  	<?php if(get_field('title_top') && get_field('title_middle') && get_field('title_bottom')) { ?>
										<text y="38" fill="#000" text-anchor="middle" x="50%">
											<?php echo get_field('title_top'); ?>
										</text>
										<text y="71" fill="#000" text-anchor="middle" x="50%">
											<?php echo get_field('title_middle'); ?>
										</text>
										<text y="102" fill="#000" text-anchor="middle" x="50%">
											<?php echo get_field('title_bottom'); ?>
										</text>
										
									<?php } else if(get_field('title_top') && get_field('title_middle')) { ?>
									
										<text y="56" fill="#000" text-anchor="middle" x="50%">
											<?php echo get_field('title_top'); ?>
										</text>
										<text y="88" fill="#000" text-anchor="middle" x="50%">
											<?php echo get_field('title_middle'); ?>
										</text>
										
									<?php } else if (get_field('title_top')) { ?>
									
										<text y="71" fill="#000" text-anchor="middle" x="50%">
											<?php echo get_field('title_top'); ?>
										</text>									
									<?php } ?>
								</svg>
							</div>
						</a>

					</li>
				<?php endwhile;?>
				<?php wp_reset_query(); ?>
			</ul>
		</div>
	</div>
</div>
<div id="skills" class="alt">
	<div class="skills-container">
		<div class="skills-list">
		<h2>Clients</h2>
				<ul>

				<?php $args = array( 'post_type' => 'work_projects', 'posts_per_page' => -1 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<li>
						<a href="<?php the_field('site_url'); ?>"><?php the_title(); ?></a>
					</li>
				<?php endwhile;?>
				<?php wp_reset_query(); ?>
			<?php if( have_rows('client-list') ): ?>
				<?php while ( have_rows('client-list') ) : the_row(); ?>
					<li><a href="<?php the_sub_field('client-url'); ?>" target="_blank"><?php the_sub_field('client'); ?></a></li>
				<?php endwhile; ?>
			<?php endif; ?>
				</ul>
		</div>
	</div>
</div>

<?php get_footer(); ?>