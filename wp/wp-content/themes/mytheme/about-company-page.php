<?php
/*
    Template Name: О компании
    Template Post Type: page
*/

get_header();

$desc = get_field('nova_company_desc');
$image = get_field('nova_company_image');
?>

<section class="hero animate-on-scroll section_pt active">

    <?php do_action('pretty_breadcrumb'); ?>
    <img class="bg__box_small" src="<?= get_template_directory_uri(); ?>/assets/img/bgSmall.svg" alt="bgSmall">

    <div class="container hero__inner">
        <div class="hero__content">
            <h1><?php the_title(); ?></h1>

            <?php if ($desc): ?>
                <?= $desc; ?>
            <?php endif; ?>

            <!-- <button class="btn btn--gold">ЗАКАЗАТЬ СЕРТИФИКАЦИЮ</button> -->
        </div>

        <?php if (isset($image['url'])): ?>
            <div class="hero__image">
                <img src="<?= $image['url']; ?>" alt="<?php the_title(); ?>">
            </div>
        <?php endif; ?>
    </div>
</section>

<?php the_content(); ?>

<?php get_footer(); ?>