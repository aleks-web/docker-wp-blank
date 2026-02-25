<?php

$title = get_field('title');

$slug = 'clients';
$args = array(
        'name'           => $slug,
        'post_type'      => 'page',
        'post_status'    => 'publish',
        'posts_per_page' => 1
);
$posts = get_posts($args);

$reviews = null;
if (count($posts) > 0) {
    $reviews = get_field('docs', $posts[0]);
}

?>

<?php if (count($reviews) > 0): ?>
    <section class="why-not animate-on-scroll">
        <div class="container">

            <?php if ($title): ?>
                <h2><?= $title ?></h2>
            <?php endif; ?>

            <?php if (count($reviews) > 0): ?>
                <div class="why-not__slider sliderTwo">

                    <?php foreach ($reviews as $review): ?>
                        <div class="client-card">
                            <a data-fancybox="gallery3" href="<?= $review['image_full']['sizes']['doc_full']; ?>">
                                <img src="<?= $review['image_prev']['sizes']['doc_prev']; ?>" alt="<?= $review['doc_name']; ?>" />
                            </a>
                            <p><?= $review['doc_name']; ?></p>
                        </div>
                    <?php endforeach; ?>

                </div>
            <?php endif; ?>

            <div class="documents__controler">
                <button class="btn btn--gold btn--gold_width btnPopup">ЗАКАЗАТЬ ОФОРМЛЕНИЕ ДОКУМЕНТА</button>
                <div class="documents__controler_buttons">
                    <div class="button_cont why_button">
                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 13L1 7L7 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="button_cont why_button">
                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 13L7 7L1 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>