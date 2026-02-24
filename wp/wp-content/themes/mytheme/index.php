<?php
/*
    Template Name: Главная
    Template Post Type: page
*/

get_header();
?>

<?php the_content(); ?>

<section class="cta-final animate-on-scroll">
    <div class="loader-wrap">
        <div style="display: flex; align-items: center; justify-content: center; flex-direction: column; gap: 10px;">
            <span class="loader"></span>
            <span style="color: white;z-index: 10;">Отправка...</span>
        </div>
    </div>

    <div class="container">
        <div class="cta-final__inner">
            <div class="cta-final__content">
                <h2>Не откладывайте — начните оформление документов сегодня!</h2>
                <p>Заполните форму или позвоните — и получите официальную сертификацию с гарантией надёжности и юридической чистоты.</p>
                <p>НОВА — ваш надёжный партнёр в сертификации и сопровождении бизнеса.</p>
                <form class="form">
                    <input type="tel" name="tel" id="phoneMain" placeholder="Телефон*" required />
                    <input type="hidden" name="form_name" value="Не откладывайте — начните оформление документов сегодня!" />
                    <input type="hidden" name="page_link" value="<?= get_the_permalink(); ?>" />

                    <div class="checkbox">
                        <input name="agree" type="checkbox" required />
                        <div>Нажимая на кнопку, вы соглашаетесь с политикой конфиденциальности и даёте своё согласие на обработку <a href="<?= get_permalink(84); ?>" class="pers__link">персональных данных</a></div>
                    </div>
                    <button type="submit" class="btn btn--gold btn--gold_submit">ОТПРАВИТЬ</button>
                </form>
            </div>
            <div class="cta-final__image">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/mainForm.png" alt="Сертификат в руках" />
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>