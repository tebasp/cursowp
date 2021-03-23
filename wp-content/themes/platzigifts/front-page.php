<?php
get_header();
$terms = get_terms('categoria-productos', array('hide-empty' => true));
?>

	<main class="container my-3">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); ?>
				<h1><?php the_title(); ?></h1>

				<div class="row">
					<div class="col-12">
						<?php the_post_thumbnail('large'); ?>
					</div>
					<div class="col-12">
						<?php the_content(); ?>
					</div>
				</div>

                <div class="row">
                    <div class="col-12">
                        <select name="categoria-productos" id="categoria-productos" class="form-control">
                            <option value="null">Selecciona una categoria</option>
                            <?php
                            foreach( $terms as $term ) {
                                    echo '<option value="'.$term->slug.'">'.$term->name.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <h4 class="my-4">Productos</h4>
                    </div>

                    <div class="row" id="resultados-productos">

                        <?php
                            $args = array(
                                    'post_type'         => 'productos',
                                    'posts_per_page'    => -1,
                                    'order'             => 'ASC',
                                    'orderby'           => 'title',
                            );

                            $productos = new WP_Query($args);

                            if( $productos->have_posts() ) {
                                while( $productos->have_posts() ) {
                                    $productos->the_post() ?>

                                    <div class="col-3 text-center">
                                        <figure>
                                            <?php the_post_thumbnail('medium'); ?>
                                        </figure>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </div>

                                <?php }
                            }
                        ?>

                    </div>
                </div>
			<?php }
		}
		?>
	</main>

<?php get_footer(); ?><?php
