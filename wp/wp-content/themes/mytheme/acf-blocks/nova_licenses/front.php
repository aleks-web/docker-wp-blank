<?php

$title = get_field('title');
$desc = get_field('desc');
$page = get_field('page_load_docs');
$docs = get_field('docs', $page->ID);
?>

<section class="licenses animate-on-scroll">
    <div class="container">
        <div class="licenses__container">
            <div class="licenses_block">
                <?php if (!empty($title)) : ?>
                    <h2><?= $title ?></h2>
                <?php endif; ?>

                <?php if (!empty($desc)) : ?>
                    <p><?= $desc ?></p>
                <?php endif; ?>

                <button class="btn btn--gold btn--gold_licenses btnPopup">ЗАКАЗАТЬ ОФОРМЛЕНИЕ ДОКУМЕНТА</button>
            </div>

            <div class="licenses__slider sliderThree">
                <?php foreach ($docs as $doc): ?>
                    <div class="license-item">
                        <a data-fancybox="gallery2" href="<?= $doc['image_full']['sizes']['doc_full'] ?>">
                            <img src="<?= $doc['image_prev']['sizes']['doc_prev'] ?>" alt="<?= $doc['doc_name'] ?>" />
                        </a>
                        <p><?= $doc['doc_name']; ?></p>
                        <a class="btn btn--primary document-card_btn <?php !isset($doc['file']['url']) && print 'disable'; ?>" href="<?= isset($doc['file']['url']) ? $doc['file']['url'] : '#' ?>" download="">СКАЧАТЬ</a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="documents__controler licenses_control">
                <div class="documents__controler_buttons">
                    <div class="button_cont licenses_button"><svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 13L1 7L7 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg></div>
                    <div class="button_cont licenses_button"><svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 13L7 7L1 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg></div>
                </div>
            </div>

        </div>
    </div>
</section>