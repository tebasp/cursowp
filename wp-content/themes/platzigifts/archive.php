<?php get_header(); ?>

<main class="container my-3">

	<div class="row">
		<h1><?php the_archive_title(); ?></h1>
	</div>

	<div class="row">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); ?>

					<div class="col-4 text-center">
						<h1><?php the_title(); ?></h1>

						<div class="d-block"><?php the_post_thumbnail('large'); ?></div>
						<a href="<?php the_permalink(); ?>" class="d-block text-decoration-none text-primary my-2">
							<?php the_title(); ?>
						</a>
					</div>

			<?php }
		}
		?>
	</div>
</main>

<?php get_footer(); ?>

