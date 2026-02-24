<?php
    $videos = get_field('videos');
    $images = get_field('photos');
?>

<section class="seo__block animate-on-scroll">
    <div class="container">

        <?php if (count($videos) > 0): ?>
            <div class="video__block">
                <h2>Видеоматериалы</h2>

                <div class="image__block_items video__block_items">
                    <?php foreach ($videos as $video): ?>
                        <div class="image__block_items_item video__block_items_item">
                            <?php echo $video['rutube']; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (count($images) > 0): ?>
            <div class="video__block image__block">
                <h2>Фотоматериалы</h2>
                <div class="image__block_items">

                    <?php foreach ($images as $image): ?>
                        <?php ob_start(); ?>

                        <a data-fancybox="gallery3" href="<?= $image['image']['url']; ?>">
                            <img class="image__block_items_item" src="<?= $image['image']['url']; ?>" alt="<?= $image['image']['alt']; ?>" />
                        </a>

                        <?php echo ob_get_clean(); ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>