<?php

$title = get_field('title');
$steps = get_field('steps');
?>

<section class="steps animate-on-scroll">
    <div class="container">

        <?php if (!empty($title)) : ?>
            <h2><?= $title ?></h2>
        <?php endif; ?>

        <?php if (!empty($steps) && is_array($steps) && count($steps) > 0): ?>
            <div class="steps__grid">

                <?php foreach ($steps as $key => $step) : ?>
                    <div class="step-card">
                        <?php if (!empty($step['title'])) : ?>
                            <h3><?= $step['title']; ?></h3>
                        <?php endif; ?>

                        <span class="number number__one"><?= $key + 1 ?></span>

                        <?php if (!empty($step['desc'])) : ?>
                            <p><?= $step['desc']; ?></p>
                        <?php endif; ?>

                        <?php if (!$key): ?>
                            <button class="btn btn--outline btnPopup">ОСТАВИТЬ ЗАЯВКУ</button>
                        <?php endif; ?>

                        <svg class="icon__position_one" width="14" height="26" viewBox="0 0 14 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 25L13 13L1 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                <?php endforeach; ?>

            </div>
        <?php endif; ?>

    </div>
</section>