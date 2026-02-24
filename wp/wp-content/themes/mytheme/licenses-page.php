<?php
/*
    Template Name: Лицензии
    Template Post Type: page
*/

    get_header();

    $docs = get_field('docs');
?>

<section class="hero animate-on-scroll section_pt">
    <?php do_action('pretty_breadcrumb'); ?>
    <img class="bg__box_small" src="<?= get_template_directory_uri(); ?>/assets/img/bgSmall.svg" alt="bgSmall">

    <div class="container">
        <div class="hero__content hero__content_width">
            <h1><?php the_title(); ?></h1>
            <p><?= get_field('nova_lin_desc'); ?></p>
        </div>

        <?php if (count($docs) > 0): ?>
            <div class="documents__grid slider">

                <?php foreach ($docs as $doc): ?>
                <div class="document-card document-card_height">
                    <a data-fancybox="gallery3" href="<?= $doc['image_full']['sizes']['doc_full'] ?>">
                        <img src="<?= $doc['image_prev']['sizes']['doc_prev'] ?>" alt="<?= $doc['doc_name'] ?>" />
                    </a>
                    <h3><?= $doc['doc_name'] ?></h3>
                    <a class="btn btn--primary document-card_btn" href="<?= $doc['file']['url'] ?>" download>СКАЧАТЬ</a>
                </div>
            <?php endforeach; ?>

            </div>

            <div class="documents__controler">
                <button class="btn btn--gold btn--gold_width btnPopup">ЗАКАЗАТЬ ОФОРМЛЕНИЕ ДОКУМЕНТА</button>
                <div class="documents__controler_buttons">
                    <div class="button_cont left"><svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 13L1 7L7 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg></div>
                    <div class="button_cont right"><svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 13L7 7L1 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg></div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php the_content(); ?>

<?php
    get_footer();
?>