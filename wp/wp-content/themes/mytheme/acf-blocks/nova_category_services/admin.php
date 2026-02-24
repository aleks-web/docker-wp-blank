<?php

$title = get_field('title');
$desc = get_field('desc');
$cats = get_field('cats');

outputAcfStart();
    outputAcfTitle('Блок "Лицензии"');
    outputAcfLine('Заголовок', $title);
    outputAcfLine('Описание', $desc);
    outputAcfLine('Количество элементов', count($cats));
outputAcfEnd();