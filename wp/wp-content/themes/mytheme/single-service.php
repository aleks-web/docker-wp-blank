<?php

    $desc = get_field('desc');
    $content = get_field('content');
    $groupFile = get_field('file_group');
    $thumb = get_the_post_thumbnail_url(get_queried_object(), 'post_prev');

    get_header();
?>

<section class="hero animate-on-scroll section_pt">
    <?php do_action('pretty_breadcrumb'); ?>
    <img class="bg__box_small" src="<?= get_template_directory_uri(); ?>/assets/img/bgSmall.svg" alt="bgSmall">

    <div class="container">
        <div class="hero__content hero__content_width">

            <h1><?php the_title(); ?></h1>
            <p>
                <span class="lab__text"><?= $desc ?></span>
            </p>


            <img class="img__lab img__lab_style" src="<?= $thumb ? $thumb : get_template_directory_uri() . '/assets/img/notphotebig.png' ?>" alt="imgservice">

            <?php if (isset($groupFile['file'])): ?>
                <div class="doc__box">
                    <?php if (isset($groupFile['title'])): ?>
                        <p class="doc__box_title"><?= $groupFile['title']; ?></p>
                    <?php endif; ?>

                    <?php if (isset($groupFile['file_size'])): ?>
                        <p class="doc__box_text">Размер файла:<span> <?= $groupFile['file_size']; ?> мб</span></p>
                    <?php endif; ?>

                    <?php if (isset($groupFile['file']['url'])): ?>
                        <a class="btn btn--primary document-card_btn doc__box_btn" href="<?= $groupFile['file']['url']; ?>" download>СКАЧАТЬ</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?= $content; ?>

            <div class="documents__grid slider">
                <div class="document-card document-card_height">
                    <a data-fancybox="gallery3" href="/css/img/doc1Big.jpg">
                        <img src="/css/img/doc1.png" alt="Декларация Таможенного союза" />
                    </a>
                    <h3>Декларация Таможенного союза (ЕАЭС)</h3>
                    <a class="btn btn--primary document-card_btn" href="/test.txt" download>СКАЧАТЬ</a>
                </div>
                <div class="document-card document-card_height">
                    <a data-fancybox="gallery3" href="/css/img/doc1Big.jpg">
                        <img src="/css/img/doc1.png" alt="Декларация Таможенного союза" />
                    </a>
                    <h3>Декларация Таможенного союза (ЕАЭС)</h3>
                    <a class="btn btn--primary document-card_btn" href="/test.txt" download>СКАЧАТЬ</a>
                </div>
                <div class="document-card document-card_height">
                    <a data-fancybox="gallery3" href="/css/img/doc1Big.jpg">
                        <img src="/css/img/doc1.png" alt="Декларация Таможенного союза" />
                    </a>
                    <h3>Декларация Таможенного союза (ЕАЭС)</h3>
                    <a class="btn btn--primary document-card_btn" href="/test.txt" download>СКАЧАТЬ</a>
                </div>
                <div class="document-card document-card_height">
                    <a data-fancybox="gallery3" href="/css/img/doc1Big.jpg">
                        <img src="/css/img/doc1.png" alt="Декларация Таможенного союза" />
                    </a>
                    <h3>Декларация Таможенного союза (ЕАЭС)</h3>
                    <a class="btn btn--primary document-card_btn" href="/test.txt" download>СКАЧАТЬ</a>
                </div>
                <div class="document-card document-card_height">
                    <a data-fancybox="gallery3" href="/css/img/doc1Big.jpg">
                        <img src="/css/img/doc1.png" alt="Декларация Таможенного союза" />
                    </a>
                    <h3>Декларация Таможенного союза (ЕАЭС)</h3>
                    <a class="btn btn--primary document-card_btn" href="/test.txt" download>СКАЧАТЬ</a>
                </div>
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
        </div>
    </div>
</section>

<?php the_content(); ?>

<?php get_footer(); ?>