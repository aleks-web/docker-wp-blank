<?php

$title = get_field('title');
$desc = get_field('desc');
$docs = get_field('docs');

outputAcfStart();
    outputAcfTitle('Блок "Все документы"');
    outputAcfLine('Заголовок', $title);
    outputAcfLine('Описание', $desc);
    outputAcfLine('Количество документов', count($docs));
outputAcfEnd();