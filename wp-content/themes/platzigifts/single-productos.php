<?php get_header(); ?>

<main class="container my-3">
	<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); ?>
				<h1>Este producto es: <?php the_title(); ?></h1>

				<div class="row">
					<div class="col-6">
						<?php the_post_thumbnail('large'); ?>
					</div>
					<div class="col-6">
						<?php the_content(); ?>
					</div>
				</div>

			<?php }
		}

	    $current_id = get_the_ID();

		$taxonomy = get_the_terms($current_id, 'categoria-productos');

		$args = array(
            'post_type'     => 'productos',
            'posts_per_page' => 6,
            'order'         => 'ASC',
            'orderby'       => 'title',
            'tax_query'     => array(
                array(
                    'taxonomy' => 'categoria-productos',
                    'field'    => 'slug',
                    'terms'    => $taxonomy[0]->slug,
                )
            )
        );

		$productos = new WP_Query($args);

		if ( $productos->have_posts() ) { ?>
		    <div class="row justify-content-center text-center">
                <div class="col-12">
                    <h4>Productos Relacionados</h4>
                </div>
                <?php
                    while( $productos->have_posts() ) {
                        $productos->the_post();
                        if (get_the_ID() != $current_id) { ?>
                            <div class="col-2">
                                <figure>
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                </figure>
                                <h4>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h4>
                            </div>
                        <?php }
                     }
                ?>
            </div>
        <?php }
	?>
</main>

<?php get_footer(); ?>
