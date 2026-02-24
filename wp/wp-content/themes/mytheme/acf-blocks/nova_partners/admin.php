<?php

$title = get_field('title');
$desc = get_field('desc');
$partners = get_field('partners');

outputAcfStart();
    outputAcfTitle('Блок "Партнеры"');
    outputAcfLine('Заголовок', $title);
    outputAcfLine('Описание', $desc);
    outputAcfLine('Количество логотипов', count($partners));
outputAcfEnd();