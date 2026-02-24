<?php

$title = get_field('title');
$desc = get_field('desc');
$cats = get_field('cats');

if (count($cats) > 0) { $cats = array_chunk($cats, 2); }
?>

<?php if (isset($cats) && is_array($cats) && count($cats) > 0): ?>
<section class="services animate-on-scroll">
    <img class="bg__box_small" src="<?= get_template_directory_uri(); ?>/assets/img/bgSmall.svg" alt="bgSmall">
    <img class="bg__box_big" src="<?= get_template_directory_uri(); ?>/assets/img/bgBig.svg" alt="bgBig">

    <div class="container">
        <?php if ($title): ?>
            <h2><?= $title ?></h2>
        <?php endif; ?>

        <?php if ($desc): ?>
            <p><?= $desc ?></p>
        <?php endif; ?>


        <div class="services__grid sliderFour">
            <?php foreach ($cats as $key => $cat): ?>
                <div class="service-card_item">
                    <div class="service-card">
                        <?php if(isset($cat[0]['svg_code'])): ?>
                            <div class="service-icon"><?= $cat[0]['svg_code'] ?></div>
                        <?php endif; ?>

                        <?php if(isset($cat[0]['desc'])): ?>
                            <p><?= $cat[0]['desc'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="service-card">
                        <?php if(isset($cat[1]['svg_code'])): ?>
                            <div class="service-icon"><?= $cat[1]['svg_code'] ?></div>
                        <?php endif; ?>

                        <?php if(isset($cat[1]['desc'])): ?>
                            <p><?= $cat[1]['desc'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


        <div class="documents__controler">
            <button class="btn btn--gold btn--gold_width btnPopup">ЗАКАЗАТЬ ОФОРМЛЕНИЕ ДОКУМЕНТА</button>
            <div class="documents__controler_buttons">
                <div class="button_cont service_button">
                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 13L1 7L7 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="button_cont service_button">
                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 13L7 7L1 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>