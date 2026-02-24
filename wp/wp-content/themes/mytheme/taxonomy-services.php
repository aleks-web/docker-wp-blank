<?php
    get_header();
    $term = get_queried_object();
    $imageAr = get_field('image', $term->taxonomy . '_' . $term->term_id);

    $seoTitle = get_field('title', $term);
    $seoDesc = get_field('desc', $term);
?>

<section class="hero animate-on-scroll section_pt">
    <?php do_action('pretty_breadcrumb'); ?>
    <img class="bg__box_small" src="<?= get_template_directory_uri(); ?>/assets/img/bgSmall.svg" alt="bgSmall">

    <div class="container">
        <div class="hero__content hero__content_width">
            <h1><?php single_cat_title(); ?></h1>
            <img class="img__lab img__lab_style" src="<?= isset($imageAr['sizes']['post_prev']) ? $imageAr['sizes']['post_prev'] : get_template_directory_uri() . '/assets/img/notphotesmall.png' ?>" alt="imgservice">

            <?php if($term->description): ?>
                <p><span class="lab__text"><?= $term->description ?></span></p>
            <?php endif; ?>

            <div class="solutions__grid solutions__grid_style">

                <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                        $img = get_the_post_thumbnail(get_the_ID());
                    ?>
                        <div class="solution-card solution-card_height">
                            <?= $img; ?>
                            <a href="<?= get_the_permalink(); ?>"><h3 class="solution-card_title_style"><?php the_title(); ?></h3></a>
                            <?php the_excerpt(); ?>
                            <a class="btn btn--primary btn_style" href="<?= get_the_permalink(); ?>">ПОДРОБНЕЕ</a>
                        </div>
                    <?php
                        endwhile;
                        the_posts_pagination();
                    else :
                        echo 'Записей нет.';
                    endif;
                ?>

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