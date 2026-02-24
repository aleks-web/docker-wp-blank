<?php

$title = get_field('title');
$desc = get_field('desc');
$docs = get_field('docs');
?>

<?php if(is_array($docs) && count($docs) > 0): ?>
    <section class="documents animate-on-scroll">
        <img class="bg__box_small" src="<?= get_template_directory_uri(); ?>/assets/img/bgSmall.svg" alt="bgSmall">
        <img class="bg__box_big" src="<?= get_template_directory_uri(); ?>/assets/img/bgBig.svg" alt="bgBig">

        <div class="container">

            <?php if (!empty($title)) : ?>
                <h2><?= $title ?></h2>
            <?php endif; ?>

            <?php if(!empty($desc)): ?>
                <p><?= $desc; ?></p>
            <?php endif; ?>


            <div class="documents__grid slider">

                <?php foreach($docs as $doc): ?>
                    <div class="document-card">
                        <a data-fancybox="gallery1" href="<?= $doc['image_full']['sizes']['doc_full']; ?>">
                            <img src="<?= $doc['image_prev']['sizes']['doc_prev']; ?>" alt="<?= $doc['doc_name']; ?>" />
                        </a>
                        <h3><?= $doc['doc_name']; ?></h3>
                        <a class="btn btn--primary document-card_btn <?php !isset($doc['file']['url']) && print 'disable'; ?>" href="<?= isset($doc['file']['url']) ? $doc['file']['url'] : '#' ?>" download="">СКАЧАТЬ</a>
                    </div>
                <?php endforeach; ?>

            </div>


            <div class="documents__controler">
                <button class="btn btn--gold btn--gold_width btnPopup">ЗАКАЗАТЬ ОФОРМЛЕНИЕ ДОКУМЕНТА</button>

                    <div class="documents__controler_buttons">
                        <div class="button_cont left">
                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 13L1 7L7 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="button_cont right">
                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 13L7 7L1 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
            </div>
        </div>
    </section>
<?php endif; ?>