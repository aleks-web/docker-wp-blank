<?php

$title = get_field('title');
$advantages = get_field('advantages');
?>

<?php if(is_array($advantages) && count($advantages) > 0): ?>
    <section class="advantages animate-on-scroll">
        <div class="container">

            <?php if (!empty($title)) : ?>
                <h2><?= $title ?></h2>
            <?php endif; ?>

            <div class="advantages__grid">

                <?php foreach ($advantages as $advantage) : ?>
                    <div class="advantage-card">

                        <?php if ($advantage['svg_code']): ?>
                            <div class="advantage-icon">
                                <?= $advantage['svg_code']; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($advantage['title']): ?>
                            <h3><?= $advantage['title']; ?></h3>
                        <?php endif; ?>

                        <?php if ($advantage['desc']): ?>
                        <p><?= $advantage['desc']; ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
<?php endif; ?>