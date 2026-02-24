<?php

$title = get_field('title');
$desc = get_field('desc');
$partners = get_field('partners');
?>

<section class="partners animate-on-scroll">
    <div class="container">
        <div class="container__partners">

            <div class="container__partners_text">
                <?php if(!empty($title)): ?>
                    <h2><?= $title; ?></h2>
                <?php endif; ?>

                <?php if(!empty($desc)): ?>
                    <p><?= $desc; ?></p>
                <?php endif; ?>
            </div>

            <?php if(!empty($partners) && count($partners) > 0): ?>
                <div class="partners__grid">
                    <?php foreach($partners as $partner): ?>
                        <div class="partner-logo"><img src="<?= $partner['image']['url']; ?>" alt="<?= isset($partner['image']['alt']) && !empty($partner['image']['alt']) ? $partner['image']['alt'] : $partner['image']['filename']; ?>" /></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>