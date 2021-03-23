<?php
//Template Name: Pagina Institucional
get_header();

$fields = get_fields();
?>

<main class="container">
	<?php
	if( have_posts() ) {
		while( have_posts() ) {
			the_post(); ?>
			<h1 class="my-3"><?php echo $fields['title'] ?></h1>
            <figure>
                <img src="<?php echo $fields['image'] ?>"
            </figure>
			<p class="my'4"><?php the_content(); ?></p>
		<?php }
	}
	?>
</main>

<?php get_footer(); ?>

