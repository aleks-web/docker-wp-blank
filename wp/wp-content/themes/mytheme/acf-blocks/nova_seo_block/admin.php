<?php

$title = get_field('seo_title');
$desc = get_field('seo_desc');
$is_white = get_field('is_white');

outputAcfStart();
    outputAcfTitle('SEO блок');
    outputAcfLine('Заголовок', $title);
    outputAcfLine('Описание', $desc);
    outputAcfLine('Есть ли белый фон', $is_white == 1 ? 'Да' : 'Нет');
outputAcfEnd();