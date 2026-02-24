<?php
$args = array(
        'taxonomy' => 'services',
        'hide_empty' => false,
        'exclude'  => [ 17 ]
);
$categories = get_terms($args);

$term = get_queried_object();
$seoTitle = get_field('title', $term);
$seoDesc = get_field('desc', $term);

get_header();

?>

<!-- Герой-секция -->
<section class="hero animate-on-scroll section_pt">
    <?php do_action('pretty_breadcrumb'); ?>
    <img class="bg__box_small" src="<?= get_template_directory_uri(); ?>/assets/img/bgSmall.svg" alt="bgSmall">
    <img class="bg__box_big" src="<?= get_template_directory_uri(); ?>/assets/img/bgBig.svg" alt="bgBig">


    <div class="container">
        <div class="hero__content hero__content_width">

            <?php if ($term->name): ?>
                <h1><?= $term->name; ?></h1>
            <?php endif; ?>

            <div class="solutions__grid solutions__grid_style">

                <?php foreach($categories as $category):
                    $imageAr = get_field('image', $category->taxonomy . '_' . $category->term_id);
                ?>
                    <div class="solution-card solution-card_height">
                        <img src="<?= isset($imageAr['sizes']['type_services']) ? $imageAr['sizes']['type_services'] : get_template_directory_uri() . '/assets/img/notphotesmall.png' ?>" alt="<?= $category->name; ?>" />

                        <h3 class="solution-card_title_style"><?= $category->name; ?></h3>

                        <?php if ($category->description): ?>
                            <p><?= $category->description; ?></p>
                        <?php endif; ?>

                        <a class="btn btn--primary btn_style" href="<?= get_term_link($category->term_id) ?>">ПОДРОБНЕЕ</a>
                    </div>
                <?php endforeach; ?>


                <div class="solution-card solution-card--highlight solution-card_height center_flex">
                    <div class="solution-card__badge">
                        <img src="<?= get_template_directory_uri(); ?>/assets/img/logo.svg" alt="НОВА" />
                    </div>
                    <h3>Мы решаем<br>всё это за вас</h3>
                    <button class="btn btn--gold btnPopup">ЗАКАЗАТЬ СЕРТИФИКАЦИЮ</button>
                </div>

            </div>
        </div>
    </div>
</section>


<section class="cta-form cta-form_style animate-on-scroll">
    <div class="loader-wrap">
        <div style="display: flex; align-items: center; justify-content: center; flex-direction: column; gap: 10px;">
            <span class="loader"></span>
            <span style="color: white;z-index: 10;">Отправка&#8230;</span>
        </div>
    </div>

    <img decoding="async" class="bg__box_big" src="<?= get_template_directory_uri() . '/assets/img/bgBig.svg'?>" alt="bgBig" />

    <div class="container">
        <div class="cta-form__inner">

            <div class="cta-form__content ">
                <h2 class="text__stile">Оставьте заявку прямо сейчас</h2>
                <p class="text__stile">мы свяжемся с вами и рассчитаем стоимость</p>

                <form class="form">
                    <input type="hidden" name="form_name" value="Оставьте заявку прямо сейчас" />
                    <input type="hidden" name="page_link" value="<?= get_permalink(); ?>" />
                    <input class="input_style" type="tel" name="tel" id="phone" placeholder="Телефон *" required/>

                    <div class="checkbox">
                        <input type="checkbox" name="agree" required/>
                        <div class="text__stile">Нажимая на кнопку, вы соглашаетесь с политикой конфиденциальности и даёте своё согласие на
                            обработку <a href="<?= get_permalink(84); ?>" class="pers__link">персональных данных</a>
                        </div>
                    </div>

                    <button type="submit" class="btn btn--gold btn--gold_submit">ОТПРАВИТЬ</button>
                </form>

            </div>

            <div class="cta-form__image">
                <img decoding="async" src="<?= get_template_directory_uri() . '/assets/img/mainForm.png'; ?>" alt="Сертификат в руках"/>
            </div>
        </div>
    </div>
</section>

<?php if($seoTitle): ?>
    <section class="seo__block seo__block_style animate-on-scroll">
        <img class="bg__box_big" src="<?= get_template_directory_uri(); ?>/assets/img/bgBig.svg" alt="image">
        <div class="container">
            <div class="container__seo">
                <div class="container__seo_text">
                    <h2><?= $seoTitle ?></h2>
                    <p><?= $seoTitle ?></p>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>