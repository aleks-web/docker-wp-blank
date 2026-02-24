<?php
/*
    Template Name: Клиенты
    Template Post Type: page
*/

get_header();

$docs = get_field('docs');
?>

<section class="hero animate-on-scroll section_pt active">

    <?php do_action('pretty_breadcrumb'); ?>
    <img class="bg__box_small" src="<?= get_template_directory_uri(); ?>/assets/img/bgSmall.svg" alt="bgSmall">

    <div class="container">

        <div class="hero__content hero__content_width">
            <h1><?php the_title(); ?></h1>
            <?php if ($desc = get_field('nova_client_desc')) { echo $desc; } ?>
        </div>

        <?php if (count($docs) > 1): ?>
            <div class="documents__grid documents__grid_flex">

                <?php foreach ($docs as $doc): ?>
                <div class="document-card document-card_height document-card_flex">
                    <a data-fancybox="gallery3" href="<?= $doc['image_prev']['sizes']['doc_full']; ?>">
                        <img src="<?= $doc['image_prev']['sizes']['doc_prev']; ?>" alt="Декларация Таможенного союза">
                    </a>

                    <?php if ($doc['doc_name']): ?>
                        <h3><?= $doc['doc_name']; ?></h3>
                    <?php endif; ?>

                    <a class="btn btn--primary document-card_btn <?php !isset($doc['file']['url']) && print 'disable'; ?>" href="<?= isset($doc['file']['url']) ? $doc['file']['url'] : '#' ?>" download="">СКАЧАТЬ</a>
                </div>
                <?php endforeach; ?>

            </div>
        <?php endif; ?>

    </div>
</section>

<?php the_content(); ?>

<?php get_footer(); ?>