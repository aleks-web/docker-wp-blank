<?php
/*
    Template Name: Лаборатория
    Template Post Type: page
*/

get_header();
$desc = get_field('nova_lab_desc');
?>


<section class="hero animate-on-scroll section_pt">
    <?php do_action('pretty_breadcrumb'); ?>
    <img class="bg__box_small" src="<?= get_template_directory_uri(); ?>/assets/img/bgSmall.svg" alt="bgSmall">

    <div class="container">
        <div class="hero__content hero__content_width">
            <h1><?php the_title(); ?></h1>
            <?= get_the_post_thumbnail(get_the_ID(), 'post_prev', array( 'class' => 'img__lab' )); ?>

            <?= $desc; ?>

        </div>
    </div>
</section>


<?php the_content(); ?>


<?php get_footer(); ?>