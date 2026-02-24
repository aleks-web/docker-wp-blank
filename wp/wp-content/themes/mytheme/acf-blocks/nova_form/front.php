<?php

$title = get_field('form_title');
$is_white = get_field('is_white');
$desc = get_field('form_desc');
$image = get_field('form_image') ? get_field('form_image') : get_template_directory_uri() . '/assets/img/mainForm.png';

?>

<section class="cta-form animate-on-scroll <?php if ($is_white) { echo 'cta-form_style'; } ?>">
    <div class="loader-wrap">
        <div style="display: flex; align-items: center; justify-content: center; flex-direction: column; gap: 10px;">
            <span class="loader"></span>
            <span style="color: white;z-index: 10;">Отправка...</span>
        </div>
    </div>

    <img class="bg__box_big" src="<?= get_template_directory_uri(); ?>/assets/img/bgBig.svg" alt="bgBig">

    <div class="container">
        <div class="cta-form__inner">

            <div class="cta-form__content <?php if ($is_white) { echo 'text__stile'; } ?>">
                <?php if ($title): ?>
                    <h2><?= $title ?></h2>
                <?php endif; ?>

                <?php if ($desc): ?>
                    <p><?= $desc ?></p>
                <?php endif; ?>

                <form class="form">
                    <input type="hidden" name="form_name" value="<?= $title ?>" />
                    <input type="hidden" name="page_link" value="<?= get_the_permalink(); ?>" />

                    <input class="<?php if ($is_white) { echo 'input_style'; } ?>" type="tel" name="tel" id="phone" placeholder="Телефон *" required/>

                    <div class="checkbox">
                        <input type="checkbox" name="agree" required/>
                        <div class="<?php if ($is_white) { echo 'text__stile'; } ?>">Нажимая на кнопку, вы соглашаетесь с политикой конфиденциальности и даёте своё согласие на
                            обработку <a href="<?= get_permalink(84); ?>" class="pers__link">персональных данных</a>
                        </div>
                    </div>

                    <button type="submit" class="btn btn--gold btn--gold_submit">ОТПРАВИТЬ</button>
                </form>

            </div>

            <div class="cta-form__image">
                <img src="<?= $image; ?>" alt="Сертификат в руках"/>
            </div>
        </div>
    </div>
</section>