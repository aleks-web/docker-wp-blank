<?php

$title = get_field('title');
$desc = get_field('desc');
$solutions = get_field('solutions');
?>

<section class="solutions animate-on-scroll">
    <img class="bg__box_small" src="<?= get_template_directory_uri(); ?>/assets/img/bgSmall.svg" alt="bgSmall">
    <img class="bg__box_big" src="<?= get_template_directory_uri(); ?>/assets/img/bgBig.svg" alt="bgBig">

    <div class="container">
        <?php if(!empty($title)): ?>
            <h2><?= $title; ?></h2>
        <?php endif; ?>

        <?php if(!empty($desc)): ?>
            <p><?= $desc; ?></p>
        <?php endif; ?>

        <?php if(is_array($solutions) && count($solutions) > 0): ?>
            <div class="solutions__grid">
                <?php foreach ($solutions as $solution): ?>
                    <div class="solution-card">
                        <img src="<?= $solution['image']['sizes']['solution_card']; ?>" alt="Скорость и вовлеченность" />
                        <h3><?= $solution['title']; ?></h3>

                        <p>
                            <?php if ($solution['subtitle']): ?>
                                <span><?= $solution['subtitle']; ?></span><br><br>
                            <?php endif; ?>

                            <?php if ($solution['desc']): ?>
                                Мы не просто исполнители. Мы — ваши заинтересованные представители, которые действуют оперативно и нацелены исключительно на ваш результат.
                            <?php endif; ?>
                        </p>
                    </div>
                <?php endforeach; ?>



                <div class="solution-card solution-card--highlight">
                    <div class="solution-card__badge"><img src="<?= get_template_directory_uri(); ?>/assets/img/logo.svg" alt="НОВА" /></div>
                    <h3>Мы решаем<br>всё это за вас</h3>
                    <button class="btn btn--gold btnPopup">ЗАКАЗАТЬ СЕРТИФИКАЦИЮ</button>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>