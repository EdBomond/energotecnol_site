<?php
/*
Template Name: map
*/
?>

<?php //get_header();
?>

<h3>Страницы</h3>
<ul>
<?php wp_list_pages('title_li=' ); ?>
</ul>

<h3>Записи</h3>
<?php query_posts('showposts=1000'); ?>
<ul>
<?php while (have_posts()) : the_post(); ?>
<li><a href="<?php the_permalink() ?>">
<?php the_title(); ?></a></li>

<?php endwhile;?>
</ul>

<?php// get_footer();
?>