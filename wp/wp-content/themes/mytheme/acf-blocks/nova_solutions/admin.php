<?php

$title = get_field('title');
$desc = get_field('desc');
$solutions = get_field('solutions');

outputAcfStart();
    outputAcfTitle('Блок "Решения"');
    outputAcfLine('Заголовок', $title);
    outputAcfLine('Описание', $desc);
    outputAcfLine('Количество элементов', count($solutions));
outputAcfEnd();