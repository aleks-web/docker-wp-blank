<?php

$title = get_field('seo_title');
$desc = get_field('seo_desc');
$is_white = get_field('is_white');

?>

<?php if ($title || $desc): ?>
    <section class="seo__block <?php if(!$is_white) { echo 'seo__block_style'; } ?> animate-on-scroll">
        <img class="bg__box_big" src="<?= get_template_directory_uri(); ?>/assets/img/bgBig.svg" alt="<?= $title; ?>">

        <div class="container">
            <div class="container__seo">
                <div class="container__seo_text">
                    <h2><?= $title; ?></h2>
                    <?= $desc; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>