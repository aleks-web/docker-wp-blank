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

outputAcfStart();
    outputAcfTitle('Блок "Почему вас здесь нет?"');
    outputAcfLine('Заголовок', $title);
    outputAcfLine('Количество элементов', count($reviews));
outputAcfEnd();